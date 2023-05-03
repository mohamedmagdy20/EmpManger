@switch($type)
    @case('image')
    <div class="py-1">
        <img src="{{$data->image ? asset($data->image) : asset('assets/images/faces-clipart/pic-1.png')}}" alt="image" />
    </div>
        @break
    @case('actions')
        <a class="btn btn-sm btn-primary" href="{{route('dashboard.users.edit',$data->id)}}"><i class="fa fa-pen"></i></a>
        <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}" data-action="{{ route('dashboard.users.delete',$data->id) }}" onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button>
        {{-- <form method="POST" action="{{ route('dashboard.users.delete', $data->id) }}" id="confirm-delete" class="d-inline">

            @csrf


            <button type="submit" class="btn btn-sm btn-danger btn-flat" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>

        </form> --}}


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