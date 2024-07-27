<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Management</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  @Vite('resources/css/app.css')
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>

<body class="flex font-poppins bg-bgblue ">
        <!-- modals -->
    @include('admin.adminmodal.leftnavigation')
    @include('admin.adminmodal.confirmation')
    @include('admin.adminmodal.addstaff')
    @include('admin.adminmodal.updateModal')
    @include('admin.adminmodal.deleteconfirmation')

    <main id="main-content" class="flex-grow p-4 main-collapsed">

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
  <div class="content md:container ">
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
        <h1 class="text-white">Account Management</h1>
       
    </div>
    <div class="container mx-auto mt-10 pl-64 flex justify-end">
    <button id="addButton" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded">Add Staff</button>
    </div>
      <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            <table class="min-w-max w-full table-auto">
                <thead>
              
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Email</th>                  
                        <th class="py-3 px-6 text-center">Role</th>
                              <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                   @foreach ($staffMembers as $staff)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/91.jpg" alt=""/>
                                </div>
                                <span>{{$staff -> last_name}},{{$staff -> first_name}} {{$staff -> middle_name}}</span>
                            </div>
                            
                        </td>
                        <td class="py-3 px-6 text-left">
                        {{$staff-> email}}
                        </td>
                       
                        <td class="py-3 px-6 text-center">
                        {{ $staff->usertype === 'user' ? 'Staff' : $staff->usertype }}
                        </td> 
                        <td class="py-3 px-6 text-center">
                             @if ($staff->is_online)
                           <div class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Online</div>
                            @else
                            <div class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Offline</div>
                             @endif
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center item-center">
                                <button type="button" onclick="openModal('{{ $staff->id }}', '{{ $staff->first_name }}', '{{ $staff->is_active }}' )" class="bg-blue-500 text-white px-2 py-1 rounded mr-2 {{ $staff->is_active ? 'bg-red-500' : 'bg-green-500' }}">
                                {{ $staff->is_active ? 'Disable' : 'Enable' }}</button>
                                <button type="button"  onclick="openEditModal('{{$staff->id}}' , '{{$staff->first_name}}', '{{$staff->middle_name}}','{{$staff->last_name}}' , '{{$staff->phone_number}}', '{{$staff->address}}', '{{$staff->birthdate}}' )" class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                                <button type="button" onclick="showDeleteModal(this)" data-url="{{ route('staffManagement.destroy', $staff->id) }}" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                   
                   
                  
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>   

  </div>
   
</main>





<script src="{{ asset('javascript/staffmanagement.js') }}"></script>
</body>

</html>