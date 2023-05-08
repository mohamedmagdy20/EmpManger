@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title"> @lang('lang.change-password')</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('lang.dashboard')</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.users.profile.index')}}">@lang('lang.profile')</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form class="forms-sample" method="POST" action="{{route('dashboard.users.profile.change-password')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.old_password')</label>
                            <input type="password" class="form-control" name="old_password" id="exampleInputPassword4"  value="{{old('password')}}" placeholder="Password">
                          </div>
                          @error('old_password')
                          <span class="text-danger"> {{ $message }} </span>
                          @enderror
                        </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.password')</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword4"  value="{{old('password')}}" placeholder="Password">
                          </div>
                          @error('password')
                          <span class="text-danger"> {{ $message }} </span>
                          @enderror
                        </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.confirm_password')</label>
                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword4"  value="{{old('password_conformation')}}" placeholder="Password">
                          </div>
                    </div>

                </div>
              
            
            
              <button type="submit" class="btn btn-primary mr-2">@lang('lang.submit')</button>
              <a href="{{route('dashboard.users.profile.index')}}" class="btn btn-light">@lang('lang.cencel')</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
@endsection