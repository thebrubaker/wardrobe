<?php namespace Wardrobe;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'facebook_copy', 'twitter_copy'];

	/**
	 * The relationship of the Post to the User
	 */
	public function user() 
	{
		return $this->belongsTo('Wardrobe\User');
	}

	/**
	 * The relationship of the Post to the Image
	 */
	public function image() 
	{
		return $this->hasOne('Wardrobe\PostImage');
	}

}
