@extends('admin.dashboard')
@section('css')
    <link href="{!! url('public') !!}/assets/plugins/datatables/dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
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
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> <strong>Sorting </strong> table</h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table table-hover table-dynamic">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">National Code</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Score</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($employees as $employee)
                            <tr>
                                <td class="text-center">{!! $employee->user->name !!}&nbsp;{!! $employee->user->family !!}</td>
                                <td class="text-center">{!! $employee->user->national_code !!}</td>
                                <td class="text-center">{!! $employee->user->email !!}</td>
                                <td class="text-center">{!! $employee->score !!}</td>
                                <td class="text-center">
                                    <button type="button" name="{!! $employee->user_id !!}" onclick="getUserId(this.name)"  class="btn btn-warning btn-embossed" data-toggle="modal" data-target="#full-colored" >Delete</button>
                                    <a href="{!! route('EditEmployee',['id'=>$employee->user_id]) !!}"> <button type="button" class="btn btn-dark btn-embossed">Edit</button></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="full-colored" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-orange">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="icons-office-52"></i></button>
                    <h4 class="modal-title">Danger ! </h4>
                </div>
                <div class="modal-body">
                    <p class="m-t-40">Are You Sure Want To Delete This Employee Record?  </p>



                </div>
                <div class="modal-footer">
                    <form action="{!! route('DeleteEmployee') !!}" method="post">

                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
                        <input type="hidden" name="user_id" id="user_id" >
                    <button type="button" class="btn btn-white" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{!! url('public')!!}/assets/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="{!! url('public')!!}/assets/js/pages/table_dynamic.js"></script>
    <script src="{!! url('public')!!}/assets/plugins/bootstrap-loading/lada.min.js"></script>
    <script type="text/javascript">
        function getUserId(userId){

            document.getElementById('user_id').value = userId;
        }
    </script>
@endsection