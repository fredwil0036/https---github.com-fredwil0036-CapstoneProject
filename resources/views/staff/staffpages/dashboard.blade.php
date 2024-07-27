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
          .nav-collapsed {
            width: 64px; /* Width to show only icons */
        }
        .nav-expanded {
            width: 250px; /* Width to show icons and text */
        }
        .main-collapsed {
            margin-left: 64px; /* Adjust according to collapsed nav bar width */
        }
        .main-expanded {
            margin-left: 250px; /* Adjust according to expanded nav bar width */
        }
        .text-hidden {
            display: none;
        }
        .text-visible {
            display: inline-block;
        }
        #nav-bar, #main-content, .ml-2 {
            transition: all 0.3s ease;
        }
        .profile-section {
        text-align: center;
        }
        .profile-picture {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin: 0 auto;
        }
        .profile-info {
            text-align: center;
            margin-top: 8px;
        }
      
    </style>
<body class="flex font-poppins bg-bgblue ">

@include('staff.staffmodal.leftnavigation')


<main id="main-content" class="flex-grow p-4 main-collapsed">
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
    
    <div id="monitorContent" class="w-11/12 mt-3 content-section p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded ml-10">
      <canvas id="monitorChart" class="w-full flex items-center justify-center"></canvas>
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

    // Ensure nav bar is collapsed initially
    document.addEventListener('DOMContentLoaded', () => {
        navBar.classList.add('nav-collapsed');
    });


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
