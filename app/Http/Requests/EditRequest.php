<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditRequest extends Request {

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
		return [
			'id' 				          => 'required|integer|exists:users,id',
			'user.name' 				  => 'required|string|max:100|min:3',
			'user.family' 				  => 'required|string|max:100',
			'user.email' 				  => 'required|email|max:100|unique:users,email,'.$this->get('id'),
			'user.national_code'		  => 'required|string|max:15|unique:users,national_code,'.$this->get('id'),
			'employee.vehicle_id' 		  => 'required|exists:vehicle,id',
			'employee.plate_number' 	  => 'required|unique:employee,plate_number,'.$this->get('id').',user_id',
			'employee.start_service'	  => 'required|date_format:H:i:s',
			'employee.end_service'        => 'required|date_format:H:i:s',
			'employee.wage_over_distance' => 'required|numeric',
			'employee.score'			  => 'required|min:0|max:100'
		];
	}

}
