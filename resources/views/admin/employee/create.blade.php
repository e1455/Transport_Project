@extends('admin.dashboard')
@section('content')
    <div class="header">
        <h2 style="visibility: hidden">Tables <strong>Dynamic</strong></h2>
        <div class="breadcrumb-wrapper">

            <ol class="breadcrumb" >
                <li style="text-transform: capitalize;font-size:1em;"><a href="{!! route('ShowEmployee') !!}">Employees list</a>
                </li>
                <li class="active" style="text-transform: capitalize;font-size:1em;">Hire An Employee</li>
            </ol>
        </div>
    </div>

    @include('errors.message')
    <div class="row">
        <form role="form" class="form-horizontal form-validation" method="post" action="{!! route('StoreEmployee') !!}">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-header bg-primary-dark">
                        <h2 class="panel-title" style="text-transform: capitalize"><i class="glyphicon glyphicon-user"></i>Personal Information</h2>
                    </div>
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br>

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="user[role_id]" value="2">

                                    {{-- Name --}}
                                    <div class="form-group @if($errors->has('user.name')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="name">Name</label>
                                        <div class="col-sm-9 ">
                                            <input type="text" name="user[name]"  id="name" class="form-control"  value="{!! old('user.name') !!}" required />
                                            @if($errors->has('user.name')) <span style="color: red"> {!! $errors->first('user.name') !!} </span>@endif

                                        </div>

                                    </div>

                                    {{-- Family --}}
                                    <div class="form-group @if($errors->has('user.family')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="family">Family</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user[family]" id="family" class="form-control" value="{!! old('user.family') !!}" required />
                                            @if($errors->has('user.family')) <span style="color: red"> {!! $errors->first('user.family') !!} </span>@endif

                                        </div>

                                    </div>

                                    {{--Email--}}
                                    <div class="form-group @if($errors->has('user.email')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="email">Email </label>
                                        <div class="col-sm-9">
                                            <input type="email" name="user[email]" id="email" class="form-control" value="{!! old('user.email') !!}" required />
                                            @if($errors->has('user.email')) <span style="color: red"> {!! $errors->first('user.email') !!} </span>@endif

                                        </div>
                                    </div>

                                    {{-- National Code --}}
                                    <div class="form-group @if($errors->has('user.national_code')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="national_code">National Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="user[national_code]" id="national_code" class="form-control" value="{!! old('user.national_code') !!}" required />
                                            @if($errors->has('user.national_code')) <span style="color: red"> {!! $errors->first('user.national_code') !!} </span>@endif
                                        </div>
                                    </div>

                                    {{-- Password --}}
                                    <div class="form-group @if($errors->has('user.password')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="password">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="user[password]" id="password"  class="form-control" value="{!! old('user.password')!!}" required />
                                            @if($errors->has('user.password')) <span style="color: red"> {!! $errors->first('user.password') !!} </span>@endif

                                        </div>
                                    </div>

                                    {{-- Confirm Password --}}
                                    <div class="form-group @if($errors->has('user.password_confirmation')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="password_confirmation">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="user[password_confirmation]" id="password_confirmation"  class="form-control" value="{!! old('user.password_confirmation')!!}" required />
                                            @if($errors->has('user.password_confirmation')) <span style="color: red"> {!! $errors->first('user.password_confirmation') !!} </span>@endif

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
                        <div class="panel-header bg-blue-dark">
                            <h2 class="panel-title" style="text-transform: capitalize"><i class="fa fa-clipboard"></i>Contract Information</h2>
                        </div>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <br>


                                    {{-- Vehicle Type --}}
                                    <div class="form-group @if($errors->has('employee.vehicle_id')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="vehicle_id">Vehicle Type</label>
                                        <div class="col-sm-9">
                                            <select name="employee[vehicle_id]" id="vehicle_id" class="form-control">
                                                <option value="-1" selected> Choose Vehicle </option>
                                                @foreach($vehicles as  $vehicle)
                                                        <option value="{!! $vehicle->id !!}" @if(old('employee.vehicle_id') == $vehicle->id) selected @endif>{!! $vehicle->name !!}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('employee.vehicle_id')) <span style="color: red"> {!! $errors->first('employee.vehicle_id') !!} </span>@endif

                                        </div>

                                    </div>

                                    {{-- Vehicle Plate Number --}}
                                    <div class="form-group @if($errors->has('employee.plate_number')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="plate_number">Plate Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="employee[plate_number]" id="plate_number" class="form-control" value="{!! old('employee.plate_number')!!}" required />
                                            @if($errors->has('employee.plate_number')) <span style="color: red"> {!! $errors->first('employee.plate_number') !!} </span>@endif

                                        </div>

                                    </div>

                                    {{-- Start Work Hours --}}
                                    <div class="form-group @if($errors->has('employee.start_service')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="start_service">Start Work Hours </label>
                                        <div class="col-sm-9 ">
                                            <input type="text" data-mask="99:99:99" name="employee[start_service]" id="start_service" class="form-control" placeholder="00:00:00" value="{!! old('employee.start_service')!!}" required />
                                            @if($errors->has('employee.start_service')) <span style="color: red"> {!! $errors->first('employee.start_service') !!} </span>@endif

                                        </div>
                                    </div>

                                    {{-- End Work Hours --}}
                                    <div class="form-group @if($errors->has('employee.end_service')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="end_service">End Work Hours</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-mask="99:99:99" name="employee[end_service]" id="end_service" placeholder="00:00:00" class="form-control" value="{!! old('employee.end_service')!!}"  required />
                                            @if($errors->has('employee.end_service')) <span style="color: red"> {!! $errors->first('employee.end_service') !!} </span>@endif

                                        </div>
                                    </div>

                                    {{-- Wage For Distance --}}
                                    <div class="form-group @if($errors->has('employee.wage_over_distance')) has-error @endif">
                                        <label class="col-sm-3 control-label" for="wage_over_distance">Wage For Distance</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="employee[wage_over_distance]" id="wage_over_distance" value="{!! old('employee.wage_over_distance')!!}"  class="form-control"/>
                                            @if($errors->has('employee.wage_over_distance')) <span style="color: red"> {!! $errors->first('employee.wage_over_distance') !!} </span>@endif

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

@section('js')
    <script src="{!! url('public') !!}/assets/plugins/bootstrap/js/jasny-bootstrap.min.js"></script>
    @endsection