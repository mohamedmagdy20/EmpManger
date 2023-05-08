@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title"> @lang('lang.show') {{$data->employee->name}} @lang('lang.requests')</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('lang.dashboard')</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.requests.index')}}">@lang('lang.requests')</a></li>
        <li class="breadcrumb-item active"><a href="#">@lang('lang.show') @lang('lang.requests')</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row justify-content-around">
                <h4 class="card-title">{{$data->employee->name}} @lang('lang.requests')</h4>
            </div>
            <div>{!! $data->description !!}</div>


            <div class="form-group">
                <a href="{{route('dashboard.requests.edit',$data->id)}}" class="btn btn-primary">@lang('lang.edit')</a>
    
                <a href="{{route('dashboard.requests.index')}}" class="btn btn-light">@lang('lang.cencel')</a>
            </div>
          </div>
          
        </div>

        
      </div>
</div>

@stop
