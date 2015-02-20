<?php namespace Wardrobe\Repositories\Post;

use Wardrobe\Post;
use Wardrobe\User;

class PostRepositoryEloquent implements PostRepository {

	protected $post;
	
	/**
	 * @param Wardrobe\Post
	 */
	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	/**
	 * Get all posts
	 * @param  integer $perPage
	 * @param  string $orderBy
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function all() {
		return $this->post->all();
	}

	/**
	 * Create new post
	 * @param  Wardrobe\User $user
	 * @param  string $name
	 * @param  string $facebook_copy
	 * @param  string $twitter_copy
	 * @return Wardrobe\Post
	 */
	public function create($user, $name, $facebook_copy, $twitter_copy) {
		$this->post->user()->associate($user);
		$this->post->name = $name;
		$this->post->facebook_copy = $facebook_copy;
		$this->post->twitter_copy = $twitter_copy;
		$this->post->save();
		return $this->post;
	}

	/**
	 * Get post by id
	 * @param  integer $id 
	 * @return Wardrobe\Post
	 */
	public function get($id) {
		return Post::findOrFail($id);
	}

	/**
	 * Create new post
	 * @param integer $id
	 * @param  Wardrobe\User $user
	 * @param  string $name
	 * @param  string $facebook_copy
	 * @param  string $twitter_copy
	 * @return Wardrobe\Post
	 */
	public function update($id, $user, $name, $facebook_copy, $twitter_copy) {
		$post = $this->get($id);
		$post->user()->associate($this->user);
		$post->name = $this->name;
		$post->facebook_copy = $this->facebook_copy;
		$post->twitter_copy = $this->twitter_copy;
		$post->save();
		return $post;
	}

	/**
	 * Delete post by id
	 * @param  integer $id 
	 * @return boolean
	 */
	public function delete($id) {
		$post = $this->get($id);
		return $post->delete();
	}
}
