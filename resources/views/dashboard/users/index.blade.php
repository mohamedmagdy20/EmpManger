@extends('dashboard')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Users</h4>
        <div class="table-responsive">
            <table class="table table-striped" id="user-table">
                <thead>
                  <tr>
                    <th> Image </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Status </th>
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
                data: 'status'
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
                    url: "{{url('users/delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                            swal("Done!", results.message, "success");
                            UsersTable.ajax.reload()
                
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