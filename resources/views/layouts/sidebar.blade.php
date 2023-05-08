<ul class="nav" style="position: fixed">
    <li class="nav-item nav-category"></li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard')}}">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title">@lang('lang.dashboard')</span>
      </a>
    </li>
    @if (auth()->user()->hasPermission('show_user'))
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="fa fa-user"></i></span>
        <span class="menu-title">@lang('lang.users')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          @if (auth()->user()->hasPermission('show_user'))
            <li class="nav-item"> <a class="nav-link" href="{{route('dashboard.users.index')}}">@lang('lang.show') @lang('lang.users')</a></li>
          @endif
          @if (auth()->user()->hasPermission('show_role'))
            <li class="nav-item"> <a class="nav-link" href="{{route('dashboard.roles.index')}}">@lang('lang.show') @lang('lang.role')</a></li>          
          @endif
        </ul>
      </div>
    </li>  
    @endif
    

    @if (auth()->user()->hasPermission('show_jobs'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.jobs.index')}}">
          <span class="icon-bg"><i class="fa-solid fa-briefcase"></i></span>
          <span class="menu-title">@lang('lang.job')</span>
        </a>
      </li>   
    @endif
   

    @if (auth()->user()->hasPermission('show_employees'))
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard.employees.index')}}?employee">
        <span class="icon-bg"><i class="fa-solid fa-users"></i></span>
        <span class="menu-title">@lang('lang.employees')</span>
      </a>
    </li>
    @endif
  

    @if (auth()->user()->hasPermission('show_requests'))
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard.requests.index')}}">
        <span class="icon-bg"><i class="fa-solid fa-code-pull-request"></i></span>
        <span class="menu-title">@lang('lang.requests')</span>
      </a>
    </li>
    @endif


    
    @if (auth()->user()->hasPermission('show_login_history'))
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard.login_history.index')}}">
        <span class="icon-bg"><i class="fa-solid fa-server"></i></span>
        <span class="menu-title">@lang('lang.login_history')</span>
      </a>
    </li>
    @endif
  
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button  class="nav-link border-0"><i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title text-danger">@lang('lang.logout')</span></button>
        </form>
        </div>
    </li>
  </ul> 