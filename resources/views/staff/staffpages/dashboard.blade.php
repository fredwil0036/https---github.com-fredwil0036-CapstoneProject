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
    
    <div class="text-3xl mt-10 ml-10">
      <h1 class="text-white">Dashboard</h1>
    </div>
    
    <div id="monitorContent" class="mt-3 content-section p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded ml-10">
      <canvas id="monitorChart" class="w-full flex items-center justify-center"></canvas>
        </div>
  </div>
</main>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
            apiKey: "AIzaSyA4CAiWPYp-s5NDpyXjl8WvDHM4_mRCEH0",
            authDomain: "laravel-auth-a9af8.firebaseapp.com",
            databaseURL: "https://laravel-auth-a9af8-default-rtdb.firebaseio.com",
            projectId: "laravel-auth-a9af8",
            storageBucket: "laravel-auth-a9af8.appspot.com",
            messagingSenderId: "20229347350",
            appId: "1:20229347350:web:528c358d0993385a1bfd37",
            measurementId: "G-MGKSK2GERE"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  var db = firebase.firestore();

  const toggleButton = document.getElementById('toggle-nav');
  const navBar = document.getElementById('nav-bar');
  const mainContent = document.getElementById('main-content');
  const ProfileImage = document.getElementById('profileImage');
  const dropdownreport=document.getElementById('report-dropdwon');

    toggleButton.addEventListener('click', () => {
    navBar.classList.toggle('visible-nav');
    navBar.classList.toggle('hidden-nav');
      
      mainContent.classList.toggle('main-collapsed');
      mainContent.classList.toggle('main-expanded');
      ProfileImage.classList.toggle('hidden')
      dropdownreport.classList,toggle('hidden');
      const spans = document.querySelectorAll('#nav-bar span:nth-child(2)');
      spans.forEach(span => span.classList.toggle('lg:hidden'));
  });

  document.addEventListener('DOMContentLoaded', () => {
      renderChart();
  });

  function showContent(buttonId) {
      const contentSections = document.querySelectorAll('.content-section');
      contentSections.forEach(section => section.classList.add('hidden'));
      document.getElementById(buttonId).classList.remove('hidden');
  }

  function renderChart() {
      const ctx = document.getElementById('monitorChart').getContext('2d');
      const monitorChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: [],
              datasets: [{
                  label: 'Water Level',
                  data: [],
                  borderColor: 'rgba(75, 192, 192, 1)',
                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                  borderWidth: 4
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });

      // Listen for real-time updates
      db.collection("water_level").orderBy("date").onSnapshot(function(snapshot) {
          const waterLevels = [];
          const labels = [];
          snapshot.forEach(function(doc) {
              const data = doc.data();
              let date;
              if (data.date.seconds) {
                  // If the date is a Firestore timestamp
                  date = new Date(data.date.seconds * 1000);
              } else {
                  // If the date is an ISO string
                  date = new Date(data.date);
              }
              if (!isNaN(date)) {
                  labels.push(date.toLocaleString());
                  waterLevels.push(data.waterlevel + 4);
              } else {
                  console.error("Invalid date format: ", data.date);
              }
          });
          monitorChart.data.labels = labels;
          monitorChart.data.datasets[0].data = waterLevels;
          monitorChart.update();
      });
  }

     // Clear form fields and close modal on successful submission
    
</script>
</body>
</html>
