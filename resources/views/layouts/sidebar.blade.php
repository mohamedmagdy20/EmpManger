<ul class="nav" style="position: fixed">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard')}}">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @if (auth()->user()->hasPermission('show_user'))
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="fa fa-user"></i></span>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          @if (auth()->user()->hasPermission('show_user'))
            <li class="nav-item"> <a class="nav-link" href="{{route('dashboard.users.index')}}">Show Users</a></li>
          @endif
          @if (auth()->user()->hasPermission('show_role'))
            <li class="nav-item"> <a class="nav-link" href="{{route('dashboard.roles.index')}}">Roles</a></li>          
          @endif
        </ul>
      </div>
    </li>  
    @endif
    

    @if (auth()->user()->hasPermission('show_jobs'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.jobs.index')}}">
          <span class="icon-bg"><i class="fa-solid fa-briefcase"></i></span>
          <span class="menu-title">Jobs</span>
        </a>
      </li>   
    @endif
   

    @if (auth()->user()->hasPermission('show_employees'))
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard.employees.index')}}?employee">
        <span class="icon-bg"><i class="fa-solid fa-users"></i></span>
        <span class="menu-title">Employees</span>
      </a>
    </li>
    @endif
  

    @if (auth()->user()->hasPermission('show_requests'))
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard.requests.index')}}">
        <span class="icon-bg"><i class="fa-solid fa-code-pull-request"></i></span>
        <span class="menu-title">Requests</span>
      </a>
    </li>
    @endif


    
    @if (auth()->user()->hasPermission('show_login_history'))
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard.login_history.index')}}">
        <span class="icon-bg"><i class="fa-solid fa-server"></i></span>
        <span class="menu-title">Login History</span>
      </a>
    </li>
    @endif
  
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button  class="nav-link border-0"><i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title text-danger">Log Out</span></button>
        
        </form>
        </div>
    </li>
  </ul> 