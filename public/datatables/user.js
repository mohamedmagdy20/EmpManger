  $(document).ready(function() {
    $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('dashboard.users.data') }}",
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
        ]
    });
});