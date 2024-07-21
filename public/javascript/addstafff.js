const toggleButton = document.getElementById('toggle-nav');
  const navBar = document.getElementById('nav-bar');
  const logoutIcon = document.querySelector('#logout-btn .material-icons');

  toggleButton.addEventListener('click', () => {
      navBar.classList.toggle('hidden-nav');
      navBar.classList.toggle('visible-nav');
      const spans = document.querySelectorAll('#nav-bar span:nth-child(2)');
       spans.forEach(span => span.classList.toggle('lg:hidden'));
       logoutIcon.classList.toggle('hidden');
  });
  