@extends('dashboard')
@section('content')
<div class="page-header">
    <h3 class="page-title"> @lang('lang.create') @lang('lang.job')</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('lang.dashboard')</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.jobs.index')}}">@lang('lang.job')</a></li>
        <li class="breadcrumb-item active"><a href="{{route('dashboard.jobs.edit',$data->id)}}">@lang('lang.edit') @lang('lang.job')</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('lang.edit') @lang('lang.job')</h4>
            <form class="forms-sample" method="POST" action="{{route('dashboard.jobs.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName1">@lang('lang.name')</label>
                            <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{old('name', $data->name ?? '')}}" placeholder="@lang('lang.name')">
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desc">@lang('lang.description')</label>
                            <textarea name="description" class="form-control" id="desc"  cols="30" rows="10">{{old('description', $data->description ?? '')}}</textarea>
                            @error('description')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>

                </div>
              
            
            
              <button type="submit" class="btn btn-primary mr-2">@lang('lang.submit')</button>
              <a href="{{route('dashboard.jobs.index')}}" class="btn btn-light">@lang('lang.cencel')</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
@endsection