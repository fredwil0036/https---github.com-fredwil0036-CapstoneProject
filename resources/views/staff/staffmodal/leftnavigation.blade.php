<nav id="nav-bar" class="fixed top-0 left-0 visible-nav h-screen bg-gray-800 text-white flex flex-col">
    <div class="p-4 flex items-center justify-between">
        <!-- Toggle Button Inside Nav -->
        <button id="toggle-nav" class="text-white flex items-center justify-center">
            <span class="material-icons">menu</span>
        </button>
    </div>
    <div class="p-4 flex flex-col items-center">
        <img src="{{ asset('profilepic/prof2.jpg') }}" id="profileImage" alt="Profile Image" class="w-16 h-16 rounded-full mb-2">
        <span>Pasing</span>
        <span class="text-gray-400 text-sm">Staff</span>
    </div>
    <ul class="flex flex-col flex-grow">
        <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('WLa') ? 'bg-red-400' : '' }}">
            <a href="{{route('WLa')}}" class="flex items-center">
                <span class="material-icons">dashboard</span>
                <span class="ml-2 hidden lg:block">Dashboard</span>
            </a>
        </li>
       
        <li class="p-4 hover:bg-gray-700 relative">
            <a href="#" class="flex items-center" id="report-dropdown">
                <span class="material-icons">report</span>
                <span class="ml-2 hidden lg:block">Report</span>
                <span class="material-icons ml-auto">expand_more</span>
            </a>
            <ul class="bg-gray-700 absolute left-0 top-full hidden flex-col w-full" id="report-options">
                <li class="p-4 hover:bg-gray-600">
                    <a href="#" class="flex items-center">
                        <span class="ml-2 hidden lg:block">Casualties</span>
                    </a>
                </li>
                <li class="p-4 hover:bg-gray-600">
                    <a href="#" class="flex items-center">
                        <span class="ml-2 hidden lg:block">Damages</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="p-4 hover:bg-gray-700 {{ request()->routeIs('staff.weatherforecast') ? 'bg-red-400' : '' }}">
            <a href="{{route('staff.weatherforecast')}}" class="flex items-center">
                <span class="material-icons">cloud</span>
                <span class="ml-2 hidden lg:block">Weather Forecast</span>
            </a>
        </li>
        
        <div class="p-4 bg-red-900 hover:bg-red-400">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center">
                <span class="material-icons">exit_to_app</span>
                <span class="ml-2 hidden lg:block">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </ul>
</nav>

<script>
    document.getElementById('report-dropdown').addEventListener('click', function() {
        document.getElementById('report-options').classList.toggle('hidden');
    });
</script>
