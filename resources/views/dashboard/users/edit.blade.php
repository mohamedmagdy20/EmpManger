@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title"> Add User</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.users.index')}}">Users</a></li>
        <li class="breadcrumb-item active"><a href="{{route('dashboard.users.create')}}">Edit User</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit {{$data->name}} Info</h4>
            <form class="forms-sample" method="POST" action="{{route('dashboard.users.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{old('name', $data->name ?? '')}}" placeholder="Name">
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail3"  value="{{old('email', $data->email ?? '')}}" placeholder="Email">
                            @error('email')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword4"  value="{{old('password')}}" placeholder="Password">
                          </div>
                          @error('email')
                          <span class="text-danger"> {{ $message }} </span>
                          @enderror
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword4">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword4"  value="{{old('password_conformation')}}" placeholder="Password">
                          </div>
                    </div>

                    <div class="col-md-6">
                        <label for="status">Status</label>

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
                            <label>Image</label>
                            <input type="file" name="image" id="choose-file" class="form-control">
                            @error('image')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror                           
                          </div>
                          <img src="{{asset('uploads/users/'.$data->image)}}" alt="">

                          <div id="img-preview"></div>
                
                          
                    </div>


                    <div class="col-md-12">
                        <label for="">Roles</label>

                        <div class="form-group ml-5">

                            @foreach ($roles as $d )
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$d->name}}" name="role" id="{{$d->name}}" {{  optional($data->roles())->name == $d->name ? 'checked' : '' }}>
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
              
            
            
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{route('dashboard.users.index')}}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
@endsection