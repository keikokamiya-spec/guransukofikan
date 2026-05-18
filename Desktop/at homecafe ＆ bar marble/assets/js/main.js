// Init: smooth scroll & nav close on link click
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', () => {
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (!target) return;
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
      });
    });

    // Close hamburger menu on nav link click
    const toggle = document.getElementById('menu-toggle');
    document.querySelectorAll('.nav-links a').forEach((link) => {
      link.addEventListener('click', () => {
        if (toggle) toggle.checked = false;
      });
    });
  });
})();
