@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title"> Add User</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.roles.index')}}">Roles</a></li>
        <li class="breadcrumb-item active"><a href="">Edit Roles</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Role</h4>
            <form class="forms-sample" method="POST" action="{{route('dashboard.roles.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="display_name" id="exampleInputName1" value="{{old('display_name', $data->display_name ?? '')}}" placeholder="Name">
                            @error('display_name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desc">Descriptions</label>
                            <textarea name="description" class="form-control" id="desc"  cols="30" rows="10">{{old('description', $data->description ?? '')}}</textarea>
                            @error('description')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>

                </div>
              
            
            
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{route('dashboard.roles.index')}}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
@endsection