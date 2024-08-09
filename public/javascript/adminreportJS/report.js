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



document.addEventListener('DOMContentLoaded', () => {
const checkboxes = document.querySelectorAll('.dataCheckbox');
const deleteButton = document.getElementById('delete-button');
const downloadpdf=document.getElementById('dowload-pdf');
const selectAllCheckbox = document.getElementById('selectAll');

function updateButtonState() {
const checkedCheckboxes = document.querySelectorAll('.dataCheckbox:checked').length;
if (checkedCheckboxes < 2) {
    deleteButton.disabled = true;
    deleteButton.classList.add('disabled-opacity');
    downloadpdf.disabled = true;
    downloadpdf.classList.add('disabled-opacity');
} else {
    deleteButton.disabled = false;
    deleteButton.classList.remove('disabled-opacity');
    downloadpdf.disabled = false;
    downloadpdf.classList.remove('disabled-opacity');
}
}

checkboxes.forEach(checkbox => {
checkbox.addEventListener('change', updateButtonState);
});

selectAllCheckbox.addEventListener('change', function() {
checkboxes.forEach(checkbox => {
    checkbox.checked = this.checked;
});
updateButtonState();
});

updateButtonState(); // Initial check
});

function toggleModal() {
    const modal = document.getElementById('modal');
    modal.classList.toggle('hidden');
}

function showReportModal(reportId) {
    // Fetch report details via AJAX
    fetch(`/admin/allreports/${reportId}`)
        .then(response => response.json())
        .then(data => {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const startedDate = new Date(data.started_date).toLocaleDateString('en-US', options);
            const endDate = new Date(data.end_date).toLocaleDateString('en-US', options);
            const numberFormatOptions = { style: 'currency', currency: 'PHP' };
            const formatter = new Intl.NumberFormat('en-PH', numberFormatOptions);
            const infrastructureDamaged = formatter.format(data.infrastracture_damaged);
            const agricultureDamaged = formatter.format(data.agriculture_damaged);
            const industrialDamaged = formatter.format(data.industrial_damaged);
            const privateComercialDamaged = formatter.format(data.privateComercial_damaged);
            const totalSum=data.industrial_damaged + data.industrial_damaged + data.industrial_damaged + data.privateComercial_damaged;
            const totaldamaged= formatter.format(totalSum);
           

            // Populate modal with report data
            const modalContent = `
               
                 <div class='flex'>
                    <span class="font-semibold mr-2">Typhoon Name:</span>
                    <p>${data.typhoon_name}</p>
                 </div>
                 <div class='flex'>
                    <span class="font-semibold mr-2">Date:</span>
                     <p>${startedDate} - ${endDate}</p>
                </div>
                <div class='flex'>
                    <span class="font-semibold mr-2">Affected Barangay:</span>
                    <p>${data.affected_barangay}</p>
                </div>

                 <div class='border-t-4 border-gray-200'>
                    <div class='flex items-center' >
                  <div class='flex mr-10'>
                    <span class="font-semibold mr-2">Lowest Level:</span>
                    <p>${data.lowest_water_level}</p>
                    </div>
                 <div class='flex'>
                    <span class="font-semibold mr-2">Highest Level:</span>
                    <p>${data.highest_water_level}</p>
                    </div>
                 </div>

                 </div>

               
                    <div class='border-t-4 border-gray-200'>
                    <span class="font-semibold">Casualties</span>
                   <div class='flex justify-evenly items-center'>
                    <div class='flex mr-2'>
                    <span class="mr-2">Dead:</span>
                     <p>${data.casualties_dead}</p>
                    </div>
                      <div class='flex mr-2'>
                    <span class="mr-2">Injured:</span>
                     <p>${data.casualties_injured}</p>
                    </div>
                      <div class='flex mr-2'>
                    <span class="mr-2">Missing:</span>
                     <p>${data.casualties_missing}</p>
                    </div>
                   </div>
                </div>

                  <div class='border-t-4 border-gray-200'>
                    <span class="font-semibold">NUMBER OF AFFECTED POPULATION:</span>
                   <div class='flex justify-evenly items-center'>
                    <div class='flex mr-2'>
                    <span class="mr-2">Person:</span>
                     <p>${data.dispPol_person}</p>
                    </div>
                      <div class='flex mr-2'>
                    <span class="mr-2">Families:</span>
                     <p>${data.dispPol_families}</p>
                    </div>
                   
                   </div>
                </div>

                 <div class='border-t-4 border-gray-200'>
                    <span class="font-semibold">NUMBER OF DAMAGED HOUSES:</span>
                   <div class='flex justify-evenly items-center'>
                    <div class='flex mr-2'>
                    <span class="mr-2">Totall:</span>
                     <p>${data.totally_damaged}</p>
                    </div>
                      <div class='flex mr-2'>
                    <span class="mr-2">Partially:</span>
                     <p>${data.damages_house_partially}</p>
                    </div>
                   
                   </div>
                </div>


                  <div class='border-t-4 border-gray-200'>
                    <span class="font-semibold">DAMAGE TO PROPERTIES (PESOS)</span>
                   <div>
                    <div class='flex mr-2'>
                    <span class="mr-2 ">Insfrastracture Damaged:</span>
                     <p>${infrastructureDamaged}</p>
                    </div>
                      <div class='flex mr-2'>
                    <span class="mr-2">Agriculture Damaged:</span>
                     <p>${agricultureDamaged} </p>
                    </div>
                      <div class='flex mr-2'>
                    <span class="mr-2">Industrial Damaged:</span>
                     <p>${industrialDamaged} </p>
                    </div>
                       <div class='flex mr-2'>
                    <span class="mr-2">Private Comercial Damaged:</span>
                     <p>${privateComercialDamaged} </p>
                    </div>
                     <div class='flex mr-2'>
                    <span class="mr-2 font-bold">Total:</span>
                     <p class="font-bold">${totaldamaged} </p>
                    </div>
                   </div>
                </div>                        
            `;
            document.getElementById('modal-content').innerHTML = modalContent;
            // Show the modal
            toggleModal();
        })
        .catch(error => console.error('Error fetching report details:', error));
}