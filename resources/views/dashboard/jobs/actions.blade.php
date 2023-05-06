@switch($type)
    @case('actions')
            @if (auth()->user()->hasPermission('edit_jobs'))
                <a class="btn btn-sm btn-primary" href="{{route('dashboard.jobs.edit',$data->id)}}"><i class="fa fa-pen"></i></a>            
            @endif

            @if (auth()->user()->hasPermission('delete_jobs'))
              <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}" data-action="{{ route('dashboard.users.delete',$data->id) }}" onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button>
            @endif
       
            @break

    @default
        
@endswitch