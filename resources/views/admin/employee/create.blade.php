@extends('admin.dashboard')
@section('content')
    <div class="header">
        <h2>Tables <strong>Dynamic</strong></h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li><a href="dashboard.html">Home</a>
                </li>
                <li><a href="tables.html">Employee</a>
                </li>
                <li class="active">Hire New Employee</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <form role="form" class="form-horizontal form-validation" method="post" action="{!! route('StoreEmployee') !!}">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-header bg-purple-gradient">
                        <h2 class="panel-title">Employee Information</h2>
                    </div>
                    <div class="panel-content">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <div class="close" data-dismiss="alert">X</div>
                                <strong>اخطار!</strong> لطفا مشکلات زیر را رفع کنید<br><br>
                                <?php $i=0?>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{++$i}}-&nbsp;{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p>Help your user by validate fields before submit form values to your website.</p>
                                <br>

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="user[role_id]" value="2">

                                    {{-- Name --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="name">Name</label>
                                        <div class="col-sm-9 ">
                                            <input type="text" name="user[name]"  id="name" class="form-control"  value="{!! old('user.name') !!}" required />
                                        </div>

                                    </div>

                                    {{-- Family --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="family">Family</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user[family]" id="family" class="form-control" value="{!! old('user.family') !!}" required />
                                        </div>

                                    </div>

                                    {{--Email--}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="email">Email </label>
                                        <div class="col-sm-9">
                                            <input type="email" name="user[email]" id="email" class="form-control" value="{!! old('user.email') !!}" required />
                                        </div>
                                    </div>

                                    {{-- National Code --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="national_code">National Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user[national_code]" id="national_code" class="form-control" value="{!! old('user.national_code') !!}" required />
                                        </div>
                                    </div>

                                    {{-- Password --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="password">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="user[password]" id="password"  class="form-control" value="{!! old('user.password')!!}" required />
                                        </div>
                                    </div>

                                    {{-- Confirm Password --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="password_confirmation">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="user[password_confirmation]" id="password_confirmation"  class="form-control" value="{!! old('user.password_confirmation')!!}" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-embossed btn-success m-r-20">Store Information</button>
                                                <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Clear</button>
                                            </div>
                                        </div>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-header bg-purple-gradient">
                            <h2 class="panel-title">Employee Information</h2>
                        </div>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <p>Help your user by validate fields before submit form values to your website.</p>
                                    <br>


                                    {{-- Vehicle Type --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="vehicle_id">Vehicle Type</label>
                                        <div class="col-sm-9">
                                            <select name="employee[vehicle_id]" id="vehicle_id" class="form-control">

                                                <option value="-1" selected> Choose Vehicle </option>

                                            @foreach($vehicles as  $vehicle)
                                                    <option value="{!! $vehicle->id !!}" @if(old('employee.vehicle_id') == $vehicle->id) selected @endif>{!! $vehicle->name !!}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    {{-- Vehicle Plate Number --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="plate_number">Plate Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="employee[plate_number]" id="plate_number" class="form-control" value="{!! old('employee.plate_number')!!}" required />

                                        </div>

                                    </div>

                                    {{-- Start Work Hours --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="start_service">Start Work Hours </label>
                                        <div class="col-sm-9 ">
                                            <input type="time" name="employee[start_service]" id="start_service" class="form-control" value="{!! old('employee.start_service')!!}" required />
                                        </div>
                                    </div>

                                    {{-- End Work Hours --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="end_service">End Work Hours</label>
                                        <div class="col-sm-9">
                                            <input type="time" name="employee[end_service]" id="end_service" class="form-control" value="{!! old('employee.end_service')!!}"  required />
                                        </div>
                                    </div>

                                    {{-- Wage For Distance --}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="wage_over_distance">Wage For Distance</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="employee[wage_over_distance]" id="wage_over_distance" value="{!! old('employee.wage_over_distance')!!}"  class="form-control"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       </form>
    </div>
@endsection