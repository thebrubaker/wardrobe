<?php namespace Wardrobe\Commands\Post;

use Wardrobe\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

use Wardrobe\Repositories\Post\PostRepository;

class CreatePostCommand extends Command implements SelfHandling {

	public $user;
	public $text;
	public $location;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(User $user, $text, $location)
	{
		$this->user = $user;
		$this->text = $text;
		$this->location = $location;
	}

	/**
	 * Execute the command.
	 *
	 * @return Wardrobe\Post
	 */
	public function handle(PostRepository $postRepository)
	{
		$post = $postRepository->create(
			$this->user, 
			$this->text,
			$this->location
		);

		return $post;
	}

}
