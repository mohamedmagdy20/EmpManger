@switch($type)
    @case('actions')
            @if (auth()->user()->hasPermission('edit_requests'))
                <a class="btn btn-sm btn-primary" href="{{route('dashboard.requests.edit',$data->id)}}"><i class="fa fa-pen"></i></a>            
            @endif

            @if (auth()->user()->hasPermission('delete_requests'))
              <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}" data-action="{{ route('dashboard.requests.delete',$data->id) }}" onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button>
            @endif
            <a class="btn btn-sm btn-warning" href="{{route('dashboard.requests.show',$data->id)}}"><i class="fa fa-eye"></i></a>
       
    @break
    @case('change-status')
        @if ($data->request_status == 'new')
           <a class="btn btn-primary" onclick="changeStatus({{$data->id}},'on_process')">Make On Process</a>
        @elseif ($data->request_status == 'on_process')
            <a class="btn btn-light" onclick="changeStatus({{$data->id}},'finished')">Finish Request</a>
        @else
            <span class="btn btn-dark">Finished</span>
        @endif
    @break

    @case('status')
    @if ($data->status == false)
        <span class="btn btn-sm btn-warning">Deactive</span>
    @else
        <span class="btn btn-sm btn-success">Active</span>
    @endif
@break

    @default     
@endswitch