@extends('dashboard')
@section('content')


<div class="page-header">
    <h3 class="page-title"> Users</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('dashboard.roles.index')}}">Roles</a></li>
     
      </ol>
    </nav>
    
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-6">
              <h4 class="card-title">Show Roles</h4>
            </div>
            <div class="col-md-6">
              <a href="{{route('dashboard.roles.create')}}" class="btn btn-success">Add Roles <i class="fa fa-plus" style="font-size: 15px;"></i></a>
            </div>
          </div>
  
          
          <div class="table-responsive">
              <table class="table table-striped" id="role-table">
                  <thead>
                    <tr>
                      <th> Name </th>
                      <th> Description</th>
                      <th> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
  
                  </tbody>
                </table>
             
          </div>
          </div>
      </div>
    </div>
  

@endsection


@section('js')
<script>

    
let RolesTable = null

function setRolesDatatable() {
    var url = "{{ route('dashboard.roles.data') }}";
    
    UsersTable = $("#role-table").DataTable({
        processing: true,
        serverSide: true,
        dom: 'Blfrtip',
        lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],
        pageLength: 9,
        sorting: [0, "DESC"],
        ordering: false,
        ajax: url,
        
        language: {
            paginate: {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            },
        },

        
        columns: [
            {
                data: 'display_name'
            },
            {
                data: 'description'
            },
            {
                data: 'actions'
            }
        ],
    });
}

setRolesDatatable();

</script>
@endsection