@extends('dashboard')

@section('content')

<div class="page-header">
  <h3 class="page-title"> @lang('lang.users')</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('lang.dashboard')</a></li>
      <li class="breadcrumb-item active"><a href="{{route('dashboard.users.index')}}">@lang('lang.users')</a></li>
   
    </ol>
  </nav>
  
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-6">
            <h4 class="card-title">@lang('lang.show') @lang('lang.users')</h4>
          </div>
    @if (auth()->user()->hasPermission('add_user'))
      <div class="col-md-6">
        <a href="{{route('dashboard.users.create')}}" class="btn btn-success">@lang('lang.create') @lang('lang.users') <i class="fa fa-plus" style="font-size: 15px;"></i></a>
      </div>
    @endif
           </div>

        
        <div class="table-responsive">
            <table class="table table-striped" id="user-table">
                <thead>
                  <tr>
                    <th> @lang('lang.image') </th>
                    <th> @lang('lang.name') </th>
                    <th> @lang('lang.email') </th>
                    <th>@lang('lang.role')</th>
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

let UsersTable = null

function setUserDatatable() {
    var url = "{{ route('dashboard.users.data') }}";
    
    UsersTable = $("#user-table").DataTable({
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
                data: 'image'
            },
            {
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'roles'
            },
            
            {
                data: 'status'
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
                    url: "{{url('dashboard/users/delete')}}/" + id,
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


</script>


@endsection