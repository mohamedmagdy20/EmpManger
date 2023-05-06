@switch($type)
    @case('actions')
        @if (auth()->user()->hasPermission('edit_role'))
            <a class="btn btn-sm btn-primary" href="{{route('dashboard.roles.edit',$data->id)}}"><i class="fa fa-pen"></i></a>
        @endif

        @if (auth()->user()->hasPermission('show_permissions'))
            <a class="btn btn-sm btn-warning" href="{{route('dashboard.permissions.edit',$data->id)}}"><i class="fa fa-eye"></i></a>        
        @endif
        @break

    @default
        
@endswitch