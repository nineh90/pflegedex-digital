/* =================================================================
   Pflegedex – main.js  (Vanilla JS, kein Framework)
   -----------------------------------------------------------------
   Funktionen:
     1. Mobile-Navigation (Burger-Toggle)
     2. Header-Schatten beim Scrollen
     3. Scroll-Reveal-Animationen
   ================================================================= */
(function () {
    'use strict';

    /* -------------------------------------------------------------
       1. Mobile-Navigation
       ------------------------------------------------------------- */
    var toggle = document.getElementById('navToggle');
    var nav    = document.getElementById('primaryNav');

    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            var isOpen = nav.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            toggle.setAttribute('aria-label', isOpen ? 'Menü schließen' : 'Menü öffnen');
        });

        // Menü schließen, wenn ein Link angeklickt wurde (mobil).
        nav.addEventListener('click', function (e) {
            if (e.target.tagName === 'A' && nav.classList.contains('is-open')) {
                nav.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
                toggle.setAttribute('aria-label', 'Menü öffnen');
            }
        });
    }

    /* -------------------------------------------------------------
       2. Header bekommt beim Scrollen einen Schatten
       ------------------------------------------------------------- */
    var header = document.getElementById('siteHeader');
    if (header) {
        var onScroll = function () {
            if (window.scrollY > 8) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* -------------------------------------------------------------
       3. Scroll-Reveal (Elemente mit .reveal sanft einblenden)
       ------------------------------------------------------------- */
    var revealEls = document.querySelectorAll('.reveal');

    if (revealEls.length && 'IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        revealEls.forEach(function (el) { observer.observe(el); });
    } else {
        // Fallback: ohne IntersectionObserver alles direkt sichtbar.
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    }
})();
