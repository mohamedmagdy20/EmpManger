@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title"> @lang('lang.edit') @lang('lang.users')</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('lang.dashboard')</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.users.index')}}">@lang('lang.users')</a></li>
        <li class="breadcrumb-item active"><a href="{{route('dashboard.users.create')}}">@lang('lang.edit') @lang('lang.users')</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('lang.edit') {{$data->name}} </h4>
            <form class="forms-sample" method="POST" action="{{route('dashboard.users.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">@lang('lang.name')</label>
                            <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{old('name', $data->name ?? '')}}" placeholder="Name">
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">@lang('lang.email')</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail3"  value="{{old('email', $data->email ?? '')}}" placeholder="Email">
                            @error('email')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.password')</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword4"  value="{{old('password')}}" placeholder="Password">
                          </div>
                          @error('email')
                          <span class="text-danger"> {{ $message }} </span>
                          @enderror
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.confirm_password')</label>
                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword4"  value="{{old('password_conformation')}}" placeholder="Password">
                          </div>
                    </div>

                    <div class="col-md-6">
                        <label for="status">@lang('lang.status')</label>

                        <div class="form-group ml-5">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="status"   id="flexSwitchCheckChecked"  {{ $data->status ? 'checked' : ''}}>
                            </div>
                            @error('status')
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
                          <img class="w-25" src="{{asset('uploads/users/'.$data->image)}}" alt="">

                          <div id="img-preview"></div>
                
                          
                    </div>


                    <div class="col-md-12">
                        <label for="">@lang('lang.role')</label>

                        <div class="form-group ml-5">

                            @foreach ($roles as $d )
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$d->name}}" name="role[]" id="{{$d->name}}" {{ $data->hasRole($d->name)? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{$d->name}}">
                                         {{$d->display_name}}
                                        </label>
                                    </div>
                            @endforeach
                        </div>
                        @error('role')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
              
            
            
              <button type="submit" class="btn btn-primary mr-2">@lang('lang.submit')</button>
              <a href="{{route('dashboard.users.index')}}" class="btn btn-light">@lang('lang.cencel')</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
@endsection