<?php namespace Wardrobe\Repositories\Post;

interface PostRepository {

	public function all();

	public function create($user, $name, $facebook_copy, $twitter_copy);

	public function get($id);

	public function update($id, $user, $name, $facebook_copy, $twitter_copy);

	public function delete($id);
	
}
