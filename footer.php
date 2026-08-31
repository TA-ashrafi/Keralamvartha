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
            <div class="footer-columns-3">
                <!-- Column 1: Logo & About Content -->
                <div class="footer-col footer-col-branding">
                    <?php
                    $footer_logo_url = get_theme_mod('tahseen_ashrafi_footer_logo', '');
                    $footer_about    = get_theme_mod('tahseen_ashrafi_footer_about_text', 'Welcome to our news portal for the latest updates, breaking news, and viral content across all categories.');
                    ?>
                    <div class="footer-logo-wrapper">
                        <?php if (!empty($footer_logo_url)) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr($site_name); ?>" class="footer-logo-img">
                            </a>
                        <?php elseif (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <h3 class="footer-site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($site_name); ?></a></h3>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($footer_about)) : ?>
                        <p class="footer-about-text"><?php echo esc_html($footer_about); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Column 2: Quick Links Menu -->
                <div class="footer-col footer-col-links">
                    <h3 class="footer-col-title"><?php _e('Quick Links', 'tahseen-ashrafi'); ?></h3>
                    <?php
                    if (has_nav_menu('footer-menu')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
                            'menu_class'     => 'footer-quick-links',
                            'container'      => false,
                        ));
                    } elseif (has_nav_menu('primary-menu')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'menu_class'     => 'footer-quick-links',
                            'container'      => false,
                        ));
                    } else {
                        echo '<ul class="footer-quick-links"><li><a href="' . esc_url(home_url('/')) . '">Home</a></li></ul>';
                    }
                    ?>
                </div>

                <!-- Column 3: Connect With Us & Social Icons -->
                <div class="footer-col footer-col-connect">
                    <h3 class="footer-col-title"><?php _e('Connect With Us', 'tahseen-ashrafi'); ?></h3>
                    <p class="footer-social-desc"><?php _e('Follow us on our social media platforms to stay updated.', 'tahseen-ashrafi'); ?></p>
                    <div class="footer-social-icons-horizontal">
                        <?php
                        $yt = get_theme_mod('tahseen_ashrafi_youtube', '#');
                        $insta = get_theme_mod('tahseen_ashrafi_instagram', '#');
                        $tw = get_theme_mod('tahseen_ashrafi_twitter', '#');
                        $li = get_theme_mod('tahseen_ashrafi_linkedin', '#');
                        $fb = get_theme_mod('tahseen_ashrafi_facebook', '#');
                        ?>
                        <?php if ($yt) : ?><a href="<?php echo esc_url($yt); ?>" class="social-icon-btn youtube" aria-label="YouTube" target="_blank" rel="noopener"><i class="fa-brands fa-youtube"></i></a><?php endif; ?>
                        <?php if ($insta) : ?><a href="<?php echo esc_url($insta); ?>" class="social-icon-btn instagram" aria-label="Instagram" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a><?php endif; ?>
                        <?php if ($tw) : ?><a href="<?php echo esc_url($tw); ?>" class="social-icon-btn twitter" aria-label="Twitter" target="_blank" rel="noopener"><i class="fa-brands fa-x-twitter"></i></a><?php endif; ?>
                        <?php if ($li) : ?><a href="<?php echo esc_url($li); ?>" class="social-icon-btn linkedin" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a><?php endif; ?>
                        <?php if ($fb) : ?><a href="<?php echo esc_url($fb); ?>" class="social-icon-btn facebook" aria-label="Facebook" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a><?php endif; ?>
                    </div>
                </div>
            </div>
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
