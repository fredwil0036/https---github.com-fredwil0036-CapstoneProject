<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Left Nav Bar with Toggle</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/log out.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
  </style>
</head>
<body class="flex">

  <!-- Left Navigation -->
  <nav id="nav-bar" class="visible-nav h-screen bg-gray-800 text-white flex flex-col">
    <div class="p-4 flex items-center justify-between">
      
      <!-- Toggle Button Inside Nav -->
      <button id="toggle-nav" class="text-white flex items-center justify-center">
        <span class="material-icons">menu</span>
      </button>
    </div>
    <ul class="flex flex-col flex-grow">
      <li class="p-4 hover:bg-gray-700">
        <a href="#" class="flex items-center">
          <span class="material-icons">dashboard</span>
          <span class="ml-2 hidden lg:block">Dashboard</span>
        </a>
      </li>
      <li class="p-4 hover:bg-gray-700">
        <a href="#" class="flex items-center">
          <span class="material-icons">person_add</span>
          <span class="ml-2 hidden lg:block">Add User</span>
        </a>
      </li>
      <li class="p-4 hover:bg-gray-700">
        <a href="#" class="flex items-center">
          <span class="material-icons">report</span>
          <span class="ml-2 hidden lg:block">Report</span>
        </a>
      </li>
      <li class="p-4 hover:bg-gray-700">
        <a href="#" class="flex items-center">
          <span class="material-icons">manage_accounts</span>
          <span class="ml-2 hidden lg:block">User Management</span>
        </a>
      </li>
      <li class="p-4 hover:bg-gray-700">
        <a href="#" class="flex items-center">
          <span class="material-icons">cloud</span>
          <span class="ml-2 hidden lg:block">Weather Forecast</span>
        </a>
      </li>
    </ul>
    
    <div class="p-4 bg-red-900 hover:bg-red-400 " >
        <a href="#" class="flex items-center">
          <span class="material-icons">exit_to_app</span>
          <span class="ml-2 hidden lg:block">Logout</span>
        </a>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="flex-grow p-1">
  <div class="content">
  <div class="container-fluid">
    <div class="header d-flex align-items-center mb-4">
      <!-- Left section with MDRRMO logo, text, App logo, and app name text -->
      <div class="d-flex align-items-center">
        <img src="{{ asset('images/mdrrmo.svg') }}" alt="MDRRMO Logo" class="mr-2">
        <span class="logo-text mr-2">MDRRMO Sta. Barbara</span>
        <img src="{{ asset('images/solace.svg') }}" alt="App Logo" class="mr-2">
        <span class="app-name">SolAce Flood Monitoring</span>
      </div>
    </div>

    <!-- Text below the header -->
    <div class="dashboard-text">
      <span>Dashboard</span>
    </div>

    <!-- Second row -->
    <div class="section-row">
      <div class="col-md-12">
        <div class="d-flex align-items-center mb-3">
          <span class="nav-item mr-3 active" id="nav-monitoring">Monitoring Station</span>
          <span class="nav-item mr-3" id="nav-alerts">Alerts</span>
          <span class="nav-item mr-3" id="nav-historical">Historical Data</span>
        </div>
        <hr class="hr-long">
      </div>
    </div>

    <!-- Monitoring Station Section -->
    <div class="section" id="section-monitoring">
      <!-- Monitoring Station content -->
      <span id="chart-title">Sinucalan River Live Monitoring</span>
      <!-- Container for the chart -->
      <div class="chart-container">
        <canvas id="lineChart"></canvas>
      </div>
    </div>

 <!-- Alerts Section -->
 <div class="section" id="section-alerts" style="display: none;">
  <!-- Alerts content -->
  <div class="d-flex align-items-start mb-3">
    <!-- Warning Alerts Container -->
    <div class="alert-container mr-3" id="warning-container">
      <div class="alert-header warning-header">
        Warning <span class="alert-count" id="warning-count">99+</span>
      </div>
    </div>    
    <!-- Critical Alerts Container -->
    <div class="alert-container" id="critical-container">
      <div class="alert-header critical-header">
        Critical <span class="alert-count" id="critical-count">99+</span>
      </div>
    </div>
    <!-- Send Alert Button -->
    <div class="ml-auto">
      <button class="btn btn-primary" id="btn-send-alert">Send Alert</button>
    </div>
  </div>
  <!-- Alert contents outside of containers -->
  <div id="alert-contents">
    <div class="alert-content warning-content">
      <h4>Warning Alerts</h4>
      <!-- Warning Alert List -->
      <ul>
        <li class="alert-list" id="warning-list">
          <span class="warning-text">Warning Level</span>
          <span class="alert-time" id="warning-time">12:00 AM </span>
          <span class="alert-date" id="warning-date">Dec 09, 2024</span>
          <p class="alert-measurement" id="warning-measurement">7 (MASL), <span class="alert-information" id="warning-info">Alert Level Reached</span></p>
        </li>
        <li class="alert-list" id="warning-list">
          <span class="warning-text">Warning Level</span>
          <span class="alert-time" id="warning-time">11:00 AM </span>
          <span class="alert-date" id="warning-date">Dec 09, 2024</span>
          <p class="alert-measurement" id="warning-measurement">6 (MASL), <span class="alert-information" id="warning-info">Alert Level Reached</span></p>
        </li>
        <li class="alert-list" id="warning-list">
          <span class="warning-text">Warning Level</span>
          <span class="alert-time" id="warning-time">10:00 AM </span>
          <span class="alert-date" id="warning-date">Dec 09, 2024</span>
          <p class="alert-measurement" id="warning-measurement">5 (MASL), <span class="alert-information" id="warning-info">Alert Level Reached</span></p>
        </li>
      </ul>
    </div>
    <div class="alert-content critical-content" style="display: none;">
      <h4>Critical Alerts</h4>
      <!-- Critical Alert List -->
      <ul>
        <li class="alert-list" id="critical-list">
          <span class="critical-text">Critical Level</span>
          <span class="alert-time" id="critical-time">3:00 AM </span>
          <span class="alert-date" id="critical-date">Dec 09, 2024</span>
          <p class="alert-measurement" id="critical-measurement">8 (MASL), <span class="alert-information" id="critical-info">Alert Level Reached</span></p>
        </li>
        <li class="alert-list" id="critical-list">
          <span class="critical-text">Critical Level</span>
          <span class="alert-time" id="critical-time">2:00 AM </span>
          <span class="alert-date" id="critical-date">Dec 09, 2024</span>
          <p class="alert-measurement" id="critical-measurement">8 (MASL), <span class="alert-information" id="critical-info">Alert Level Reached</span></p>
        </li>
        <li class="alert-list" id="critical-list">
          <span class="critical-text">Critical Level</span>
          <span class="alert-time" id="critical-time">1:00 AM </span>
          <span class="alert-date" id="critical-date">Dec 09, 2024</span>
          <p class="alert-measurement" id="critical-measurement">8 (MASL), <span class="alert-information" id="critical-info">Alert Level Reached</span></p>
        </li>
      </ul>
    </div>
  </div>
 </div>

    <!-- Historical Data Section -->
