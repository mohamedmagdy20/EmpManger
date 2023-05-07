@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title"> Show {{$data->employee->name}} Request</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.requests.index')}}">Requests</a></li>
        <li class="breadcrumb-item active"><a href="#">Show Requests</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row justify-content-around">
                <h4 class="card-title">{{$data->employee->name}} Requests</h4>
            </div>
            <div>{!! $data->description !!}</div>


            <div class="form-group">
                <a href="{{route('dashboard.requests.edit',$data->id)}}" class="btn btn-primary">Edit</a>
    
                <a href="{{route('dashboard.requests.index')}}" class="btn btn-light">Cancel</a>
            </div>
          </div>
          
        </div>

        
      </div>
</div>

@stop
