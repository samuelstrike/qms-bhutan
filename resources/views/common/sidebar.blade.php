<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('logo/rgob-logo.png')}}" alt="" srcset="" height="50px">
        </div>
        <div class="sidebar-brand-text mx-3">QMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->route()->named('dashboard')) ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->route()->named('register-user.index')) ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog "></i>
            <span>User Management</span>
        </a>
        <div id="collapseTwo" class="collapse {{ (request()->route()->named('register-user.index')) ? 'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Setting:</h6>
                <a class="collapse-item {{ (request()->route()->named('register-user.index')) ? 'active' : ''}}" href="{{route('register-user.index')}}"> Users</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ (request()->route()->named('roles.index') || request()->route()->named('permissions.index')) ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Roles Management</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ (request()->route()->named('roles.index') || request()->route()->named('permissions.index')) ? 'show' : ''}}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Roles:</h6>
                <a class="collapse-item {{ (request()->route()->named('roles.index')) ? 'active' : ''}}" href="{{route('roles.index')}}">Manage Roles</a>
                <a class="collapse-item {{ (request()->route()->named('permissions.index')) ? 'active' : ''}}" href="{{ route('permissions.index')}}">Manage Permission</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quarantine
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->route()->named('checkin') || request()->route()->named('transferlist') || request()->route()->named('checkoutlist')) ? 'active' : ''}} ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Manage Quarantine</span>
        </a>
        <div id="collapsePages" class="collapse {{ (request()->route()->named('checkin') || request()->route()->named('transferlist') || request()->route()->named('checkoutlist') ) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quarantine:</h6>
                <a class="collapse-item {{ (request()->route()->named('checkin')) ? 'active' : ''}}" href="{{ route('checkin') }}">Registered List</a>
                <a class="collapse-item {{ (request()->route()->named('transferlist')) ? 'active' : ''}}" href="{{ route('transferlist') }}">Transferred List</a>
                <a class="collapse-item {{ (request()->route()->named('checkoutlist')) ? 'active' : ''}}" href="{{ route('checkoutlist') }}">Check out</a>
                
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->route()->named('facility')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('facility') }}">
        <i class="fas fa-fw fa-folder"></i>
            <span>Add Quarantine Facility</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->route()->named('reports*')) ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
            aria-expanded="true" aria-controls="collapsePages1">
            
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Report</span>
        </a>
        <div id="collapsePages1" class="collapse {{ (request()->route()->named('reports*')) ? 'show' : ''}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Reports</h6>
                <a class="collapse-item {{ (request()->route()->named('reports')) ? 'active' : ''}}" href="{{ route('reports') }}">Quaraintine</a>
                <a class="collapse-item {{ (request()->route()->named('reports.qfgenerate')) ? 'active' : ''}}" href="{{ route('reports.qfgenerate') }}">Quaraintine Facility</a>
            </div>
        </div>
    </li>

    {{-- <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('reports') }}">
        <i class="fas fa-fw fa-chart-area"></i>
            <span>Reports</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>