@extends('dashboard')

@section('content')

<div class="page-header">
  <h3 class="page-title">Employee Requests</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{route('dashboard.users.index')}}">Requests</a></li>
   
    </ol>
  </nav>
  
</div>
<div class="col-md-12 grid-margin stretch-card">

<div class="card">
    <div class="card-body">
   
    <div class="row justify-content-between align-items-center">

        <div class="col-md-4">
            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select name="employee_id" class="form-select select2" id="employee_id">
                    <option value="">Select Employees</option>
                    @foreach ($data as $d )
                    <option value="{{$d->id}}">{{$d->name}}</option>                        
                    @endforeach
                </select>
            </div>
          
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-select" id="type">
                    <option value="new">New</option>
                    <option value="rl">Replacement of lost</option>
                    <option value="da">Damaged allowance</option>
                    <option value="renewal">Renewal</option>
                </select>
            </div>
          
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-select" id="status">
                    <option value="{{old('status','1')}}">Active</option>
                    <option value="{{old('status','0')}}">Deactive</option>
                </select>
            </div>
          
        </div>

        
        <div class="col-md-4">
            <div class="form-group">
                <label for="request_status">Request Status</label>
                <select name="request_status" class="form-select" id="request_status">
                    <option value="new">New</option>
                    <option value="on_process">On Process</option>
                    <option value="finished">Finished</option>
                </select>
            </div>
          
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date_from">Date From</label>
                <input type="date" name="date_from" class="form-control" id="date_from">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date_from">Date To</label>
                <input type="date" name="date_to" class="form-control" id="date_to">
            </div>
        </div>

        
        <div class="col-md-6 mt-4">
            <div class="d-flex">
                <div class="form-group ">
                    <button class="btn btn-primary" onclick="handleFilter()">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="form-group ml-2">
                    <button class="btn " onclick="handleClear()">Clear</button>
                </div>
            
            </div>
            
        </div>


    

    
    </div>
</div>
        
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-6">
            <h4 class="card-title">Show Employee Requests</h4>
          </div>
          @if (auth()->user()->hasPermission('add_requests'))
          <div class="col-md-6">
            <a href="{{route('dashboard.requests.create')}}" class="btn btn-success">Add Request <i class="fa fa-plus" style="font-size: 15px;"></i></a>
          </div>
          @endif
        
        </div>

        
        <div class="table-responsive">
            <table class="table table-striped" id="employee-table">
                <thead>
                  <tr>
                    <th> Employee </th>
                    <th> Type </th>
                    <th> Status </th>
                    <th> Request Status </th>
                    <th> Change Status </th>
                    <th> Created At</th>
                    <th> Created By</th>
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

<script >

    let UsersTable = null
    
    function setUserDatatable() {
        var url = "{{ route('dashboard.requests.data') }}";
        
        UsersTable = $("#employee-table").DataTable({
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
                    data: 'employee_id'
                },
                {
                    data: 'type'
                },
                {
                    data: 'status'
                },
                {
                    data: 'request_status'
                },
                {
                  data:'change-status'
                },             
                {
                    data:'created_at'
                },
                {
                    data:'created_by'
                },
                {
                    data: 'actions'
                }
            ],
        });
    }
    
    setUserDatatable();
    
    
    function deleteConfirmation(id) {
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
    
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
                    $.ajax({
                        type: 'GET',
                        url: "{{url('requests/delete')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
    
                               
                                if(results.status == true)
                                {
                                    swal("Done!", results.message, "success");
                                    UsersTable.ajax.reload()
                               
                                }
                        },
                    });
    
                } else {
                    e.dismiss;
                }
    
            }, function (dismiss) {
                return false;
            })
        }

    function changeStatus(id,status)
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
        $.ajax({
            type: 'GET',
            url: "{{route('dashboard.requests.change-status')}}",
            data: {_token: CSRF_TOKEN,id:id,status:status},
            dataType: 'JSON',
            success: function (results) {                   
            if(results.status == true)
            {
                swal("Done!", results.message, "success");
                UsersTable.ajax.reload()
            
            }
            },
        });
  
    }

    function handleFilter() {
            employee_id = $('#employee_id').val() || '';
            type = $('#type').val() || '';
            status = $('#status').val() || '';
            
            request_status = $('#request_status').val() || '';
            date_from = $('#date_from').val() || '';
            date_to = $('#date_to').val() || '';
       
            if (UsersTable) {
                var url = "{{ route('dashboard.requests.data') }}" + `?employee_id=${employee_id}&type=${type}&status=${status}&request_status=${request_status}&date_from=${date_from}&date_to=${date_to}`;
                // console.log(url);
                UsersTable.ajax.url(url).load()
            }
        }

        function handleClear() {
            
            $('#employee_id').val('');
            $('#type').val('');
            $('#status').val('');
            
            $('#request_status').val('');
            $('#date_from').val('');
            $('#date_to').val('');
     
            if (UsersTable) {
                var url = "{{ route('dashboard.requests.data') }}";
                UsersTable.ajax.url(url).load()
            }
        }


</script>
    
@endsection