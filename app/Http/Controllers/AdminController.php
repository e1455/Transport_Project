<?php namespace App\Http\Controllers;


use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditRequest;
use App\Http\Requests\ExistRequest;
use App\Http\Requests\HireEmployeeRequest;
use App\Http\Requests;
use App\Service;
use Illuminate\Http\Request;
use App\User;
use App\Vehicle;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $employees = Employee::with('user')->get();
        return view('admin.employee.index',compact('employees'))->with('title','Employees\'s List');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        return view('admin.employee.create',compact('vehicles'))->with('title','Hire Employee');
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

        return redirect()->route('CreateEmployee')->with('message','Employee Informations Have Been Saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function pay(Request $request)
    {
        $user_id       = "'".$request->get('user_id')."'";
        $customer_info = "'".$request->get('customer_info')."'";

        DB::update("update service set payed = '1' where user_id = $user_id AND customer_info = $customer_info");

        return redirect()->back()->with('message','Payment Was Successful.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     * @internal param int $id
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $employee->load('user');
        $vehicles = Vehicle::all();
        return view('admin.employee.edit',compact('employee','vehicles'))->with('title','Edit Information');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @return Response
     * @internal param int $id
     */
    public function update(EditRequest $request)
    {

        $user = User::find($request->get('id'));
        $user->update($request->get('user'));

        $employee = Employee::find($request->get('id'));
        $employee->update($request->get('employee'));

        return redirect()->route('EditEmployee',['id'=>$request->get('id')])->with('message','Changes Have Saved!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ExistRequest $request
     * @return Response
     * @internal param int $id
     */
    public function destroy(ExistRequest $request)
    {
        User::destroy($request->get('user_id'));
        return redirect()->back()->with('message','Employee\'s Data Have Been Deleted!');
    }


    public function report ($id,$name,Request $request)
    {
        $sql = "";
        $totalWage = 0;
        $totalPayed = 0;

        $dates = Service::select('date_service')->where('user_id',$id)->groupBy('date_service')->get();

        $employee = Employee::find($id);
        $employee->load('user');



        $from_date = $request->get('from_date');
        $to_date   = $request->get('to_date');
        $from_time = $request->get('from_time');
        $to_time   = $request->get('to_time');


        $sql .= $from_date ? " date_service >= '".$from_date."' AND " :"";
        $sql .= $to_date   ? " date_service <= '".$to_date."' AND " :"";
        $sql .= $from_time ? " start_service >= '".$from_time."' AND " :"";
        $sql .= $to_time   ? " end_service <= '".$to_time."' AND " :"";
        $sql .= "user_id = '".$id."'";


        $services = DB::select("select *,distance * ".$employee->wage_over_distance." as wage from service where $sql");
        return view('admin.employee.report',compact('employee','dates','services','from_date','to_date','from_time','to_time','totalWage','totalPayed'))->with('title','Report');

    }





}
