<nav id="nav-bar" class="fixed top-0 left-0 h-screen bg-gray-800 text-white flex flex-col nav-collapsed">
    <div class="p-4 flex items-center justify-between">
        <!-- Toggle Button Inside Nav -->
        <button id="toggle-nav" class="text-white flex items-center justify-center">
            <span class="material-icons">menu</span>
        </button>
    </div>
    <div class="profile-section p-4">
        <img src="https://randomuser.me/api/portraits/men/91.jpg" alt="Profile Picture" class="profile-picture hidden">
        <div class="profile-info text-hidden">
            <p>{{Auth::user()->email;}}</p>
            <p>Role</p>
        </div>
    </div>
    <ul class="flex flex-col flex-grow">
        <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('WLa') ? 'bg-red-400' : '' }}">
            <a href="{{route('WLa')}}" class="flex items-center">
                <span class="material-icons">dashboard</span>
                <span class="ml-2 text-hidden">Dashboard</span>
            </a>
        </li>
        <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('staff.weatherforecast') ? 'bg-red-400' : '' }}">
            <a href="{{route('staff.weatherforecast')}}" class="flex items-center">
                <span class="material-icons">report</span>
                <span class="ml-2 text-hidden">View all Reports</span>
            </a>
        </li>
        <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('staff.addCasualties') ? 'bg-red-400' : '' }}">
            <a href="{{route('staff.addCasualties')}}" class="flex items-center">
                <span class="material-icons">report_problem</span>
                <span class="ml-2 text-hidden">Add Casulties Report</span>
            </a>
        </li>
        <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('staff.weatherforecast') ? 'bg-red-400' : '' }}">
            <a href="{{route('staff.weatherforecast')}}" class="flex items-center">
                <span class="material-icons">gavel</span>
                <span class="ml-2 text-hidden">Add Damages Report</span>
            </a>
        </li>
        <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('staff.weatherforecast') ? 'bg-red-400' : '' }}">
            <a href="{{route('staff.weatherforecast')}}" class="flex items-center">
                <span class="material-icons">cloud</span>
                <span class="ml-2 text-hidden">Weather Forecast</span>
            </a>
        </li>
    
    </ul>
    <div class="p-4 bg-red-900 hover:bg-red-400">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center">
            <span class="material-icons">exit_to_app</span>
            <span class="ml-2 text-hidden">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</nav>