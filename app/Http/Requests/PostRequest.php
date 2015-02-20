<?php namespace Wardrobe\Http\Requests;

use Wardrobe\Http\Requests\Request;

class PostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'name' => 'required|max:255',
			'facebook_copy' => 'required|max:500',
			'twitter_copy' => 'required|max:140',
			'image' => 'required|image',
		];

		return $rules;
	}

}
