<?php
/**
 * Footer Template
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

$site_name = get_bloginfo('name');
?>

    <footer class="site-footer">
        <div class="container">
            <?php if (is_active_sidebar('footer-widgets')) : ?>
                <div class="footer-widgets-grid">
                    <?php dynamic_sidebar('footer-widgets'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <p class="copyright-text">
                    &copy; <?php echo date('Y'); ?> <?php echo esc_html($site_name); ?> &mdash; All Rights Reserved. &nbsp;|&nbsp; Made with <span class="heart-icon"><i class="fa-solid fa-heart"></i></span> by Tahseen Ashrafi
                </p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<!-- BACK TO TOP BUTTON -->
<button class="back-to-top-btn" aria-label="Back to top">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>
