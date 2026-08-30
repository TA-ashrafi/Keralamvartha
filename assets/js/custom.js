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

    // Sticky Header Handling
    const siteHeader = document.querySelector('.site-header');
    if (siteHeader) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                siteHeader.classList.add('is-sticky');
            } else {
                siteHeader.classList.remove('is-sticky');
            }
        });
    }
});