<div class="section" id="section-historical" style="display: none;">
    <!-- Historical Data Container -->
  <div class="history container-fluid">
    <div class="row">
      <!-- Historical Data Months -->
      <div class="col history-months" id="jan-container">January </div>
      <div class="col history-months" id="feb-container">February</div>
      <div class="col history-months" id="mar-container">March</div>
      <div class="col history-months" id="apr-container">April</div>
      <div class="col history-months" id="may-container">May</div>
      <div class="col history-months" id="jun-container">June</div>
      <div class="col history-months" id="jul-container">July</div>
      <div class="col history-months" id="aug-container">August</div>
      <div class="col history-months" id="sep-container">September</div>
      <div class="col history-months" id="oct-container">October</div>
      <div class="col history-months" id="nov-container">November</div>
      <div class="col history-months" id="dec-container">December</div>
    </div>
  </div>
  
  <!-- History data contents outside of containers -->
  <div id="history-data-contents">
    <div class="history-data-content jan-content">
      <h4>January data</h4>
      <!-- jan History data List -->
      <ul>
        <li class="history-data-list" id="jan-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="jan-time">12:00 AM </span>
          <span class="history-data-date" id="jan-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="jan-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="jan-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="jan-time">11:00 AM </span>
          <span class="history-data-date" id="jan-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="jan-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="jan-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="jan-time">10:00 AM </span>
          <span class="history-data-date" id="jan-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="jan-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content feb-content" style="display: none;">
      <h4>February data</h4>
      <!-- feb History data List -->
      <ul>
        <li class="history-data-list" id="feb-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="feb-time">12:00 AM </span>
          <span class="history-data-date" id="feb-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="feb-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="feb-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="feb-time">11:00 AM </span>
          <span class="history-data-date" id="feb-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="feb-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="feb-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="feb-time">10:00 AM </span>
          <span class="history-data-date" id="feb-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="feb-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content mar-content" style="display: none;">
      <h4>March data</h4>
      <!-- mar History data List -->
      <ul>
        <li class="history-data-list" id="mar-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="mar-time">12:00 AM </span>
          <span class="history-data-date" id="mar-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="mar-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="mar-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="mar-time">11:00 AM </span>
          <span class="history-data-date" id="mar-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="mar-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="mar-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="mar-time">10:00 AM </span>
          <span class="history-data-date" id="mar-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="mar-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content apr-content" style="display: none;">
      <h4>April data</h4>
      <!-- apr History data List -->
      <ul>
        <li class="history-data-list" id="apr-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="apr-time">12:00 AM </span>
          <span class="history-data-date" id="apr-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="apr-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="apr-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="apr-time">11:00 AM </span>
          <span class="history-data-date" id="apr-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="apr-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="apr-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="apr-time">10:00 AM </span>
          <span class="history-data-date" id="apr-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="apr-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content may-content" style="display: none;">
      <h4>May data</h4>
      <!-- may History data List -->
      <ul>
        <li class="history-data-list" id="may-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="may-time">12:00 AM </span>
          <span class="history-data-date" id="may-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="may-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="may-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="may-time">11:00 AM </span>
          <span class="history-data-date" id="may-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="may-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="may-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="may-time">10:00 AM </span>
          <span class="history-data-date" id="may-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="may-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content jun-content" style="display: none;">
      <h4>June data</h4>
      <!-- jun History data List -->
      <ul>
        <li class="history-data-list" id="jun-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="jun-time">12:00 AM </span>
          <span class="history-data-date" id="jun-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="jun-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="jun-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="jun-time">11:00 AM </span>
          <span class="history-data-date" id="jun-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="jun-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="jun-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="jun-time">10:00 AM </span>
          <span class="history-data-date" id="jun-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="jun-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content jul-content" style="display: none;">
      <h4>July data</h4>
      <!-- jul History data List -->
      <ul>
        <li class="history-data-list" id="jul-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="jul-time">12:00 AM </span>
          <span class="history-data-date" id="jul-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="jul-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="jul-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="jul-time">11:00 AM </span>
          <span class="history-data-date" id="jul-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="jul-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="jul-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="jul-time">10:00 AM </span>
          <span class="history-data-date" id="jul-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="jul-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content aug-content" style="display: none;">
      <h4>August data</h4>
      <!-- aug History data List -->
      <ul>
        <li class="history-data-list" id="aug-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="aug-time">12:00 AM </span>
          <span class="history-data-date" id="aug-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="aug-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="aug-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="aug-time">11:00 AM </span>
          <span class="history-data-date" id="aug-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="aug-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="aug-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="aug-time">10:00 AM </span>
          <span class="history-data-date" id="aug-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="aug-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content sep-content" style="display: none;">
      <h4>September data</h4>
      <!-- sep History data List -->
      <ul>
        <li class="history-data-list" id="sep-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="sep-time">12:00 AM </span>
          <span class="history-data-date" id="sep-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="sep-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="sep-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="sep-time">11:00 AM </span>
          <span class="history-data-date" id="sep-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="sep-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="sep-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="sep-time">10:00 AM </span>
          <span class="history-data-date" id="sep-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="sep-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content oct-content" style="display: none;">
      <h4>October data</h4>
      <!-- oct History data List -->
      <ul>
        <li class="history-data-list" id="oct-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="oct-time">12:00 AM </span>
          <span class="history-data-date" id="oct-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="oct-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="oct-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="oct-time">11:00 AM </span>
          <span class="history-data-date" id="oct-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="oct-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="oct-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="oct-time">10:00 AM </span>
          <span class="history-data-date" id="oct-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="oct-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content nov-content" style="display: none;">
      <h4>November data</h4>
      <!-- nov History data List -->
      <ul>
        <li class="history-data-list" id="nov-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="nov-time">12:00 AM </span>
          <span class="history-data-date" id="nov-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="nov-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="nov-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="nov-time">11:00 AM </span>
          <span class="history-data-date" id="nov-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="nov-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="nov-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="nov-time">10:00 AM </span>
          <span class="history-data-date" id="nov-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="nov-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    <div class="history-data-content dec-content" style="display: none;">
      <h4>December data</h4>
      <!-- dec History data List -->
      <ul>
        <li class="history-data-list" id="dec-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="dec-time">12:00 AM </span>
          <span class="history-data-date" id="dec-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="dec-measurement">Reached 7 (MASL)</p>
        </li>
        <li class="history-data-list" id="dec-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="dec-time">11:00 AM </span>
          <span class="history-data-date" id="dec-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="dec-measurement">Reached 6 (MASL)</p>
        </li>
        <li class="history-data-list" id="dec-list">
          <span class="report-history">Alert Level</span>
          <span class="history-data-time" id="dec-time">10:00 AM </span>
          <span class="history-data-date" id="dec-date">Dec 09, 2024</span>
          <p class="history-data-measurement" id="dec-measurement">Reached 5 (MASL)</p>
        </li>
      </ul>
    </div>
    
</div>


</div>
  </main>

  <!-- JavaScript -->
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('css/dashboard.js') }}"></script>
<script src="{{ asset('css/logout.js') }}"></script>
</body>
</html>
