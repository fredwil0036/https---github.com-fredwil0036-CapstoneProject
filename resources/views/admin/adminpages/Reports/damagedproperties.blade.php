<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('/images/solace.svg') }}" type="image/svg">
    <title>Damaged Properties</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @Vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminreport/buttonopacity.css')}}">
</head>
<body class="flex font-poppins bg-black">
    @include('admin.adminmodal.leftnavigation')

    <main id="main-content" class="flex-grow p-4 main-expanded">
        <div class="header d-flex align-items-center mb-4">
        <!-- Left section with MDRRMO logo, text, App logo, and app name text -->
        <div class="flex align-items-center">
            <img src="{{ asset('images/mdrrmo.svg') }}" alt="MDRRMO Logo" class="mr-2">
            <span class="flex items-center mr-5 text-white">MDRRMO Sta. Barbara</span>
            <img src="{{ asset('images/solace.svg') }}" alt="App Logo" class="mr-2">
            <span class="flex items-center text-white">SolAce Flood Monitoring</span>
        </div>
        </div>
        <div class="oveflow-x-auto mt-15 bg-white mt-10 rounded-2xl drop-shadow-md">
            <div class="flex py-5 px-10">
            @include('admin.adminmodal.topnav')
            
            <form class="w-96 ml-auto">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Report Creator" required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        
        </div>
        <div class="flex pb-2 px-10">
        <button id="delete-button" type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 disabled-opacity" disabled>Delete</button>       
        <button id="dowload-pdf" type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" disabled>Download as PDF</button>        </div>
        
        <div class="flex justify-center pb-10">
        <table class=" w-98 bg-white shadow-lg rounded-sm">
                <thead class="bg-gray-700 whitespace-nowrap">
                    <tr>
                        <th class="pl-4 w-8">
                        <td><input type="checkbox" class="dataCheckbox" id="selectAll" ></td>
                       
                        </th>
                        <th class="p-4 text-left text-lg font-medium text-white">
                           Typhoon Name
                        </th>
                        <th class="p-4 text-left text-lg font-medium text-white">
                           Date
                        </th>
                        <th class="p-4 text-left text-lg font-medium text-white w-5">
                           Affected
                           <br>
                           Barangay
                        </th>
                        <th class="pt-4 text-center text-lg font-medium text-white">
                        Number of Damaged  Housses
                            <table class="min-w-full text-sm">
                                <thead>
                                    <tr class="text-center text-white">
                                    <th>Totally</th>
                                    <th>Partially</th>
                                    </tr>
                                </thead>

                            </table>
                        </th>
                        <th class="pt-4 text-center text-lg font-medium text-white">
                         Damage To Properties (Pesos)
                          <table class="min-w-full">
                            <thead>
                                    <tr class="text-center text-white text-sm">
                                        <th >Insfractracture</th>
                                        <th>Agriculture</th>
                                        <th>Industrial</th>
                                        <th>Private Comercial</th>
                                        <th>Total Amount</th>
                                    </tr>
                          </table>
                        </th>
                        <th class="p-4 text-center text-lg font-medium text-white">
                          Actions
                        </th>
                        
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    @foreach ($damaged as $reports)
                      <tr class="even:bg-blue-50">
                        <td class="pl-4 w-8">
                        <td><input type="checkbox" class="dataCheckbox"></td>
                        </td>
                       
                        <td class="p-4 text-lg border-r">
                        {{$reports->typhoon_name}}
                        </td>
                          <td class="p-4 text-lg border-r">
                        {{\Carbon\Carbon::parse($reports->started_date)->format('F y')}} - {{\Carbon\Carbon::parse($reports->end_date)->format('F y Y')}}
                        </td>
                      
                        <td class="p-4 text-lg border-r text-center w-5">
                        {{$reports->affected_barangay}}
                        </td>
                        <td class="p-4 text-lg border-r">
                            <table class="min-w-full">
                                <tbody>
                                    <tr class="text-center">
                                    <td class=>{{number_format($reports->totally_damaged)}}</td>
                                    <td>{{number_format($reports->damages_house_partially)}}</td>
                                    </tr>
                                </tbody>

                            </table>
                        </td>
                        <td class="p-4 text-lg border-r">
                        <table class="min-w-full">
                                <tbody >
                                    <tr class="text-center px-4 border-">
                                    <td>{{number_format($reports->infrastracture_damaged)}}</td>
                                    <td>{{number_format($reports->agriculture_damaged)}}</td>
                                    <td class=>{{number_format($reports->industrial_damaged)}}</td>
                                    <td>{{number_format($reports->privateComercial_damaged)}}</td>
                                    <td> ₱ {{number_format($reports->privateComercial_damaged +$reports->infrastracture_damaged + $reports->agriculture_damaged + $reports->industrial_damaged)}} </td>
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
           
        </div>

    </main>
</body>

<script src="{{asset('javascript/adminreportJS/report.js')}}"></script>
</html>