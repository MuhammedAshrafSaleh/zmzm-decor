var toggler = document.querySelector('.toggler');
var navList = document.querySelector('.nav__list');
toggler.addEventListener('click', function() {
  toggler.classList.toggle('active');
  navList.classList.toggle('toggle-transform');
});

