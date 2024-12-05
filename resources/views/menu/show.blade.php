@extends('myview.header')

@section('content')
<div class="container">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <h5>{{ $menu->menu_name}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
