/* ============================================
   ライダースカフェ＆ダイナー 玉の風
   Main JavaScript
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {
  // ---------- Header scroll effect ----------
  const header = document.getElementById('header');
  const heroSection = document.getElementById('hero');

  const handleHeaderScroll = () => {
    if (window.scrollY > 60) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  };

  window.addEventListener('scroll', handleHeaderScroll, { passive: true });
  handleHeaderScroll();

  // ---------- Active nav link on scroll ----------
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link');

  const highlightNav = () => {
    const scrollY = window.scrollY + 120;

    sections.forEach((section) => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute('id');

      if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
        navLinks.forEach((link) => {
          link.classList.remove('active');
          if (link.getAttribute('href') === `#${sectionId}`) {
            link.classList.add('active');
          }
        });
      }
    });
  };

  window.addEventListener('scroll', highlightNav, { passive: true });

  // ---------- Mobile menu ----------
  const menuTrigger = document.getElementById('menu-trigger');
  const modalWindow = document.getElementById('modal-window');
  const mask = document.getElementById('mask');
  const modalLinks = document.querySelectorAll('.modal-nav-link');

  const openMenu = () => {
    header.classList.add('menu-open');
    menuTrigger.classList.add('active');
    menuTrigger.setAttribute('aria-label', 'メニューを閉じる');
    modalWindow.classList.add('open');
    mask.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  const closeMenu = () => {
    header.classList.remove('menu-open');
    menuTrigger.classList.remove('active');
    menuTrigger.setAttribute('aria-label', 'メニューを開く');
    modalWindow.classList.remove('open');
    mask.classList.remove('active');
    document.body.style.overflow = '';
  };

  menuTrigger.addEventListener('click', () => {
    if (modalWindow.classList.contains('open')) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  mask.addEventListener('click', closeMenu);

  modalLinks.forEach((link) => {
    link.addEventListener('click', () => {
      closeMenu();
    });
  });

  // Close on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeMenu();
      closeLightbox();
    }
  });

  // ---------- Smooth scroll for all anchor links ----------
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', (e) => {
      const targetId = anchor.getAttribute('href');
      if (targetId === '#') return;

      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        const headerHeight = header.offsetHeight;
        const targetPosition = target.offsetTop - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth',
        });
      }
    });
  });

  // ---------- Menu slideshow ----------
  const menuSlider = document.getElementById('menu-slider');

  if (menuSlider) {
    const menuTrack = menuSlider.querySelector('.menu-slider-track');
    const menuSlides = Array.from(menuSlider.querySelectorAll('.menu-card'));
    const menuPrev = menuSlider.querySelector('.menu-slider-btn--prev');
    const menuNext = menuSlider.querySelector('.menu-slider-btn--next');
    const menuDots = menuSlider.querySelector('.menu-slider-dots');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let menuCurrentIndex = 0;
    let menuAutoplay = null;
    let menuTouchStartX = 0;

    const getMenuSlidesPerView = () => {
      if (window.innerWidth <= 767) return 1;
      if (window.innerWidth <= 1024) return 2;
      return 3;
    };

    const getMenuMaxIndex = () => Math.max(menuSlides.length - getMenuSlidesPerView(), 0);

    const renderMenuDots = () => {
      const dotCount = getMenuMaxIndex() + 1;
      menuDots.innerHTML = '';

      for (let i = 0; i < dotCount; i++) {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'menu-slider-dot';
        dot.setAttribute('aria-label', `${i + 1}番目のメニュー画像へ`);
        dot.addEventListener('click', () => {
          menuCurrentIndex = i;
          updateMenuSlider();
          restartMenuAutoplay();
        });
        menuDots.appendChild(dot);
      }
    };

    const updateMenuSlider = () => {
      const maxIndex = getMenuMaxIndex();
      menuCurrentIndex = Math.min(Math.max(menuCurrentIndex, 0), maxIndex);

      const slideWidth = menuSlides[0].getBoundingClientRect().width;
      const gap = parseFloat(window.getComputedStyle(menuTrack).gap) || 0;
      menuTrack.style.transform = `translateX(-${menuCurrentIndex * (slideWidth + gap)}px)`;

      menuDots.querySelectorAll('.menu-slider-dot').forEach((dot, index) => {
        dot.classList.toggle('active', index === menuCurrentIndex);
      });
    };

    const showNextMenuSlide = () => {
      const maxIndex = getMenuMaxIndex();
      menuCurrentIndex = menuCurrentIndex >= maxIndex ? 0 : menuCurrentIndex + 1;
      updateMenuSlider();
    };

    const showPrevMenuSlide = () => {
      const maxIndex = getMenuMaxIndex();
      menuCurrentIndex = menuCurrentIndex <= 0 ? maxIndex : menuCurrentIndex - 1;
      updateMenuSlider();
    };

    const stopMenuAutoplay = () => {
      if (menuAutoplay) {
        clearInterval(menuAutoplay);
        menuAutoplay = null;
      }
    };

    const startMenuAutoplay = () => {
      if (prefersReducedMotion) return;
      stopMenuAutoplay();
      menuAutoplay = setInterval(() => {
        if (document.visibilityState === 'visible') {
          showNextMenuSlide();
        }
      }, 3500);
    };

    const restartMenuAutoplay = () => {
      stopMenuAutoplay();
      startMenuAutoplay();
    };

    menuPrev.addEventListener('click', () => {
      showPrevMenuSlide();
      restartMenuAutoplay();
    });

    menuNext.addEventListener('click', () => {
      showNextMenuSlide();
      restartMenuAutoplay();
    });

    menuSlider.addEventListener('mouseenter', stopMenuAutoplay);
    menuSlider.addEventListener('mouseleave', startMenuAutoplay);
    menuSlider.addEventListener('focusin', stopMenuAutoplay);
    menuSlider.addEventListener('focusout', startMenuAutoplay);

    menuSlider.addEventListener('touchstart', (e) => {
      menuTouchStartX = e.changedTouches[0].screenX;
      stopMenuAutoplay();
    }, { passive: true });

    menuSlider.addEventListener('touchend', (e) => {
      const diff = menuTouchStartX - e.changedTouches[0].screenX;

      if (Math.abs(diff) > 50) {
        if (diff > 0) {
          showNextMenuSlide();
        } else {
          showPrevMenuSlide();
        }
      }
      startMenuAutoplay();
    }, { passive: true });

    window.addEventListener('resize', () => {
      renderMenuDots();
      updateMenuSlider();
    });

    renderMenuDots();
    updateMenuSlider();
    startMenuAutoplay();
  }

  // ---------- Scroll animations (Intersection Observer) ----------
  const animateElements = document.querySelectorAll('.animate-on-scroll, .fade-in');

  const observerOptions = {
    root: null,
    rootMargin: '0px 0px -60px 0px',
    threshold: 0.1,
  };

  const animateObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        animateObserver.unobserve(entry.target);
      }
    });
  }, observerOptions);

  animateElements.forEach((el) => {
    animateObserver.observe(el);
  });

  // ---------- Fire particles in hero ----------
  const particlesContainer = document.getElementById('hero-particles');

  const createParticle = () => {
    const particle = document.createElement('div');
    particle.classList.add('particle');

    const startX = Math.random() * 100;
    const size = Math.random() * 4 + 2;
    const duration = Math.random() * 6 + 4;
    const delay = Math.random() * 4;
    const drift = (Math.random() - 0.5) * 100;

    particle.style.left = `${startX}%`;
    particle.style.bottom = '-10px';
    particle.style.width = `${size}px`;
    particle.style.height = `${size}px`;
    particle.style.setProperty('--drift', `${drift}px`);
    particle.style.animationDuration = `${duration}s`;
    particle.style.animationDelay = `${delay}s`;

    // Vary particle color between orange and gold
    const colors = [
      'rgba(232, 101, 43, 0.9)',
      'rgba(255, 122, 61, 0.8)',
      'rgba(212, 168, 87, 0.7)',
      'rgba(255, 180, 80, 0.6)',
    ];
    const color = colors[Math.floor(Math.random() * colors.length)];
    particle.style.background = color;
    particle.style.boxShadow = `0 0 ${size * 2}px ${color}`;

    particlesContainer.appendChild(particle);

    // Remove after animation completes
    setTimeout(() => {
      if (particle.parentNode) {
        particle.parentNode.removeChild(particle);
      }
    }, (duration + delay) * 1000);
  };

  // Generate initial batch of particles
  for (let i = 0; i < 20; i++) {
    createParticle();
  }

  // Continuously generate new particles
  setInterval(() => {
    if (document.visibilityState === 'visible') {
      createParticle();
    }
  }, 600);

  // ---------- Gallery slideshow ----------
  const gallerySlider = document.getElementById('gallery-slider');
  const galleryItems = document.querySelectorAll('.gallery-item');
  let startGalleryAutoplay = () => {};
  let stopGalleryAutoplay = () => {};

  if (gallerySlider) {
    const galleryTrack = gallerySlider.querySelector('.gallery-slider-track');
    const gallerySlides = Array.from(galleryItems);
    const galleryPrevBtn = gallerySlider.querySelector('.gallery-slider-btn--prev');
    const galleryNextBtn = gallerySlider.querySelector('.gallery-slider-btn--next');
    const galleryDots = gallerySlider.querySelector('.gallery-slider-dots');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let galleryCurrentIndex = 0;
    let galleryAutoplay = null;
    let galleryTouchStartX = 0;

    const getGallerySlidesPerView = () => {
      if (window.innerWidth <= 767) return 1;
      if (window.innerWidth <= 1024) return 2;
      return 3;
    };

    const getGalleryMaxIndex = () => Math.max(gallerySlides.length - getGallerySlidesPerView(), 0);

    const renderGalleryDots = () => {
      const dotCount = getGalleryMaxIndex() + 1;
      galleryDots.innerHTML = '';

      for (let i = 0; i < dotCount; i++) {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'gallery-slider-dot';
        dot.setAttribute('aria-label', `${i + 1}番目のギャラリー画像へ`);
        dot.addEventListener('click', () => {
          galleryCurrentIndex = i;
          updateGallerySlider();
          restartGalleryAutoplay();
        });
        galleryDots.appendChild(dot);
      }
    };

    const updateGallerySlider = () => {
      const maxIndex = getGalleryMaxIndex();
      galleryCurrentIndex = Math.min(Math.max(galleryCurrentIndex, 0), maxIndex);

      const slideWidth = gallerySlides[0].getBoundingClientRect().width;
      const gap = parseFloat(window.getComputedStyle(galleryTrack).gap) || 0;
      galleryTrack.style.transform = `translateX(-${galleryCurrentIndex * (slideWidth + gap)}px)`;

      galleryDots.querySelectorAll('.gallery-slider-dot').forEach((dot, index) => {
        dot.classList.toggle('active', index === galleryCurrentIndex);
      });
    };

    const showNextGallerySlide = () => {
      const maxIndex = getGalleryMaxIndex();
      galleryCurrentIndex = galleryCurrentIndex >= maxIndex ? 0 : galleryCurrentIndex + 1;
      updateGallerySlider();
    };

    const showPrevGallerySlide = () => {
      const maxIndex = getGalleryMaxIndex();
      galleryCurrentIndex = galleryCurrentIndex <= 0 ? maxIndex : galleryCurrentIndex - 1;
      updateGallerySlider();
    };

    stopGalleryAutoplay = () => {
      if (galleryAutoplay) {
        clearInterval(galleryAutoplay);
        galleryAutoplay = null;
      }
    };

    startGalleryAutoplay = () => {
      if (prefersReducedMotion) return;
      stopGalleryAutoplay();
      galleryAutoplay = setInterval(() => {
        if (document.visibilityState === 'visible') {
          showNextGallerySlide();
        }
      }, 4000);
    };

    const restartGalleryAutoplay = () => {
      stopGalleryAutoplay();
      startGalleryAutoplay();
    };

    galleryPrevBtn.addEventListener('click', () => {
      showPrevGallerySlide();
      restartGalleryAutoplay();
    });

    galleryNextBtn.addEventListener('click', () => {
      showNextGallerySlide();
      restartGalleryAutoplay();
    });

    gallerySlider.addEventListener('mouseenter', stopGalleryAutoplay);
    gallerySlider.addEventListener('mouseleave', startGalleryAutoplay);
    gallerySlider.addEventListener('focusin', stopGalleryAutoplay);
    gallerySlider.addEventListener('focusout', startGalleryAutoplay);

    gallerySlider.addEventListener('touchstart', (e) => {
      galleryTouchStartX = e.changedTouches[0].screenX;
      stopGalleryAutoplay();
    }, { passive: true });

    gallerySlider.addEventListener('touchend', (e) => {
      const diff = galleryTouchStartX - e.changedTouches[0].screenX;

      if (Math.abs(diff) > 50) {
        if (diff > 0) {
          showNextGallerySlide();
        } else {
          showPrevGallerySlide();
        }
      }
      startGalleryAutoplay();
    }, { passive: true });

    window.addEventListener('resize', () => {
      renderGalleryDots();
      updateGallerySlider();
    });

    renderGalleryDots();
    updateGallerySlider();
    startGalleryAutoplay();
  }

  // ---------- Gallery Lightbox ----------
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const lightboxClose = document.getElementById('lightbox-close');
  const lightboxPrev = document.getElementById('lightbox-prev');
  const lightboxNext = document.getElementById('lightbox-next');

  let currentIndex = 0;
  const gallerySources = [];

  galleryItems.forEach((item, index) => {
    const src = item.getAttribute('data-src');
    if (src) gallerySources.push(src);

    item.addEventListener('click', () => {
      currentIndex = index;
      openLightbox(src);
    });
  });

  const openLightbox = (src) => {
    stopGalleryAutoplay();
    lightboxImg.src = src;
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  const closeLightbox = () => {
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
    setTimeout(() => {
      lightboxImg.src = '';
    }, 400);
    startGalleryAutoplay();
  };

  const showPrevImage = () => {
    currentIndex = (currentIndex - 1 + gallerySources.length) % gallerySources.length;
    lightboxImg.src = gallerySources[currentIndex];
  };

  const showNextImage = () => {
    currentIndex = (currentIndex + 1) % gallerySources.length;
    lightboxImg.src = gallerySources[currentIndex];
  };

  lightboxClose.addEventListener('click', closeLightbox);
  lightboxPrev.addEventListener('click', showPrevImage);
  lightboxNext.addEventListener('click', showNextImage);

  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox || e.target === lightbox.querySelector('.lightbox-content')) {
      closeLightbox();
    }
  });

  // Keyboard navigation for lightbox
  document.addEventListener('keydown', (e) => {
    if (!lightbox.classList.contains('active')) return;

    if (e.key === 'ArrowLeft') showPrevImage();
    if (e.key === 'ArrowRight') showNextImage();
  });

  // Touch/swipe support for lightbox
  let touchStartX = 0;
  let touchEndX = 0;

  lightbox.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
  }, { passive: true });

  lightbox.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    const diff = touchStartX - touchEndX;

    if (Math.abs(diff) > 50) {
      if (diff > 0) {
        showNextImage();
      } else {
        showPrevImage();
      }
    }
  }, { passive: true });
});
