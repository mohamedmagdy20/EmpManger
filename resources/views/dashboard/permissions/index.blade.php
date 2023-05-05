@extends('dashboard')
@section('content')

<div class="page-content">
    <div class="container-fluid">
    
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
    
                <h4 class="card-title">Edit Permissions For {{$role->display_name}}</h4>
                
                <form method="post" action="{{ route('dashboard.permissions.update',$role->id) }}"  class="needs-validation"  novalidate >
                    @csrf
    
                <div class="row mb-3 ml-4">
                    @foreach ($permissions as $permission)
                    <div class="col-md-2 bg-white">
                        <div class="">
                            <div class="checkbox checkbox-primary mb-2">
                                <input id="{{ $permission->id }}" type="checkbox"
                                    {{ $role->hasPermission($permission->name) ? 'checked' : '' }}
                                    value="{{ $permission->id }}" name="permissions[]" class="form-check-input" >
                                <label for="{{ $permission->id }}">{{ $permission->display_name }}</label>
                            </div>
                        </div>
                    </div> <!-- end col-->
                @endforeach
                </div>
    
                
                <!-- end row -->
    
                 <input type="submit" class="btn btn-primary " value="Save">
                 <a href="{{route('dashboard.roles.index')}}" class="btn btn-light">Cencel</a>
                </form>
                 
               
               
            </div>
        </div>
    </div> <!-- end col -->
    </div>
     
    
    
    </div>
    </div>
    
    
@endsection

