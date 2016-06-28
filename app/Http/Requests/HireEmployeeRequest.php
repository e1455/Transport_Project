<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class HireEmployeeRequest extends Request {

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
			'user.role_id' => 'required|integer|max:2|min:2',
			'user.name' => 'required|string|max:100|min:3',
			'user.family' => 'required|string|max:100',
			'user.email' => 'required|email|max:100|unique:users,email',
			'user.national_code' => 'required|string|max:15|unique:users,national_code',
			'user.password' => 'required|max:60|confirmed',
			'user.password_confirmation' => 'required|max:60',
			'employee.vehicle_id' => 'required|exists:vehicle,id',
			'employee.plate_number' => 'required|unique:employee,plate_number',
			'employee.start_service' => 'required|date_format:h:i',
			'employee.end_service' => 'required|date_format:h:i|after:employee.start_service',
			'employee.wage_over_distance' => 'required'
		];
	}

}
