@extends('dashboard')

@section('content')
<div class="page-header">
    <h3 class="page-title"> Edit Requests</h3>
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
            <h4 class="card-title">Edit Requests</h4>
            <form class="forms-sample" method="POST" action="{{route('dashboard.requests.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputemployee1">Employees</label>
                        <div class="form-group">
                            <select name="employee_id" class="form-select" id="">
                                @foreach ($emps as $d )
                                    <option value="{{$d->id}}" {{ old('employee_id', $data->employee_id ?? null) == $d->id ? 'selected' : '' }}>{{$d->name}}</option>
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
                                <option value="new" {{ old('type','new' ?? null) == $data->type ? 'selected' : '' }}>New</option>
                                <option value="rl" {{ old('type', 'rl' ?? null) == $data->type ? 'selected' : '' }}>Replacement of lost</option>
                                <option value="da" {{ old('type','da' ?? null) == $data->type ? 'selected' : '' }}>Damaged allowance</option>
                                <option value="renewal" {{ old('type', 'renewal' ?? null) == $data->type ? 'selected' : '' }}>Renewal</option>
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
                                <input class="form-check-input" type="checkbox" role="switch" name="status"   id="flexSwitchCheckChecked" {{ $data->status ? 'selected' : '' }}  >
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
              <a href="{{route('dashboard.requests.index')}}" class="btn btn-light">Cancel</a>
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