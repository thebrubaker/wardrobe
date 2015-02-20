<?php namespace Wardrobe\Commands\Post;

use Wardrobe\Commands\Command;
use Wardrobe\Repositories\Post\PostRepository;

use Illuminate\Contracts\Bus\SelfHandling;

use Wardrobe\User;
use Wardrobe\Post;
use Wardrobe\PostImage;

use Carbon\Carbon;

class CreatePostCommand extends Command implements SelfHandling {

	public $user;
	public $name;
	public $facebook_copy;
	public $twitter_copy;
	public $image;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(User $user, $name, $facebook_copy, $twitter_copy, $image)
	{
		$this->user = $user;
		$this->name = $name;
		$this->facebook_copy = $facebook_copy;
		$this->twitter_copy = $twitter_copy;
		$this->image = $image;
	}

	/**
	 * Execute the command.
	 *
	 * @return Wardrobe\Post
	 */
	public function handle(PostRepository $repository)
	{
		$post = $repository->create(
			$this->user, 
			$this->name,
			$this->facebook_copy,
			$this->twitter_copy
		);

		$extension = '.' . $this->image->guessExtension();
		$timestamp = Carbon::now()->timestamp;
		$name = snake_case($this->name);

		$fileName = $name . '_' . $timestamp . $extension;
		$path = 'images/uploads';

		$this->image->move($path, $fileName);

		$image = new PostImage;
		$image->file_name = $fileName;
		$image->file_path = $path;
		$image->post()->associate($post);
		$image->save();

		return $post;

	}

}
