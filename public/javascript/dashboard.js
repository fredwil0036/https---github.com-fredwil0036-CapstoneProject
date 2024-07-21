$(document).ready(function() {
  // Chart initialization
  var ctx = document.getElementById('lineChart').getContext('2d');
  var lineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['1:00 am', '2:00 am', '3:00 am', '4:00 am', '5:00 am', '6:00 am', '7:00 am', '8:00 am', '9:00 am'],
      datasets: [{
        label: 'Water Level',
        data: [0, 2, 4, 6, 8, 1, 3, 5, 7],
        fill: true,
        backgroundColor: 'rgba(189, 189, 189, 0.2)',
        borderColor: '#007bff',
        borderWidth: 2,
        tension: 0.1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            color: '#ffffff'
          },
          grid: {
            color: 'rgba(255, 255, 255, 0.2)'
          }
        },
        x: {
          ticks: {
            color: '#ffffff'
          },
          grid: {
            color: 'rgba(255, 255, 255, 0.2)'
          }
        }
      },
      plugins: {
        legend: {
          labels: {
            color: '#ffffff'
          }
        }
      }
    }
  });

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

// Initially show the Monitoring Station section and mark it as active
$('#section-monitoring').show();
$('#nav-monitoring').addClass('active');

// Click event for Monitoring Station
$('#nav-monitoring').click(function(e) {
  e.preventDefault();
  $('.nav-item').removeClass('active');
  $(this).addClass('active');
  $('.section').hide();
  $('#section-monitoring').show();
});

// Click event for Alerts
$('#nav-alerts').click(function(e) {
  e.preventDefault();
  $('.nav-item').removeClass('active');
  $(this).addClass('active');
  $('.section').hide();
  $('#section-alerts').show();
  // Default to showing warning alerts
  $('#warning-container').click();
});

// Click event for Warning Alerts container
$('#warning-container').click(function() {
  $('.alert-header').removeClass('active');
  $(this).find('.alert-header').addClass('active');
  $('.alert-content').hide();
  $('.warning-content').show();
});

// Click event for Critical Alerts container
$('#critical-container').click(function() {
  $('.alert-header').removeClass('active');
  $(this).find('.alert-header').addClass('active');
  $('.alert-content').hide();
  $('.critical-content').show();
});

// Click event for Send Alert button
$('#btn-send-alert').click(function() {
  alert('Sending alert...');
  // Implement your logic for sending alerts here
});

// Initial state: Show Warning alerts by default
$('#warning-container').click();

// Click event for Historical Data
$('#nav-historical').click(function(e) {
  e.preventDefault();
  $('.nav-item').removeClass('active');
  $(this).addClass('active');
  $('.section').hide();
  $('#section-historical').show();

  // Default to showing january history
  $('#jan-container').click();
});

// Click event for Historical Data of January container
$('#jan-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.jan-content').show();
});

// Click event for Historical Data of Febuary container
$('#feb-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.feb-content').show();
});

// Click event for Historical Data of March container
$('#mar-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.mar-content').show();
});

// Click event for Historical Data of April container
$('#apr-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.apr-content').show();
});

// Click event for Historical Data of May container
$('#may-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.may-content').show();
});

// Click event for Historical Data of June container
$('#jun-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.jun-content').show();
});

// Click event for Historical Data of July container
$('#jul-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.jul-content').show();
});

// Click event for Historical Data of August container
$('#aug-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.aug-content').show();
});

// Click event for Historical Data of September container
$('#sep-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.sep-content').show();
});

// Click event for Historical Data of October container
$('#oct-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.oct-content').show();
});

// Click event for Historical Data of November container
$('#nov-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.nov-content').show();
});

// Click event for Historical Data of December container
$('#dec-container').click(function() {
  $('.history-months').removeClass('active');
  $(this).find('.history-months').addClass('active');
  $('.history-data-content').hide();
  $('.dec-content').show();
});

// Initial state: Show January history by default
$('#jan-container').click();
});

//bg color changing for warning and critical button
const warningContainer = document.getElementById('warning-container');
const criticalContainer = document.getElementById('critical-container');

warningContainer.addEventListener('click', function() {
  warningContainer.style.backgroundColor = '#00345A'; // Warning color
  criticalContainer.style.backgroundColor = '#000'; // Inactive color
  warningContainer.classList.add('active'); // Add active class for styling
  criticalContainer.classList.remove('active'); // Remove active class
});

criticalContainer.addEventListener('click', function() {
  criticalContainer.style.backgroundColor = '#00345A'; // Critical color
  warningContainer.style.backgroundColor = '#000'; // Inactive color
  criticalContainer.classList.add('active'); // Add active class for styling
  warningContainer.classList.remove('active'); // Remove active class
});

//bg color changing for months of historical button
const january = document.getElementById('jan-container');
const febuary = document.getElementById('feb-container');
const march = document.getElementById('mar-container');
const april = document.getElementById('apr-container');
const may = document.getElementById('may-container');
const june = document.getElementById('jun-container');
const july = document.getElementById('jul-container');
const august = document.getElementById('aug-container');
const september = document.getElementById('sep-container');
const october = document.getElementById('oct-container');
const november = document.getElementById('nov-container');
const december = document.getElementById('dec-container');

january.addEventListener('click', function() {
  january.style.backgroundColor = '#00345A'; // Active month color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  january.classList.add('active'); // Add active class for styling
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

febuary.addEventListener('click', function() {
  febuary.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  febuary.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

march.addEventListener('click', function(){
  march.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  march.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

april.addEventListener('click', function(){
  april.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  april.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

may.addEventListener('click', function(){
  may.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  may.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

june.addEventListener('click', function(){
  june.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  june.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

july.addEventListener('click', function(){
  july.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  july.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

august.addEventListener('click', function(){
  august.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  august.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

september.addEventListener('click', function(){
  september.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  september.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

october.addEventListener('click', function(){
  october.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  october.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

november.addEventListener('click', function(){
  november.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  december.style.backgroundColor = '#000'; // Inactive color

  november.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  december.classList.remove('active'); // Remove active class
});

december.addEventListener('click', function(){
  december.style.backgroundColor = '#00345A'; // Active month color
  january.style.backgroundColor = '#000'; // Inactive color
  febuary.style.backgroundColor = '#000'; // Inactive color
  march.style.backgroundColor = '#000'; // Inactive color
  april.style.backgroundColor = '#000'; // Inactive color
  may.style.backgroundColor = '#000'; // Inactive color
  june.style.backgroundColor = '#000'; // Inactive color
  july.style.backgroundColor = '#000'; // Inactive color
  august.style.backgroundColor = '#000'; // Inactive color
  september.style.backgroundColor = '#000'; // Inactive color
  october.style.backgroundColor = '#000'; // Inactive color
  november.style.backgroundColor = '#000'; // Inactive color

  december.classList.add('active'); // Add active class for styling
  january.classList.remove('active'); // Remove active class
  febuary.classList.remove('active'); // Remove active class
  march.classList.remove('active'); // Remove active class
  april.classList.remove('active'); // Remove active class
  may.classList.remove('active'); // Remove active class
  june.classList.remove('active'); // Remove active class
  july.classList.remove('active'); // Remove active class
  august.classList.remove('active'); // Remove active class
  september.classList.remove('active'); // Remove active class
  october.classList.remove('active'); // Remove active class
  november.classList.remove('active'); // Remove active class
});