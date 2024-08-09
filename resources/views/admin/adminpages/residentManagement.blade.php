<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" href="{{ asset('/images/solace.svg') }}" type="image/svg">

    @Vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body class="flex font-poppins bg-bgblue ">
    @include('admin.adminmodal.leftnavigation')
    

    <div id="main-content" class="flex-1 p-4  main-expanded">
    <div class=" mt-5">

    <div class="header d-flex align-items-center mb-4">
      <!-- Left section with MDRRMO logo, text, App logo, and app name text -->
      <div class="flex align-items-center">
        <img src="{{ asset('images/mdrrmo.svg') }}" alt="MDRRMO Logo" class="mr-2">
        <span class="flex items-center mr-5 text-white">MDRRMO Sta. Barbara</span>
        <img src="{{ asset('images/solace.svg') }}" alt="App Logo" class="mr-2">
        <span class="flex items-center text-white">SolAce Flood Monitoring</span>
      </div>
    </div>

    


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        
    <div class="flex justify-center items-center bg-gray-100 w-full ">
    <div class="w-full p-8 bg-white rounded-lg shadow-lg">
        <div class="text-black text-lg font-bold">
        <h1>Add Contacts</h1>
        </div>
        <form action="{{ route('contacts.store') }}" method="POST" class="flex flex-wrap justify-between space-y-4 md:space-y-0 md:space-x-4">
            @csrf
           
            <div class="w-full md:flex-1 min-w-[250px] mb-3">
                <label for="name" class="form-label text-gray-700">Name</label>
                <input type="text" class="form-control w-full p-2 mt-1 border rounded" id="name" name="name" required>
            </div>
            <div class="w-full md:flex-1 min-w-[250px] mb-3">
                <label for="barangay" class="form-label text-gray-700">Barangay</label>
                <input type="text" class="form-control w-full p-2 mt-1 border rounded" id="barangay" name="barangay" required>
            </div>
            <div class="w-full md:flex-1 min-w-[250px] mb-3 flex items-end">
                <div class="w-full">
                    <label for="phone_number" class="form-label text-gray-700">Phone Number</label>
                    <input type="text" class="form-control w-full p-2 mt-1 border rounded" id="phone_number" name="phone_number" required>
                </div>
                <button type="submit" class="ml-4 mb-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Contact</button>
            </div>
        </form>
    </div>
  </div>
    


<div class="overflow-x-auto bg-gray-400 mt-10 rounded-2xl drop-shadow-md">  
  <div class="mb-4 mt-3">
    <!-- Dropdown for Barangay Selection -->
    <select id="barangay-filter" class="form-select bg-white border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-52 sm:text-sm ml-10">
        <option value="">Select Barangay</option>
        <option value="">All</option> 
        @foreach ($barangays as $barangay)
            <option value="{{ $barangay }}">{{ $barangay }}</option>
        @endforeach
    </select>
    </div>
        <div class="flex justify-center">
        <table class="w-98 bg-white m-3 justify-center rounded-2xl">
        <thead class="bg-blue-500 text-white font-bold">
            <tr>
                <th class="w-1/12 px-4 py-2">ID</th>
                <th class="w-1/4 px-4 py-2">Name</th>
                <th class="w-1/4 px-4 py-2">Address</th>
                <th class="w-1/4 px-4 py-2">Phone Number</th>
                <th class="w-1/12 px-4 py-2">Delete</th>
            </tr>
        </thead>
        <tbody id="contacts-table" class="text-gray-700">
            @foreach ($contacts as $contact)
                <tr>
                    <td class=" px-4 py-2 text-center">{{ $contact->id }}</td>
                    <td class=" px-4 py-2 text-center">{{ $contact->name }}</td>
                    <td class=" px-4 py-2 text-center">{{ $contact->barangay }}</td>
                    <td class=" px-4 py-2 text-center">{{ $contact->phone_number }}</td>
                    <td class=" px-4 py-2 text-center">    <button type="submit" class="ml-4 mb-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Delete</button>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        <div class="mt-4">
    {{ $contacts->links() }}
</div>
  
</div>

    
    </div>

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

        document.getElementById('barangay-filter').addEventListener('change', function() {
        let selectedBarangay = this.value;
        let url = new URL(window.location.href);

        if (selectedBarangay) {
            // If a specific barangay is selected, update the URL with the selected barangay
            url.searchParams.set('barangay', selectedBarangay);
        } else {
            // If "All" is selected (or the dropdown value is empty), remove the barangay parameter
            url.searchParams.delete('barangay');
        }

        // Redirect to the updated URL
        window.location.href = url.toString();
    });
    </script>
</body>
</html>
