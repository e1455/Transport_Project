<?php namespace App\Http\Controllers;


use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\HireEmployeeRequest;
use App\User;
use App\Vehicle;


class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$vehicles = Vehicle::all();
		return view('admin.employee.create',compact('vehicles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 *
	 * @param Requests $request
	 * @return Response
	 */
	public function store(HireEmployeeRequest $request)
	{
		$user = $request->get('user');
		$employee = $request->get('employee');

		$user = User::create($user);

		$employee['user_id'] = $user->id;
		Employee::create($employee);

		return redirect()->route('CreateEmployee');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
