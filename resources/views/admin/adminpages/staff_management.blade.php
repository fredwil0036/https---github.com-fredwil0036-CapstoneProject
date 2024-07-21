<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Management</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  @Vite('resources/css/app.css')
</head>
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
<body class="flex font-poppins bg-bgblue ">
        <!-- modals -->
    @include('admin.adminmodal.leftnavigation')
    @include('admin.adminmodal.confirmation')
    @include('admin.adminmodal.addstaff')
    @include('admin.adminmodal.updateModal')
    @include('admin.adminmodal.deleteconfirmation')

<main class="flex-grow p-4 main-expanded bg-bgblue" id="main-content">

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

      <div class="flex items-center ml-10 mt-10">
        <div class="overflow-x-auto w-full max-w-full rounded-md">
        <table class="min-w-full bg-white  divide-y divide-black">
       <thead>
       
         <tr class="bg-blue-800 text-white text-xl">
          <th class="py-2 px-4 border-b border-r-1 border-gray-400">id</th>
          <th class="py-2 px-4 border-b">Image</th>
          <th class="py-2 px-4 border-b">Name</th>
          <th class="py-2 px-4 border-b">Date Created</th>
          <th class="py-2 px-4 border-b">Role</th>
          <th class="py-2 px-4 border-b">Status</th>
          <th class="py-2 px-4 border-b">Action</th>
        </tr>
       
       </thead>
       <tbody class="divide-y divide-black">
       @foreach ($staffMembers as $staff)
        <tr>
          <!-- idnumber -->
          <td class="py-2 px-4 border-b text-center">{{$staff->id}}</td>
             <!-- image -->
             <td class="py-2 px-4 border-b ">
                <div class="flex justify-center items-center">
                  <img src="{{ asset('profilepic/prof2.jpg') }}" alt="" style="height: 100px; width: auto;">
                </div>
                
              </td>             <!-- Name -->
            <td class="py-2 px-4 border-b text-center">{{$staff->last_name}}, {{$staff->first_name}}, {{$staff->middle_name}}</td>
             <!-- Date created -->
             <td class="py-2 px-4 border-b text-center">{{ $staff->created_at->format('F j, Y h:i A') }}</td>
             <!-- role -->
             <td class="py-2 px-4 border-b">
               {{ $staff->usertype === 'user' ? 'Staff' : $staff->usertype }}
              </td>
             <!-- status -->
             <td class="py-2 px-4 border-b">
               @if ($staff->is_online)
              <div class="bg-green-800 text-white py-2 px-4 rounded-full flex items-center justify-center">Online</div>
            @else
              <div class="bg-red-800 text-white py-2 px-4 rounded-full flex items-center justify-center">Offline</div>
              @endif
            </td>
             <!-- Action -->
          <td class="py-2 px-4 border-b">
        <div class=" flex justify-center items-center space-x-2">
          <button type="button" onclick="openModal('{{ $staff->id }}', '{{ $staff->first_name }}', '{{ $staff->is_active }}' )" class="px-4 py-2 rounded text-white {{ $staff->is_active ? 'bg-red-500' : 'bg-green-500' }}">
            {{ $staff->is_active ? 'Disable' : 'Enable' }}
            </button>
            <button type="button"  onclick="openEditModal('{{$staff->id}}' , '{{$staff->first_name}}', '{{$staff->middle_name}}','{{$staff->last_name}}' , '{{$staff->phone_number}}', '{{$staff->address}}', '{{$staff->birthdate}}' )" 
            class="text-white bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded ">Edit</button>
            <button type="button" onclick="showDeleteModal(this)" data-url="{{ route('staffManagement.destroy', $staff->id) }}" class="text-white bg-red-700 hover:bg-red-800 px-4 py-2">Delete</button>

        </div>
          
          </td>
       
        </tr>
        @endforeach
      </tbody>
    </table>
        </div>
      </div>

  </div>
   
</main>





<script src="{{ asset('javascript/staffmanagement.js') }}"></script>
</body>

</html>