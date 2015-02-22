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
			'text' => 'required|max:255',
			'image' => 'image',
			'longitude' => 'required',
			'latitude' => 'required'
		];

		return $rules;
	}

}
