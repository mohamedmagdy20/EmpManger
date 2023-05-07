@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title"> Add User</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('dashboard.requests.index')}}">Requests</a></li>
        <li class="breadcrumb-item active"><a href="{{route('dashboard.requests.create')}}">Add Requests</a></li>
      </ol>
    </nav>
    
  </div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Role</h4>
            <form class="forms-sample" method="POST" action="{{route('dashboard.requests.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputemployee1">Employees</label>
                        <div class="form-group">
                            <select name="employee_id" class="form-select" id="">
                                @foreach ($data as $d )
                                    <option value="{{old('employee_id',$d->id)}}">{{$d->name}}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-select" id="type">
                                <option value="new">New</option>
                                <option value="rl">Replacement of lost</option>
                                <option value="da">Damaged allowance</option>
                                <option value="renewal">Renewal</option>
                            </select>
                            @error('type')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="status">Status</label>

                        <div class="form-group ml-5">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="status"   id="flexSwitchCheckChecked"  checked>
                            </div>
                            @error('status')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                       
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desc">Descriptions</label>
                            <textarea name="description" class="form-control description" id="description"  cols="30" rows="10">{{old('description')}}</textarea>
                            @error('description')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror  
                        </div>
                    </div>

                </div>
              
            
            
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{route('dashboard.jobs.index')}}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description');
</script>
@endsection