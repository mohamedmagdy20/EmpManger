@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title">@lang('lang.profile')</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('lang.dashboard')</a></li>
        <li class="breadcrumb-item active "><a href="{{route('dashboard.users.profile.index')}}">@lang('lang.profile')</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('lang.profile')</h4>
            <form class="forms-sample" method="POST" action="{{route('dashboard.users.profile.edit-profile')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">@lang('lang.name')</label>
                            <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{old('name',auth()->user()->name)}}" placeholder="Name">
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">@lang('lang.email')</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail3"  value="{{old('email',auth()->user()->email)}}" placeholder="Email">
                            @error('email')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label>@lang('lang.image')</label>
                            <input type="file" name="image" id="choose-file" class="form-control">
                            @error('image')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror                           
                          </div>


                          <div id="img-preview"></div>
                          <img class="w-25" src="{{asset('uploads/users/'.auth()->user()->image)}}" alt="">
                
                    </div>


                </div>
              
            
            
              <button type="submit" class="btn btn-primary mr-2">@lang('lang.submit')</button>
              <a href="{{route('dashboard.users.profile.change-password-view')}}" class="btn btn-danger">@lang('lang.change-password')</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
@endsection