<?php
/**
 * Footer Template
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

$site_name   = get_bloginfo('name');
$footer_logo = get_theme_mod('tahseen_ashrafi_footer_logo', '');
$about_text  = get_theme_mod('tahseen_ashrafi_footer_about_text', 'Welcome to Tahseen Ashrafi News. Delivering latest headlines, trending stories, and in-depth news coverage daily.');
?>

    <footer class="site-footer">
        <div class="container footer-3col-container">
            <!-- Left Column: Separate Footer Logo + About Text -->
            <div class="footer-col footer-col-left">
                <?php if (!empty($footer_logo)) : ?>
                    <div class="footer-logo-wrapper">
                        <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr($site_name); ?>" class="footer-logo-img">
                    </div>
                <?php else : ?>
                    <h3 class="footer-site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($site_name); ?></a></h3>
                <?php endif; ?>
                <p class="footer-about-text">
                    <?php echo esc_html($about_text); ?>
                </p>
            </div>

            <!-- Middle Column: Quick Links Navigation -->
            <div class="footer-col footer-col-middle">
                <h4 class="footer-col-title"><?php _e('Quick Links', 'tahseen-ashrafi'); ?></h4>
                <?php
                if (has_nav_menu('footer-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'menu_class'     => 'footer-quick-links',
                        'container'      => false,
                    ));
                } else {
                    echo '<ul class="footer-quick-links">
                            <li><a href="' . esc_url(home_url('/')) . '">Home</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                          </ul>';
                }
                ?>
            </div>

            <!-- Right Column: Connect With Us + Horizontal Social Icons -->
            <div class="footer-col footer-col-right">
                <h4 class="footer-col-title"><?php _e('Connect With Us', 'tahseen-ashrafi'); ?></h4>
                <div class="footer-social-horizontal">
                    <a href="#" class="social-icon-btn youtube" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="social-icon-btn instagram" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="social-icon-btn twitter" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#" class="social-icon-btn linkedin" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon-btn facebook" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <p class="copyright-text">
                    &copy; 2026 <?php echo esc_html($site_name); ?> &mdash; All Rights Reserved. &nbsp;|&nbsp; Made with <span class="heart-icon"><i class="fa-solid fa-heart"></i></span> by Tahseen Ashrafi
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
