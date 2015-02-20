<?php namespace Wardrobe\Handlers\Commands\Post;

use Wardrobe\Commands\Post\CreatePostCommand;
use Wardrobe\Repositories\Post\PostRepository;

use Illuminate\Queue\InteractsWithQueue;

class CreatePostCommandHandler {

	public $postRepository;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(PostRepository $postRepository)
	{
		$this->repository = $postRepository;
	}

	/**
	 * Handle the command.
	 *
	 * @param  CreatePostCommand  $command
	 * @return Post
	 */
	public function handle(CreatePostCommand $command)
	{
		$post = $this->repository->create(
			$command->user, 
			$command->name,
			$command->facebook_copy,
			$command->twitter_copy
		);

		$extension = '.' . $command->image->guessExtension();
		$timestamp = Carbon::now()->timestamp;
		$name = snake_case($command->name);

		$fileName = $name . '_' . $timestamp . $extension;
		$path = 'images/uploads';

		$command->image->move($path, $fileName);

		$image = new PostImage;
		$image->file_name = $fileName;
		$image->file_path = $path;
		$image->post()->associate($post);
		$image->save();

		return $post;
	}

}
