
// add staff script
function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function() {
        var dataURL = reader.result;
        var output = document.getElementById('profileImagePreview');
        output.src = dataURL;
        output.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
    }
    document.getElementById('addButton').addEventListener('click', function() {
    document.getElementById('addStaffModal').classList.remove('hidden');
    });

    document.getElementById('cancelButton').addEventListener('click', function() {
    document.getElementById('addStaffModal').classList.add('hidden');
    });
    // end
   
 
    //left navigation script 
    const toggleButton = document.getElementById('toggle-nav');
    const navBar = document.getElementById('nav-bar');
    const mainContent = document.getElementById('main-content');

    toggleButton.addEventListener('click', () => {
        navBar.classList.toggle('hidden-nav');
        navBar.classList.toggle('visible-nav');
        mainContent.classList.toggle('main-collapsed');
        mainContent.classList.toggle('main-expanded');
        const spans = document.querySelectorAll('#nav-bar span:nth-child(2)');
        spans.forEach(span => span.classList.toggle('lg:hidden'));
    });


   
    //enable and disbale script
    function openModal(userId, userName, userIsActive) {
    document.getElementById('confirmationModal').classList.remove('hidden');
    document.getElementById('modalMessage').innerText = `Are you sure you want to ${userIsActive ? 'disable' : 'enable'} ${userName}?`;
    document.getElementById('confirmButton').onclick = function() {
        window.location.href = `/user/toggle-status/${userId}`;
    };
    }

    function closeModal() {
        document.getElementById('confirmationModal').classList.add('hidden');
    }

    function closeModal() {
        document.getElementById('confirmationModal').classList.add('hidden');
    }

    //edit script
    function openEditModal(userId, userFirstName,userMiddlename, userLastname, userPhonenumber, userAddresss, userBirthdate) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('first_name').value = userFirstName;
        document.getElementById('middle_name').value = userMiddlename;
        document.getElementById('last_name').value = userLastname;
        document.getElementById('address').value = userAddress;
        document.getElementById('birthdate').value = userBirthdate;
        document.getElementById('phone_number').value = userPhonenumber;
        document.getElementById('userId').value = userId;

        document.getElementById('editForm').action = `/user/update/${userId}`;
    }

    function showDeleteModal(button) {
        let userId = button.getAttribute('data-url').split('/').pop();
        document.getElementById('userId').value = userId;
        document.getElementById('deleteForm').action = button.getAttribute('data-url');
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }