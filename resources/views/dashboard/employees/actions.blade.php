@switch($type)
    @case('images')
    <div class="py-1">
        <img src="{{$data->image ? asset('uploads/employees/'.$data->image) : asset('assets/images/faces-clipart/pic-1.png')}}" class="image-viewer" alt="image" />
    </div>
        @break
    @case('actions')
        <a class="btn btn-sm btn-primary" href="{{route('dashboard.employees.edit',$data->id)}}"><i class="fa fa-pen"></i></a>
        <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}" data-action="{{ route('dashboard.users.delete',$data->id) }}" onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button>
      


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