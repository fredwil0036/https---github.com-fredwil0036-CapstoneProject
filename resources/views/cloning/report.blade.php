<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @Vite('resources/css/app.css')
    <style>
         .hidden-nav {
      width: 4rem; /* Width for icons only */
      overflow: hidden;
      transition: width 0.3s;
        }
        .visible-nav {
        width: 16rem; /* 64 * 0.25rem (tailwind w-64) */
        transition: width 0.3s;
        }
        .main-expanded {
                margin-left: 16rem; /* Align with visible-nav width */
                transition: margin-left 0.3s;
        }
        .main-collapsed {
                margin-left: 4rem; /* Align with hidden-nav width */
                transition: margin-left 0.3s;
        }
    </style>
</head>
<body class="flex font-poppins bg-bgblue">
    @include('admin.adminmodal.leftnavigation')
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
            <div class="text-3xl mt-10 ">
                <h1 class="text-white">Reports</h1>      
            </div>

            <div class="text-2xl mt-10 ml-10 text-white">
                <p>2016-2019. Record o typhoons and South West Monsoon (Habagat) and there affect</p>
            </div>
            <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-blue-500 text-white font-bold ">
                <tr >
                    <th class=" px-4 py-2 border border-10">HAZARD EVENTS DESCRIPTION</th>
                    <th class="w-1/4 px-4 py-2 border border-10">DESCRIPTION</th>
                    <th class="w-1/6 px-4 py-2 border border-10">Date</th>
                    <th class="w-1/4 px-4 py-2 border border-10">AFFECTED BARANGAY</th>
                    <th class="w-1/4 px-4 py-2 pt-14 border border-10">CASUALTIES
                      <div class="flex item-center justify-between mt-4 pt-10">
                      <div class=" text-center ml-3 pl-5">
                            <h1>Dead</h1>
                        </div>
                        <div class="text-center">
                            <h1>Injured</h1>
                        </div>
                        <div class="text-center pr-6">
                            <h1>Missing</h1>
                        </div>
                      </div>
                    </th>
                    <th class="w-1/4 px-4 py-2">NUMBER OF DISPLACED POPULTAION
                    <div class="flex item-center justify-evenly mt-4 pt-10">
                    <div class="text-center pr-20">
                            <h1>Person</h1>
                        </div>
                        <div class="text-center">
                            <h1>Family</h1>
                        </div>
                        
                      </div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr>
                    <td class="border text-center">TD Amang</td>
                    <td class="border text-start">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi aperiam animi, earum rem corrupti aut alias tenetur, sint laboriosam autem reiciendis quisquam, nostrum distinctio labore ut quibusdam iure magnam dolores?</td>
                    <td class="border text-center">April 10-13</td>
                    <td class="border text-center">2.90</td>
                    <td class="border  text-center">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200 text-gray-700 font-bold">
                                <tr>
                                    <th class="w-1/4 "></th>
                                    <th class="w-1/4 "></th>
                                    <th class="w-1/4 "></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border text-center">200</td>
                                    <td class="border text-center">200</td>
                                    <td class="border text-center">22</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td class="  text-center">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200 text-gray-700 font-bold">
                                <tr>
                                    <th class="w-1/2 "></th>
                                    <th class="w-1/2 "></th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border  text-center">200</td>
                                    <td class="border text-center">200</td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <!-- Repeat rows as necessary -->
                <tr>
                    <td class="border text-center">TD Amang</td>
                    <td class="border text-start">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi aperiam animi, earum rem corrupti aut alias tenetur, sint laboriosam autem reiciendis quisquam, nostrum distinctio labore ut quibusdam iure magnam dolores?</td>
                    <td class="border text-center">April 10-13</td>
                    <td class="border text-center">2.90</td>
                    <td class="border  text-center">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200 text-gray-700 font-bold">
                                <tr>
                                    <th class="w-1/4 "></th>
                                    <th class="w-1/4 "></th>
                                    <th class="w-1/4 "></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class=" text-center">200</td>
                                    <td class=" text-center">500</td>
                                    <td class=" text-center">700</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td class="  text-center">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200 text-gray-700 font-bold">
                                <tr>
                                    <th class="w-1/2 "></th>
                                    <th class="w-1/2 "></th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="  text-center">200</td>
                                    <td class=" text-center">500</td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
        </div>
    </main>
    <script>
        const toggleButton = document.getElementById('toggle-nav');
    const navBar = document.getElementById('nav-bar');
    const mainContent = document.getElementById('main-content');

    toggleButton.addEventListener('click', () => {
    navBar.classList.toggle('visible-nav');
    navBar.classList.toggle('hidden-nav');
      
      mainContent.classList.toggle('main-collapsed');
      mainContent.classList.toggle('main-expanded');
      const spans = document.querySelectorAll('#nav-bar span:nth-child(2)');
      spans.forEach(span => span.classList.toggle('lg:hidden'));
  });
    </script>
</body>
</html>