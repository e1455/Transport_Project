@extends('admin.dashboard')

@section('css')
    <link href="{!! url('public') !!}/assets/plugins/datatables/dataTables.min.css" rel="stylesheet">
@endsection

@section('content')

    <div class="header">
        <h2 style="visibility: hidden">Tables <strong>Dynamic</strong></h2>
        <div class="breadcrumb-wrapper">

            <ol class="breadcrumb" >
                <li style="text-transform: capitalize;font-size:1em;"><a href="{!! route('ShowEmployee') !!}">Employees list</a>
                </li>
                <li class="active" style="text-transform: capitalize;font-size:1em;">{!! $employee->user->name." ".$employee->user->family." Services" !!}</li>
            </ol>
        </div>
    </div>


    @include('errors.message')

    <div class="col-md-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h1><i class="glyphicon glyphicon-list-alt"></i> Report Of Services</h1>
                <br/>
                <br/>
                <h2 >Employee Information</h2>
                <hr/>

                <div class="form-group">

                    <div class="col-lg-4">
                        <lable class="col-lg-12 control-label">Employee Name : {!! $employee->user->name !!}&nbsp;{!! $employee->user->family !!}</lable>
                    </div>

                    <div class="col-lg-4">
                        <lable class="col-lg-12 control-label">Vehicle Name : {!! $employee->vehicle->name !!}</lable>
                    </div>

                    <div class="col-lg-4">
                        <lable class="col-lg-12 control-label">Wage : {!! $employee->wage_over_distance !!}&nbsp;$</lable>
                    </div>

                </div>
                <br>
                <br>
                <br>
                <div class="form-group">

                    <div class="col-lg-4">
                        <lable class="col-lg-12 control-label">Start Work : {!! $employee->start_service !!}</lable>
                    </div>

                    <div class="col-lg-4">
                        <lable class="col-lg-12 control-label">End Work : {!! $employee->end_service !!}</lable>
                    </div>


                </div>

                <br/>
                <br/>
                <br/>
                <h2>Filter For Search</h2>
                <hr>
                <br>

                <form  method="get">
                    <div class="form-group">

                        <div class="col-lg-6">
                            <label  for="from_date" class="col-lg-3 control-label">From Date : </label>
                            <div class="col-lg-9">
                                <select name="from_date" id="from_date">
                                    <option value="">Select Date</option>
                                    @foreach($dates as $date)
                                        <option value="{!! $date->date_service !!}" @if($from_date == $date->date_service ) selected @endif>{!! $date->date_service !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="to_date" class="col-lg-3 control-label">To Date : </label>
                            <div class="col-lg-9">
                                <select name="to_date" id="to_date">
                                    <option value="">Select Date</option>
                                    @foreach($dates as $date)
                                        <option value="{!! $date->date_service !!}" @if($to_date == $date->date_service ) selected @endif>{!! $date->date_service !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <br/>
                    <br/>
                    <br/>


                    <div class="form-group">
                        <div class="col-lg-6">

                            <label for="from_time" class="col-lg-3 control-label">Start Time : </label>

                            <div class="col-lg-9">
                                <select name="from_time" id="from_time">
                                    <option value="">Select Time</option>
                                    @for($i=8; $i<=18; $i++ )
                                        <option value="{!! $i !!}:00:00" @if($from_time == $i.":00:00" ) selected @endif>{!! $i !!}:00:00</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <label for="to_time" class="col-lg-3 control-label">End Time : </label>

                            <div class="col-lg-9">
                                <select name="to_time" id="to_time">
                                    <option value="">Select Time</option>
                                    @for($i=8; $i<=18; $i++ )
                                        <option value="{!! $i !!}:00:00" @if($to_time == $i.":00:00" ) selected @endif>{!! $i !!}:00:00</option>
                                    @endfor
                                </select>
                            </div>
                        </div>



                    </div>

                    <br/>
                    <br/>
                    <br/>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">Search!</button>
                        </div>
                    </div>



                </form>



                <br/>
                <br/>
                <br/>
                <br/>



                <h2>Billing</h2>
                <hr/>
                <div class="form-group">

                    <div class="col-lg-4">
                        <lable style="font-size: 1.1em" class="col-lg-12 control-label">Total Woks : {!! count($services) !!}</lable>
                    </div>

                    <div class="col-lg-4">
                        <lable style="font-size: 1.1em" class="col-lg-12 control-label">Total For Pay : @foreach($services as $service) <?php if($service->payed != 1) $totalWage += $service->wage; ?> @endforeach {!! $totalWage." $" !!}</lable>
                    </div>

                    <div class="col-lg-4">
                        <lable style="font-size: 1.1em" class="col-lg-12 control-label">Total Payed : @foreach($services as $service) <?php if($service->payed != 0) $totalPayed += $service->wage; ?> @endforeach {!! $totalPayed." $" !!}</lable>
                    </div>

                </div>
                <br/>
            </div>
            <br/>
            <br/>
            <div class="panel-content">
                <table class="table table-hover table-dynamic">
                    <thead>
                    <tr>
                        <th class="text-center" style="text-transform: capitalize">Customer Name</th>
                        <th class="text-center" style="text-transform: capitalize">Date Service</th>
                        <th class="text-center" style="text-transform: capitalize">Start Time </th>
                        <th class="text-center" style="text-transform: capitalize">End Time</th>
                        <th class="text-center" style="text-transform: capitalize">Distance(Km)</th>
                        <th class="text-center" style="text-transform: capitalize">Wage</th>
                        <th class="text-center" style="text-transform: capitalize">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if($services != null)
                        @foreach($services as $service)
                            <tr>
                                <td class="text-center"><a href="#">{!! ucwords($service->customer_info) !!}</a></td>
                                <td class="text-center">{!! $service->date_service  !!}</td>
                                <td class="text-center">{!! $service->start_service !!}</td>
                                <td class="text-center">{!! $service->end_service !!}</td>
                                <td class="text-center">{!! $service->distance !!}</td>
                                <td >{!! $service->wage !!}&nbsp;$</td>
                                <td>
                                    @if($service->payed == 0)
                                        <form action="{!! route('Pay') !!}" method="post">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <input type="hidden" name="user_id" value="{!! $service->user_id !!}">
                                            <input type="hidden" name="customer_info" value="{!! $service->customer_info !!}">
                                            <button type="submit"  class="btn btn-primary btn-embossed"  ><i class="fa fa-money"></i>Payment</button>
                                        </form>
                                            @else
                                        <button type="button" class="btn btn-success"><i class="icons-office-51"></i>Payed</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


@section('js')
    <script src="{!! url('public')!!}/assets/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="{!! url('public')!!}/assets/js/pages/table_dynamic.js"></script>
    <script src="{!! url('public')!!}/assets/plugins/bootstrap-loading/lada.min.js"></script>
@endsection