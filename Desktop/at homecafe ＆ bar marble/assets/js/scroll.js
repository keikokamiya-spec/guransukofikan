// Header scroll & page-top button
(function () {
  'use strict';

  const header = document.getElementById('main-header');
  const pageTop = document.getElementById('page-top');

  function onScroll() {
    const y = window.scrollY;

    if (header) {
      header.classList.toggle('scrolled', y > 50);
    }
    if (pageTop) {
      pageTop.classList.toggle('visible', y > 400);
    }
  }

  window.addEventListener('scroll', onScroll, { passive: true });

  pageTop?.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
})();
