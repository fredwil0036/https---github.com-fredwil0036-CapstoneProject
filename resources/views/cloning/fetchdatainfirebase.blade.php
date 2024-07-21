<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Levels</title>
    <!-- Firebase App (the core Firebase SDK) -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <!-- Firebase Firestore -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
</head>
<body>
    <h1>Water Levels</h1>
    <ul id="water-levels">
        @foreach ($waterLevels as $level)
            <li>{{ $level->formatted_date }} at {{ $level->formatted_time }}: {{ $level->waterlevel }}</li>
        @endforeach
    </ul>

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

        // Reference to the water_level collection
        var waterLevelRef = db.collection("water_level");

        // Listen for real-time updates
        function formatDateTime(date) {
            var options = { day: '2-digit', weekday: 'long', month: 'long', year: 'numeric' };
            var formattedDate = date.toLocaleDateString('en-US', options);
            var formattedTime = date.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });
            return `${formattedDate} at ${formattedTime}`;
        }

        // Listen for real-time updates
        waterLevelRef.onSnapshot(function(snapshot) {
            var waterLevels = document.getElementById("water-levels");
            waterLevels.innerHTML = ""; // Clear existing data
            snapshot.forEach(function(doc) {
                var data = doc.data();
                var date;

                if (data.date.seconds) {
                    // If the date is a Firestore timestamp
                    date = new Date(data.date.seconds * 1000);
                } else {
                    // If the date is an ISO string
                    date = new Date(data.date);
                }

                if (!isNaN(date)) {
                    var li = document.createElement("li");
                    li.textContent = `${formatDateTime(date)}: ${data.waterlevel}`;
                    waterLevels.appendChild(li);
                } else {
                    console.error("Invalid date format: ", data.date);
                }
            });
        });
    </script>
</body>
</html>
