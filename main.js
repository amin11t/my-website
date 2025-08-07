// Mobile menu functionality
const hamburger = document.getElementById('hamburger-menu');
const mobileNav = document.getElementById('mobile-nav');
const overlay = document.getElementById('mobile-nav-overlay');

hamburger.addEventListener('click', function() {
  this.classList.toggle('active');
  mobileNav.classList.toggle('active');
  overlay.style.display = mobileNav.classList.contains('active') ? 'block' : 'none';
  document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
});

overlay.addEventListener('click', function() {
  hamburger.classList.remove('active');
  mobileNav.classList.remove('active');
  this.style.display = 'none';
  document.body.style.overflow = '';
});

// Close mobile menu when clicking on a link
const navLinks = document.querySelectorAll('.mobile-nav a');
navLinks.forEach(link => {
  link.addEventListener('click', function() {
    hamburger.classList.remove('active');
    mobileNav.classList.remove('active');
    overlay.style.display = 'none';
    document.body.style.overflow = '';
  });
}); 