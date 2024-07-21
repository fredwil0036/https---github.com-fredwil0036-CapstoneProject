<nav id="nav-bar" class="fixed top-0 left-0 h-screen bg-gray-800 text-white flex flex-col nav-collapsed">
        <div class="p-4 flex items-center justify-between">
            <!-- Toggle Button Inside Nav -->
            <button id="toggle-nav" class="text-white flex items-center justify-center">
                <span class="material-icons">menu</span>
            </button>
        </div>
        <ul class="flex flex-col flex-grow">
            <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-red-400' : '' }}">
                <a href="{{route('admin.dashboard')}}" class="flex items-center">
                    <span class="material-icons">dashboard</span>
                    <span class="ml-2 text-hidden">Dashboard</span>
                </a>
            </li>
           
            <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('admin.staffmanagement') ? 'bg-red-400' : '' }}">
                <a href="{{route('admin.staffmanagement')}}" class="flex items-center">
                    <span class="material-icons">manage_accounts</span>
                    <span class="ml-2 text-hidden">Staff Management</span>
                </a>
            </li>
            <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('admin.act') ? 'bg-red-400' : '' }}">
                <a href="{{route('admin.act')}}" class="flex items-center">
                    <span class="material-icons">groups</span>
                    <span class="ml-2 text-hidden">Resident Management</span>
                </a>
            </li>

            <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('admin.weatherforecast') ? 'bg-red-400' : '' }}">
                <a href="{{route('admin.weatherforecast')}}" class="flex items-center">
                    <span class="material-icons">cloud</span>
                    <span class="ml-2 text-hidden">Weather Forecast</span>
                </a>
            </li>
            <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('admin.act') ? 'bg-red-400' : '' }}">
                <a href="{{route('admin.act')}}" class="flex items-center">
                    <span class="material-icons">event_notes</span>
                    <span class="ml-2 text-hidden">Activity Logs</span>
                </a>
            </li>

            <li class="p-4 hover:bg-gray-700">
                <a href="#" class="flex items-center">
                    <span class="material-icons">report</span>
                    <span class="ml-2 text-hidden">Report</span>
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