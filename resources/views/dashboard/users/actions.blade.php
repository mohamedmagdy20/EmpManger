@switch($type)
    @case('image')
    <div class="py-1">
        <img src="{{$data->image ? asset('uploads/users/'.$data->image) : asset('assets/images/faces-clipart/pic-1.png')}}" class="image-viewer" alt="image" />
    </div>
        @break
    @case('actions')
    @if (auth()->user()->hasPermission('edit_user'))
        <a class="btn btn-sm btn-primary" href="{{route('dashboard.users.edit',$data->id)}}"><i class="fa fa-pen"></i></a>
    @endif

    @if (auth()->user()->hasPermission('delete_user'))
        <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}" data-action="{{ route('dashboard.users.delete',$data->id) }}" onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button>    
    @endif
      


        @break
    @case('status')
        @if ($data->status == false)
            <span class="btn btn-sm btn-warning">@lang('lang.deactive')</span>
        @else
            <span class="btn btn-sm btn-success">@lang('lang.active')</span>
        @endif
    @break

    @case('roles')
        @foreach ($data->roles as $role )
            <p>{{$role->display_name}}</p> 
         @endforeach
   
    @break
    @default
        
@endswitch