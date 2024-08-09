
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
            navBar.classList.toggle('nav-collapsed');
            navBar.classList.toggle('nav-expanded');
            mainContent.classList.toggle('main-collapsed');
            mainContent.classList.toggle('main-expanded');
            const textLabels = document.querySelectorAll('#nav-bar .ml-2');
            textLabels.forEach(label => label.classList.toggle('text-hidden'));
            textLabels.forEach(label => label.classList.toggle('text-visible'));
            const profileInfo = document.querySelector('.profile-info');
            const profilepic = document.querySelector('.profile-picture');
            profileInfo.classList.toggle('text-hidden');
            profileInfo.classList.toggle('text-visible');
            profilepic.classList.toggle('hidden');
            profilepic.classList.toggle('vissible');
        });
        document.getElementById('reports-button').addEventListener('click', () => {
            const submenu = document.getElementById('reports-submenu');
            if (submenu.classList.contains('hidden')) {
                submenu.classList.remove('hidden');
                submenu.style.maxHeight = submenu.scrollHeight + 'px';
            } else {
                submenu.style.maxHeight = '0';
                submenu.addEventListener('transitionend', () => {
                    if (submenu.style.maxHeight === '0px') {
                        submenu.classList.add('hidden');
                    }
                }, { once: true });
            }
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