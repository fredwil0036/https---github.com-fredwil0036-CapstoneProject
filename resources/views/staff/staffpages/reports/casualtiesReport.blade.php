<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Management</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  @Vite('resources/css/app.css')
  <link rel="stylesheet" href="{{ asset('css/staffsidenav.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminreport/buttonopacity.css')}}">
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
        <div class=" overflow-x-auto mt-15 rounded-xl drop-shadow-md bg-white">
          <div class="flex py-5 px-10">
            @include('staff.staffmodal.topnav')
            <form class="w-96 ml-auto">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Typhoon Name " required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
          </div>
          <div class="flex pb-2 px-10">
          <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-lg px-5 py-2.5 text-center me-2 mb-2">+</button>
        <button id="delete-button" type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 disabled-opacity" disabled>Delete</button>       
        <button id="dowload-pdf" type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" disabled>Download as PDF</button>        
        </div>
        <div class="flex justify-center pb-10">
        <table class=" w-98 bg-white shadow-lg rounded-sm">
                <thead class="bg-gray-700 whitespace-nowrap">
                    <tr>
                        <th class="pl-4 w-8">
                        <td><input id="selectAll" type="checkbox" class="dataCheckbox" ></td>
                       
                        </th>
                        <th class="p-4 text-left text-lg font-medium text-white">
                           Typhoon Name
                        </th>
                        <th class=" w-40 p-4 text-left text-lg font-medium text-white">
                           Affected Barangay
                        </th>
                        <th class="pt-4 text-center text-lg font-medium text-white">
                         Casualties
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-center text-white">
                                        <th>Dead</th>
                                        <th>Missing</th>
                                        <th>Injured</th>
                                    </tr>
                                </thead>

                            </table>
                        </th>
                        <th class="pt-4 text-center text-lg font-medium text-white">
                          Number of Displaced Population
                          <table class="min-w-full">
                            <thead>
                                    <tr class="text-center text-white">
                                        <th>Dead</th>
                                        <th>Missing</th>
                                    </tr>
                          </table>
                        </th>
                        <th class="p-4 text-center text-lg font-medium text-white">
                          Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    @foreach ($disasterReports as $reports)
                      <tr class="even:bg-blue-50">
                        <td class="pl-4 w-8">
                        <td><input type="checkbox" class="dataCheckbox"></td>
                        </td>
                       
                        <td class="p-4 text-lg border-r">
                        {{$reports->typhoon_name}}
                        </td>
                      
                        <td class="p-4 text-lg border-r text-center">
                        {{$reports->affected_barangay}}
                        </td>
                        <td class="p-4 text-lg border-r">
                            <table class="min-w-full">
                                <tbody>
                                    <tr class="text-center">
                                    <td class=>{{number_format($reports->casualties_dead)}}</td>
                                    <td>{{number_format($reports->casualties_missing)}}</td>
                                    <td>{{number_format($reports->casualties_injured)}}</td>
                                    </tr>
                                </tbody>

                            </table>
                        </td>
                        <td class="p-4 text-lg border-r">
                        <table class="min-w-full">
                                <tbody>
                                    <tr class="text-center px-2">
                                    <td class=>{{number_format($reports->casualties_dead)}}</td>
                                    <td>{{number_format($reports->casualties_missing)}}</td>
                                    </tr>
                                </tbody>

                            </table>
                        </td>
                        <td class="p-4 text-lg flex justify-center">
                        <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</button>    
                       <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
                     
                    </td>
                    </tr>
                    @endforeach 
                  
                    
                </tbody>

            </table>
        </div>
        <div class=" text-red-500 ">
        {{ $disasterReports->links('vendor.pagination.tailwind') }}
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
document.addEventListener('DOMContentLoaded', () => {
        const checkboxes = document.querySelectorAll('.dataCheckbox');
        const deleteButton = document.getElementById('delete-button');
        const downloadpdf=document.getElementById('dowload-pdf');
        const selectAllCheckbox = document.getElementById('selectAll');

        function updateButtonState() {
        const checkedCheckboxes = document.querySelectorAll('.dataCheckbox:checked').length;
        if (checkedCheckboxes < 2) {
            deleteButton.disabled = true;
            deleteButton.classList.add('disabled-opacity');
        } else {
            deleteButton.disabled = false;
            deleteButton.classList.remove('disabled-opacity');
          ;
        }

        if(checkedCheckboxes< 1){
            downloadpdf.disabled = true;
            downloadpdf.classList.add('disabled-opacity'); 
        }else{
            downloadpdf.disabled = false;
            downloadpdf.classList.remove('disabled-opacity'); 
        }
        }

        checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateButtonState);
        });

        selectAllCheckbox.addEventListener('change', function() {
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateButtonState();
        });

        updateButtonState(); // Initial check
        });

        

  
</script>
</body>
</html>
