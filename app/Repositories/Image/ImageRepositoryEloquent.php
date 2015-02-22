<?php namespace Wardrobe\Repositories\Image;

use Wardrobe\Post;
use Wardrobe\Image;
use Carbon\Carbon;

class ImageRepositoryEloquent implements ImageRepository {

	public function create($image, $name, $post)
	{
		$extension = $image->guessExtension();
		$timestamp = Carbon::now()->timestamp;
		$fileName = snake_case($name) . '_' . $timestamp . '.' . $extension;
		$path = 'images/uploads';
		$image->move($path, $fileName);

		$postImage = new PostImage;
		$postImage->file_name = $fileName;
		$postImage->file_path = $path;
		$postImage->post()->associate($post);
		$postImage->save();
	}

}