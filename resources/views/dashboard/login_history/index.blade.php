@extends('dashboard')
@section('content')


<div class="page-header">
    <h3 class="page-title"> Login History</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="">Login History</a></li>
     
      </ol>
    </nav>
    
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-6">
              <h4 class="card-title">Show Login History</h4>
            </div>
         
          </div>
  
          
          <div class="table-responsive">
              <table class="table table-striped" id="login-history">
                  <thead>
                    <tr>
                        <th class="border-0 rounded-start">Name</th>
                        <th class="border-0">IP</th>
                        <th class="border-0">Device Name</th>
                        <th class="border-0">Browser</th>
                        <th class="border-0">Date</th>
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

    
let JobsTable = null

function setLoginHistoryDatatable() {
    var url = "{{ route('dashboard.login_history.data') }}";
    
    JobsTable = $("#login-history").DataTable({
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
                data: 'name'
            },
            {
                data: 'ip'
            },
            {
                data: 'device_name'
            },
            {
                data:'browser'
            },
            {
                data: 'created_at'
            }
        ],
    });
}

setLoginHistoryDatatable();



</script>
@endsection