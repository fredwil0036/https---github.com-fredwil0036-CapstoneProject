document.addEventListener("DOMContentLoaded", function() {
    var logoutBtn = document.getElementById('logout-btn');
    var modal = new bootstrap.Modal(document.getElementById('logoutModal'));

    logoutBtn.addEventListener('click', function() {
      modal.show();
    });

    var confirmLogoutBtn = document.getElementById('confirmLogout');
    confirmLogoutBtn.addEventListener('click', function() {
      // Perform logout action here
      // Redirect user or perform other logout actions
      // Example: window.location.href = 'logout.php';

      // Close the modal after logout
      modal.hide();
    });
  });

  