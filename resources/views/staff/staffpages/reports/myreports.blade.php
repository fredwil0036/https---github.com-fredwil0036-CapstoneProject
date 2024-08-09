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
@include('staff.staffmodal.viewmyreport')
@include('staff.staffmodal.confiramtiondelete')



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
         
          </div>
          <div class="flex pb-2 px-10">
            <form action="{{route('staff.addreport')}} " action="get">
              @csrf
            <button type="sumbit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-lg px-5 py-2.5 text-center me-2 mb-2">+</button>
            </form>
        <button id="delete-button" type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 disabled-opacity" disabled>Delete</button>       
        <button id="dowload-pdf" type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 disabled-opacity" disabled>Download as PDF</button>        
        <form method="GET" action="{{route('myreports.view') }}" class="flex">
                            <div class="mr-5">
                                <label for="year">Filter Year:</label>
                                <select name="year" id="year" onchange="this.form.submit()">
                                    <option value="">All Years</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ isset($selectedYear) && $selectedYear == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
        <label for="typhoon_name">Typhoon Filter:</label>
        <select name="typhoon_name" id="typhoon_name" onchange="this.form.submit()">
            <option value="" {{ !isset($selectedTyphoon) ? 'selected' : '' }}>All Typhoons</option>
            @foreach($typhoonNames as $name)
                <option value="{{ $name }}" {{ isset($selectedTyphoon) && $selectedTyphoon == $name ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>
       </form>
        </div>
        <div class="flex justify-center pb-10">
          <table class="w-98 bg-white shadow-lg rounded-sm">
            <thead class="bg-gray-700 whitespace-nowrap">
              <tr>
                <th class="pl-4 w-8">
                  <td><input type="checkbox" id="selectAll" class="dataCheckbox"></td>
                </th>
                <th class="p-4 text-left text-lg font-medium text-white">
                            Created Dated
                           
                        </th>
                        <th class="p-4 text-left text-lg font-medium text-white">
                           Typhoon Name
                        </th>
                        <th class="p-4 text-left text-lg font-medium text-white">
                           Lowest Water Level
                        </th>
                        <th class="p-4 text-left text-lg font-medium text-white">
                           Highest Water Level
                        </th>
                        <th class="p-4 text-center text-lg font-medium text-white">
                          Actions
                        </th>
              </tr>
            </thead>
            <tbody class="whitespace-nowrap">
              @forelse($myreports as $report)
              <tr class="even:bg-blue-200">
                <td class="pl-4 w-8">
                <td><input type="checkbox" class="dataCheckbox" data-id="{{ $report-> id }}"></td>                <td class="p-4 text-lg">
                  {{\Carbon\Carbon::parse($report -> created_at)->format('F j Y')}}
                </td>
                <td class="p-4 text-lg">
                 {{$report->typhoon_name}}
                </td>
                <td class="p-4 text-lg">
                 {{$report->lowest_water_level}}
                </td>
                <td class="p-4 text-lg">
                 {{$report->highest_water_level}}
                </td>
                <td class="p-4 text-lg flex justify-center">
                  <button onclick="showReportModal('{{ $report->id }}')" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View</button>
                  <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</button>    
                  <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
                     
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="border px-4 py-2">No reports found for the selected criteria.</td>
              </tr>
              @endforelse

            </tbody>

          </table>
          <div class=" text-red-500 ">
        {{ $myreports->links('vendor.pagination.tailwind') }}
     </div>
       
        </div>
        
        </div>
           
      </div> 
</main>

<script>
       function toggleModal() {
        const modal = document.getElementById('modal');
        modal.classList.toggle('hidden');
    }

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
  
    function toggleModal() {
            const modal = document.getElementById('modal');
            modal.classList.toggle('hidden');
        }

        function showReportModal(reportId) {
            // Fetch report details via AJAX
            fetch(`/staff/myreports/${reportId}`)
                .then(response => response.json())
                .then(data => {
                    const options = { year: 'numeric', month: 'long', day: 'numeric' };
                    const startedDate = new Date(data.started_date).toLocaleDateString('en-US', options);
                    const endDate = new Date(data.end_date).toLocaleDateString('en-US', options);
                    const numberFormatOptions = { style: 'currency', currency: 'PHP' };
                    const formatter = new Intl.NumberFormat('en-PH', numberFormatOptions);
                    const infrastructureDamaged = formatter.format(data.infrastracture_damaged);
                    const agricultureDamaged = formatter.format(data.agriculture_damaged);
                    const industrialDamaged = formatter.format(data.industrial_damaged);
                    const privateComercialDamaged = formatter.format(data.privateComercial_damaged);
                    const totalSum=data.industrial_damaged + data.industrial_damaged + data.industrial_damaged + data.privateComercial_damaged;
                    const totaldamaged= formatter.format(totalSum);

                    // Populate modal with report data
                    const modalContent = `
                    
                         <div class='flex'>
                            <span class="font-semibold mr-2">Typhoon Name:</span>
                            <p>${data.typhoon_name}</p>
                         </div>
                         <div class='flex'>
                            <span class="font-semibold mr-2">Date:</span>
                             <p>${startedDate} - ${endDate}</p>
                        </div>
                        <div class='flex'>
                            <span class="font-semibold mr-2">Affected Barangay:</span>
                            <p>${data.affected_barangay}</p>
                        </div>

                         <div class='border-t-4 border-gray-200'>
                            <div class='flex items-center' >
                          <div class='flex mr-10'>
                            <span class="font-semibold mr-2">Lowest Level:</span>
                            <p>${data.lowest_water_level}</p>
                            </div>
                         <div class='flex'>
                            <span class="font-semibold mr-2">Highest Level:</span>
                            <p>${data.highest_water_level}</p>
                            </div>
                         </div>

                         </div>

                       
                            <div class='border-t-4 border-gray-200'>
                            <span class="font-semibold">Casualties</span>
                           <div class='flex justify-evenly items-center'>
                            <div class='flex mr-2'>
                            <span class="mr-2">Dead:</span>
                             <p>${data.casualties_dead}</p>
                            </div>
                              <div class='flex mr-2'>
                            <span class="mr-2">Injured:</span>
                             <p>${data.casualties_injured}</p>
                            </div>
                              <div class='flex mr-2'>
                            <span class="mr-2">Missing:</span>
                             <p>${data.casualties_missing}</p>
                            </div>
                           </div>
                        </div>

                          <div class='border-t-4 border-gray-200'>
                            <span class="font-semibold">NUMBER OF AFFECTED POPULATION:</span>
                           <div class='flex justify-evenly items-center'>
                            <div class='flex mr-2'>
                            <span class="mr-2">Person:</span>
                             <p>${data.dispPol_person}</p>
                            </div>
                              <div class='flex mr-2'>
                            <span class="mr-2">Families:</span>
                             <p>${data.dispPol_families}</p>
                            </div>
                           
                           </div>
                        </div>

                         <div class='border-t-4 border-gray-200'>
                            <span class="font-semibold">NUMBER OF DAMAGED HOUSES:</span>
                           <div class='flex justify-evenly items-center'>
                            <div class='flex mr-2'>
                            <span class="mr-2">Totall:</span>
                             <p>${data.totally_damaged}</p>
                            </div>
                              <div class='flex mr-2'>
                            <span class="mr-2">Partially:</span>
                             <p>${data.damages_house_partially}</p>
                            </div>
                           
                           </div>
                        </div>


                          <div class='border-t-4 border-gray-200'>
                            <span class="font-semibold">DAMAGE TO PROPERTIES (PESOS)</span>
                           <div>
                            <div class='flex mr-2'>
                            <span class="mr-2 ">Insfrastracture Damaged:</span>
                             <p>${infrastructureDamaged}</p>
                            </div>
                              <div class='flex mr-2'>
                            <span class="mr-2">Agriculture Damaged:</span>
                             <p>${agricultureDamaged} PHP</p>
                            </div>
                              <div class='flex mr-2'>
                            <span class="mr-2">Industrial Damaged:</span>
                             <p>${industrialDamaged} PHP</p>
                            </div>
                               <div class='flex mr-2'>
                            <span class="mr-2">Private Comercial Damaged:</span>
                             <p>${privateComercialDamaged} PHP</p>
                            </div>
                                   <div class='flex mr-2'>
                            <span class="mr-2 font-semibold">Total:</span>
                             <p>${totaldamaged} PHP</p>
                            </div>
                            
                           </div>
                        </div>                        
                    `;
                    document.getElementById('modal-content').innerHTML = modalContent;
                    // Show the modal
                    toggleModal();
                })
                .catch(error => console.error('Error fetching report details:', error));
        }
       
        //delete multiple data
        document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('.dataCheckbox');
    const deleteButton = document.getElementById('delete-button');
    const selectAllCheckbox = document.getElementById('selectAll');

    function updateButtonState() {
        const checkedCheckboxes = document.querySelectorAll('.dataCheckbox:checked').length;
        if (checkedCheckboxes > 1) {
            deleteButton.disabled = false;
            deleteButton.classList.remove('disabled-opacity');
        } else {
            deleteButton.disabled = true;
            deleteButton.classList.add('disabled-opacity');
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

    deleteButton.addEventListener('click', function() {
        const selectedIds = Array.from(document.querySelectorAll('.dataCheckbox:checked'))
            .map(checkbox => checkbox.getAttribute('data-id'));

        document.getElementById('deleteConfirmationModal').classList.remove('hidden');

        document.getElementById('confirmDelete').addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'ids';
            input.value = JSON.stringify(selectedIds);
            document.getElementById('deleteForm').appendChild(input);
        });

        document.getElementById('cancelDelete').addEventListener('click', function() {
            document.getElementById('deleteConfirmationModal').classList.add('hidden');
        });
    });

    updateButtonState(); // Initial check
});
        
        



</script>
</body>
</html>
