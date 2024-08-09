<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Management</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  @Vite('resources/css/app.css')
  <link rel="stylesheet" href="{{ asset('css/staffsidenav.css') }}">
</head>

<body class="flex font-poppins bg-gray-500 ">

@include('staff.staffmodal.leftnavigation')


<main id="main-content" class="flex-grow p-4 main-expanded">
  <div class="content">
    <div class="header d-flex align-items-center mb-4">
      <!-- Left section with MDRRMO logo, text, App logo, and app name text -->
      <div class="flex align-items-center">
        <img src="{{ asset('images/mdrrmo.svg') }}" alt="MDRRMO Logo" class="mr-2">
        <span class="flex items-center mr-5 text-white">MDRRMO Sta. Barbara</span>
        <img src="{{ asset('images/solace.svg') }}" alt="App Logo" class="mr-2">
        <span class="flex items-center text-white">SolAce Flood Monitoring</span>
      </div>
    </div>

    <div class="flex justify-center items-center  w-full ">
    <div class=" max-w-full mx-auto bg-white p-8 rounded-lg shadow-lg">
    @if (session('success'))
    <div class="bg-green-200 border-green-500 border-l-4 p-4 mb-4">
        <p class="text-green-700">{{ session('success') }}</p>
    </div>
        @endif
        @if (session('successdelete'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
        @endif
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h1 class="text-2xl font-bold mb-6">Disaster Report Form</h1>
        <form action="{{route('report.store')}}" method="post">
            @csrf
            <input type="text" id="fname" name="staff_email" value="{{Auth::user()->email}}" hidden>
            <div class="flex j items-center w-full">
                
            <div class="mb-4 mr-10 ">
                <label for="disaster-name" class="block text-gray-700 font-bold mb-2">Typhoon Name:</label>
                <input type="text" id="disaster-name" name="disaster_name" class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <!-- Affected Barangay -->
            <div class="mb-4 mr-10">
                <label for="affected-barangay" class="block text-gray-700 font-bold mb-2">Affected Barangay:</label>
                <input type="Text" id="affected-barangay" name="affected_barangay" class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4 mr-10">
                <label for="disaster-date" class="block text-gray-700 font-bold mb-2">Date:</label>
                <input type="Date" id="disaster-date" name="disaster_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4 mr-10">
                <label for="disaster-enddate" class="block text-gray-700 font-bold mb-2">End of distater:</label>
                <input type="Date" id="disastere-enddate" name="disaster_enddate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <!-- water level -->
            <div class="mb-4 mr-10">
                <label for="lowest_water_level" class="block text-gray-700 font-bold mb-2">Lowest Water level:</label>
                <input type="number" id="lowest_water_level" name="lowest_water_level" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="highest_water_level" class="block text-gray-700 font-bold mb-2">Higest Water level:</label>
                <input type="number" id="highest_water_level" name="highest_water_level" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            </div>

            <div class="flex mt-10">
                <!-- Casualties -->
            <div class="mb-4 mr-28">
                <label class="block text-gray-700 font-bold mb-2">CASUALTIES:</label>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-1/3 px-3 mb-4 md:mb-0">
                        <label for="dead" class="block text-gray-700 font-bold mb-2">Dead:</label>
                        <input type="number" id="dead" name="dead" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="w-1/3 px-3 mb-4 md:mb-0">
                        <label for="injured" class="block text-gray-700 font-bold mb-2">Injured:</label>
                        <input type="number" id="injured" name="injured" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="w-1/3 px-3 mb-4 md:mb-0">
                        <label for="missing" class="block text-gray-700 font-bold mb-2">Missing:</label>
                        <input type="number" id="missing" name="missing" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>
            </div>
                 <!-- Number of Displaced Population -->
              <div class="mb-4 mr-28">
                <label class="block text-gray-700 font-bold mb-2">NUMBER OF AFFECTED POPULATION:</label>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-1/2 px-3 mb-4 md:mb-0">
                        <label for="displaced-persons" class="block text-gray-700 font-bold mb-2">Persons:</label>
                        <input type="number" id="displaced-persons" name="displaced_persons" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="w-1/2 px-3 mb-4 md:mb-0">
                        <label for="displaced-families" class="block text-gray-700 font-bold mb-2">Families:</label>
                        <input type="number" id="displaced-families" name="displaced_families" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>
            </div>
              <!-- number of damaged houses -->
                  <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">NUMBER OF DAMAGED HOUSES:</label>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-1/2 px-3 mb-4 md:mb-0">
                        <label for="total-damaged" class="block text-gray-700 font-bold mb-2">Totally:</label>
                        <input type="number" id="total-damaged" name="totally_damaged" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="w-1/2 px-3 mb-4 md:mb-0">
                        <label for="partially-damageds" class="block text-gray-700 font-bold mb-2">Partially:</label>
                        <input type="number" id="partially-damageds" name="damages_house_partially" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>
            </div>
            </div>
      
            <!-- Damage to properties -->
            <div class="mb-4 mt-10">
                <label class="block text-gray-700 font-bold mb-2">DAMAGE TO PROPERTIES (PESOS)</label>
                <div class="flex -mx-3 mb-2">
                    <div class="w-1/2 px-3 mb-4 md:mb-0">
                        <label for="infrasture-damaged" class="block text-gray-700 font-bold mb-2">Infrastracture:</label>
                        <input type="number" id="infrasture-damaged" name="infrasture_damaged" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="w-1/2 px-3 mb-4 md:mb-0">
                        <label for="ariculture-damageds" class="block text-gray-700 font-bold mb-2">Agriculture:</label>
                        <input type="number" id="ariculture-damageds" name="ariculture_damage" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="w-1/2 px-3 mb-4 md:mb-0">
                        <label for="industrial-damageds" class="block text-gray-700 font-bold mb-2">Industrial:</label>
                        <input type="number" id="industrial-damageds" name="industrial_damage" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="w-1/2 px-3 mb-4 md:mb-0">
                        <label for="privatecomercial-damageds" class="block text-gray-700 font-bold mb-2">Private Comercial:</label>
                        <input type="number" id="privatecomercial-damageds" name="privatecomercial_damage" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>
            </div>
            
            
            <!-- Submit Button -->
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </div>
        </form>
    </div>
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
        const profilepic=document.querySelector('.profile-picture')
        profileInfo.classList.toggle('text-hidden');
        profileInfo.classList.toggle('text-visible');
        profilepic.classList.toggle('hidden');
        profilepic.classList.toggle('vissible');

    });

 

  function showContent(buttonId) {
      const contentSections = document.querySelectorAll('.content-section');
      contentSections.forEach(section => section.classList.add('hidden'));
      document.getElementById(buttonId).classList.remove('hidden');
  }

  function validateDecimalInput(event) {
    let value = event.target.value;

    // Restrict the input to 2 digits before the decimal and 2 digits after the decimal
    if (!/^(\d{1,2}(\.\d{0,2})?)?$/.test(value)) {
        // Remove the last character if the input is invalid
        event.target.value = value.slice(0, -1);
    }
}
document.getElementById('lowest_water_level').addEventListener('input',validateDecimalInput);
document.getElementById('highest_water_level').addEventListener('input',validateDecimalInput);

function validateNoDecimalInput(event) {
    let value = event.target.value;
    // Remove any non-digit characters including decimal points
    event.target.value = value.replace(/[^0-9]/g, '');
}
document.getElementById('displaced-persons').addEventListener('input',validateNoDecimalInput);
document.getElementById('displaced-families').addEventListener('input',validateNoDecimalInput);

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
