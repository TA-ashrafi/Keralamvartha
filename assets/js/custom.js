/**
 * Custom JavaScript for Tahseen Ashrafi News Theme
 */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle-btn');
    const primaryMenu = document.querySelector('.primary-menu');

    if (menuToggle && primaryMenu) {
        menuToggle.addEventListener('click', function() {
            primaryMenu.classList.toggle('is-active');
            const isExpanded = primaryMenu.classList.contains('is-active');
            menuToggle.setAttribute('aria-expanded', isExpanded);
        });
    }

    // Sticky Header Handling removed per user request so header scrolls normally with page

    // Back to Top Button Functionality (both footer bottom button & fixed button if present)
    const backToTopBtns = document.querySelectorAll('.back-to-top-btn, .back-to-top-footer-btn');
    backToTopBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
});
