<?php namespace Wardrobe;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'post_images';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['file_name', 'file_path'];

	/**
	 * The relationship of the Image to the Post
	 */
	public function post() 
	{
		return $this->belongsTo('Wardrobe\Post');
	}

	public function fullPath()
	{
		return url() . '/' . $this->file_path . '/' . $this->file_name;
	}

}
