@switch($type)
    @case('actions')
            <a class="btn btn-sm btn-primary" href="{{route('dashboard.roles.edit',$data->id)}}"><i class="fa fa-pen"></i></a>
            <a class="btn btn-sm btn-warning" href="{{route('dashboard.permissions.edit',$data->id)}}"><i class="fa fa-eye"></i></a>
        @break

    @default
        
@endswitch