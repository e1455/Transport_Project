@if(Session::has('message'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert flash alert-success bg-green ">
                <div class="close" data-dismiss="alert">X</div>
                {!! Session('message') !!}
            </div>
        </div>
    </div>
@endif