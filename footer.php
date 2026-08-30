<?php
/**
 * Footer Template
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

$copyright_name = get_theme_mod('tahseen_ashrafi_footer_copyright_name', 'Tahseen Ashrafi');
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
                    &copy; <?php echo date('Y'); ?> <?php echo esc_html($copyright_name); ?> made with love <span class="heart-icon"><i class="fa-solid fa-heart"></i></span>
                </p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
