@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title">@lang('lang.create') @lang('lang.users')</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('lang.dashboard')</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.employees.index')}}">@lang('lang.employees')</a></li>
        <li class="breadcrumb-item active"><a href="{{route('dashboard.employees.create')}}">@lang('lang.create') @lang('lang.employees')</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('lang.create') @lang('lang.employees')</h4>
            <form class="forms-sample" method="POST" action="{{route('dashboard.employees.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">@lang('lang.name')</label>
                            <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{old('name')}}" placeholder="@lang('lang.name')">
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">@lang('lang.email')</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail3"  value="{{old('email')}}" placeholder="@lang('lang.email')">
                            @error('email')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">@lang('lang.phone')</label>
                            <input type="phone" class="form-control" name="phone" id="exampleInputEmail3"  value="{{old('phone')}}" placeholder="@lang('lang.phone')">
                            @error('phone')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">@lang('lang.date_of_birth')</label>
                            <input type="date" class="form-control" name="age" id="exampleInputEmail3"  value="{{old('date')}}" placeholder="">
                            @error('age')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.password')</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword4"  value="{{old('password')}}" placeholder="@lang('lang.password')">
                          </div>
                          @error('password')
                          <span class="text-danger"> {{ $message }} </span>
                          @enderror
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.confirm_password')</label>
                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword4"  value="{{old('password_conformation')}}" placeholder="@lang('lang.confirm_password')">
                          </div>
                    </div>

                    <div class="col-md-6">
                        <label for="status">@lang('lang.status')</label>

                        <div class="form-group ml-5">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="status"   id="flexSwitchCheckChecked"  checked>
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


                          <div id="img-preview"></div>
                
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">@lang('lang.job')</label>
                            <select name="job_id" class="form-select" id="">
                                @foreach ($jobs as $job)
                                    <option value="{{old('job_id',$job->id)}}">{{$job->name}}</option>
                                @endforeach
                            </select>
                            @error('job_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.salary')</label>
                            <input type="number" class="form-control" name="salary" id="exampleInputPassword4"  value="{{old('salary')}}" placeholder="@lang('lang.salary')">
                          </div>
                          @error('salary')
                          <span class="text-danger"> {{ $message }} </span>
                          @enderror  
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.national_id')</label>
                            <input type="number" class="form-control" name="national_id" id="exampleInputPassword4"  value="{{old('national_id')}}" placeholder="@lang('lang.national_id')">
                          </div>
                          @error('national_id')
                            <span class="text-danger"> {{ $message }} </span>
                          @enderror  
                    </div>

                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword4">@lang('lang.gender')</label>
                            <select name="gender" class="form-select" id="">
                                <option value="{{old('gender','male')}}">@lang('lang.male')</option>
                                <option value="{{old('gender','female')}}">@lang('lang.female')</option>

                            </select>
                          </div>
                          @error('gender')
                            <span class="text-danger"> {{ $message }} </span>
                          @enderror  
                    </div>

                </div>
              
            
            
              <button type="submit" class="btn btn-primary mr-2">@lang('lang.submit')</button>
              <a href="{{route('dashboard.employees.index')}}" class="btn btn-light">@lang('lang.cencel')</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
@endsection