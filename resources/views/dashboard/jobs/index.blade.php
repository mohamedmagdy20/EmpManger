@extends('dashboard')
@section('content')


<div class="page-header">
    <h3 class="page-title"> Jobs</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="">Jobs</a></li>
     
      </ol>
    </nav>
    
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-6">
              <h4 class="card-title">Show Jobs</h4>
            </div>
            @if (auth()->user()->hasPermission('add_jobs'))
              <div class="col-md-6">
                <a href="{{route('dashboard.jobs.create')}}" class="btn btn-success">Add Jobs <i class="fa fa-plus" style="font-size: 15px;"></i></a>
              </div>                
            @endif
          </div>
  
          
          <div class="table-responsive">
              <table class="table table-striped" id="job-table">
                  <thead>
                    <tr>
                      <th> Name </th>
                      <th> Description</th>
                      <th>Created By</th>
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

    
let JobsTable = null

function setRolesDatatable() {
    var url = "{{ route('dashboard.jobs.data') }}";
    
    JobsTable = $("#job-table").DataTable({
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
                data: 'description'
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

setRolesDatatable();


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
                    url: "{{url('jobs/delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                            console.log(results);
                            if(results.status == true)
                            {
                                swal("Done!", results.message, "success");
                                JobsTable.ajax.reload()
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



</script>
@endsection