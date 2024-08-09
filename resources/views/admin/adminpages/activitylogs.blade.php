<!DOCTYPE html>
<html>
<head>
    <title>Weather</title>
    @Vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="{{ asset('/images/solace.svg') }}" type="image/svg">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

</head>
<body class="bg-bgblue flex font-poppins">
    <!-- Fixed Navbar -->
    @include('admin.adminmodal.leftnavigation')

    <!-- Main Content -->
    <main id="main-content" class="flex-grow p-4 main-expanded">
    <div class="header d-flex align-items-center mb-4">
      <!-- Left section with MDRRMO logo, text, App logo, and app name text -->
      <div class="flex align-items-center ">
        <img src="{{ asset('images/mdrrmo.svg') }}" alt="MDRRMO Logo" class="mr-2">
        <span class="flex items-center mr-5 text-white">MDRRMO Sta. Barbara</span>
        <img src="{{ asset('images/solace.svg') }}" alt="App Logo" class="mr-2">
        <span class="flex items-center text-white" >SolAce Flood Monitoring</span>
      </div>
    </div>
    <div class="text-3xl mt-10 ml-10">
        <h1 class="text-white">Activty Logs</h1>
       
    </div>
    <div class="bg-white shadow-md rounded my-6 overflow-auto">
        <div class="flex justify-between items-center p-4">
            <div>
                <input type="checkbox" id="toggleAll" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="toggleAll" class="ml-2">Toggle All</label>
            </div>
            <div>
                <input type="text" id="search" placeholder="Search..." class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                    <th class="w-2/12 px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="w-3/12 px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="w-2/12 px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="w-1/12 px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="w-3/12 px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody" class="bg-white">
                <!-- Table rows go here -->
                <tr>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                    </td>
                    <td class="px-6 py-4 border-b border-gray-200">Kenneth C.</td>
                    <td class="px-6 py-4 border-b border-gray-200">kenneth_love_69@gmail.com</td>
                    <td class="px-6 py-4 border-b border-gray-200">Admin</td>
                    <td class="px-6 py-4 border-b border-gray-200">Active</td>
                    <td class="px-6 py-4 border-b border-gray-200">                     
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                    </td>
                </tr>
                <!-- Repeat rows as needed -->
            </tbody>
        </table>
        <div class="p-4 bg-white">
            <nav class="flex justify-between items-center">
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Previous</button>
                <div class="text-gray-700">
                    Page <span id="currentPage">1</span> of <span id="totalPages">10</span>
                </div>
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Next</button>
            </nav>
        </div>
    </div>
   
    </main>

    <script>
           const toggleButton = document.getElementById('toggle-nav');
        const navBar = document.getElementById('nav-bar');
        const mainContent = document.getElementById('main-content');

        toggleButton.addEventListener('click', () => {
            navBar.classList.toggle('nav-collapsed');
            navBar.classList.toggle('nav-expanded');
            mainContent.classList.toggle('main-collapsed');
            mainContent.classList.toggle('main-expanded');
            const textLabels = document.querySelectorAll('#nav-bar .ml-2');
            textLabels.forEach(label => label.classList.toggle('text-hidden'));
            textLabels.forEach(label => label.classList.toggle('text-visible'));
            const profileInfo = document.querySelector('.profile-info');
            const profilepic = document.querySelector('.profile-picture');
            profileInfo.classList.toggle('text-hidden');
            profileInfo.classList.toggle('text-visible');
            profilepic.classList.toggle('hidden');
            profilepic.classList.toggle('vissible');
        });
        document.getElementById('reports-button').addEventListener('click', () => {
        const submenu = document.getElementById('reports-submenu');
        if (submenu.classList.contains('hidden')) {
            submenu.classList.remove('hidden');
            submenu.style.maxHeight = submenu.scrollHeight + 'px';
        } else {
            submenu.style.maxHeight = '0';
            submenu.addEventListener('transitionend', () => {
                if (submenu.style.maxHeight === '0px') {
                    submenu.classList.add('hidden');
                }
            }, { once: true });
        }
    });
    </script>
</body>
</html>
