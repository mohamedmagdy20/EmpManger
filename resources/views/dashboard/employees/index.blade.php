@extends('dashboard')

@section('content')

<div class="page-header">
  <h3 class="page-title"> @lang('lang.employees')</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('lang.dashboard')</a></li>
      <li class="breadcrumb-item active"><a href="{{route('dashboard.users.index')}}">@lang('lang.employees')</a></li>
   
    </ol>
  </nav>
  
</div>
<div class="col-md-12 grid-margin stretch-card">

<div class="card">
    <div class="card-body">
   
    <div class="row justify-content-between align-items-center">
        <div class="col-md-4">
            <div class="form-group">
                <label for="gender">@lang('lang.gender')</label>
                <select name="gender" class="form-select" id="gender">
                    <option value="{{old('gender','male')}}">@lang('lang.male')</option>
                    <option value="{{old('gender','female')}}">@lang('lang.female')</option>
                </select>
            </div>
          
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="status">@lang('lang.status')</label>
                <select name="status" class="form-select" id="status">
                    <option value="{{old('status','1')}}">@lang('lang.active')</option>
                    <option value="{{old('status','0')}}">@lang('lang.deactive')</option>
                </select>
            </div>
          
        </div>

        
        <div class="col-md-4">
            <div class="form-group">
                <label for="job_id">@lang('lang.job')</label>
                <select name="job_id" class="form-select" id="job_id">
                    @foreach ($jobs as $job )
                        <option value="{{old('job_id',$job->id)}}">{{$job->name}}</option>
                    @endforeach
                </select>
            </div>
          
        </div>

        
        <div class="col-md-6">
            <div class="form-group">
                <label for="salary_from">@lang('lang.date')</label>
                <input type="date" name="age" class="form-control" id="age">
            </div>
        </div>


        
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="salary_from">@lang('lang.salary_from')</label>
                        <input type="number" name="salary_from" class="form-control" id="salary_from">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="salary_from">@lang('lang.salary_to')</label>
                        <input type="number" name="salary_to" class="form-control" id="salary_to">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="d-flex">
                <div class="form-group ">
                    <button class="btn btn-primary" onclick="handleFilter()">@lang('lang.search') <i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="form-group ml-2">
                    <button class="btn " onclick="handleClear()">@lang('lang.clear')</button>
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
            <h4 class="card-title">Show Employees</h4>
          </div>
          @if (auth()->user()->hasPermission('add_employees'))
          <div class="col-md-6">
            <a href="{{route('dashboard.employees.create')}}" class="btn btn-success">@lang('lang.create') @lang('lang.employees') <i class="fa fa-plus" style="font-size: 15px;"></i></a>
          </div>
          @endif
        
        </div>

        
        <div class="table-responsive">
            <table class="table table-striped" id="employee-table">
                <thead>
                  <tr>
                    <th> @lang('lang.image') </th>
                    <th> @lang('lang.link') </th>
                    <th> @lang('lang.name') </th>
                    <th> @lang('lang.email') </th>
                    <th> @lang('lang.phone') </th>
                    <th> @lang('lang.date_of_birth') </th>
                    <th> @lang('lang.gender') </th>
                    <th> @lang('lang.national_id') </th>
                    <th> @lang('lang.job') </th>
                    <th> @lang('lang.salary') </th>
                    <th> @lang('lang.status') </th>
                    <th> @lang('lang.created_by') </th>
                    <th> @lang('lang.actions') </th>
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
{{-- <script src="{{asset('datatables/user.js')}}"></script> --}}

<script >

let EmployeeTable = null

function setEmployeeDatatable() {
    var url = "{{ route('dashboard.employees.data') }}";
    
    EmployeeTable = $("#employee-table").DataTable({
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
        // buttons: [
        //    {
        //                 extend: 'copy',
        //                 className: 'btn btn-light'
        //             },
        //             {
        //                 extend: 'print',
        //                 className: 'btn btn-light'
        //             },
        //             {
        //                 extend: 'pdf',
        //                 className: 'btn btn-light'
        //             },
        //             {
        //                 extend: 'csv',
        //                 className: 'btn btn-light'
        //             },
        // ],
        
        columns: [
            {
                data:'images'
            },
            {
                data:'image_link'
            },
            {
                data:'name'
            },
            {
                data:'email'
            },
            {
                data:'phone'
            },
            {
                data:'age'
            },
            {
                data:'gender'
            },
            {
                data:'national_id'
            },
            {
                data:'job_id'
            },
            {
                data:'salary'
            },
            {
                data:'status'
            },
            {
                data:'created_by'
            },
            {
                data:'actions'
            }
        ],
       
  
    });
}

setEmployeeDatatable();


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
                    url: "{{url('dashboard/employees/delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if(results.status == true)
                        {
                            swal("Done!", results.message, "success");
                            EmployeeTable.ajax.reload()
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


    
    function handleFilter() {
            gender = $('#gender').val() || '';
            age = $('#age').val() || '';
            job = $('#job_id').val() || '';
            status = $('#status').val() || '';
            salary_from = $('#salary_from').val() || '';
            salary_to = $('#salary_to').val() || '';
       
            if (EmployeeTable) {
                var url = "{{ route('dashboard.employees.data') }}" + `?gender=${gender}&age=${age}&status=${status}&job_id=${job}&salary_from=${salary_from}&salary_to=${salary_to}`;
                console.log(url);
                EmployeeTable.ajax.url(url).load()
            }
        }

        function handleClear() {
            $('#gender').val('') ;
            $('#age').val('') ;
            $('#job_id').val('') ;
            $('#status').val('') ;
            $('#salary_from').val('') ;
            $('#salary_to').val('') ;
     
            if (EmployeeTable) {
                var url = "{{ route('dashboard.employees.data') }}";
                EmployeeTable.ajax.url(url).load()
            }
        }

</script>


@endsection