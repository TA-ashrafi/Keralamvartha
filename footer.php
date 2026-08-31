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
            <div class="footer-columns-4">
                <!-- Column 1: Logo in Large White Rounded Rectangle Container -->
                <div class="footer-col footer-col-logo">
                    <div class="footer-logo-container">
                        <?php
                        $footer_logo_url = get_theme_mod('tahseen_ashrafi_footer_logo', '');
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo-link">
                            <?php if (!empty($footer_logo_url)) : ?>
                                <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr($site_name); ?>" class="footer-logo-img">
                            <?php elseif (has_custom_logo()) : ?>
                                <?php the_custom_logo(); ?>
                            <?php else : ?>
                                <h3 class="footer-site-title"><?php echo esc_html($site_name); ?></h3>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>

                <!-- Column 2: About Us -->
                <div class="footer-col footer-col-about">
                    <?php
                    $about_title = get_theme_mod('tahseen_ashrafi_footer_about_title', 'About Us Content');
                    $about_text  = get_theme_mod('tahseen_ashrafi_footer_about_text', 'Welcome to our news portal for the latest updates, breaking news, and viral content across all categories.');
                    ?>
                    <h3 class="footer-col-title"><?php echo esc_html($about_title); ?></h3>
                    <p class="footer-about-text"><?php echo esc_html($about_text); ?></p>
                </div>

                <!-- Column 3: Quick Links + Legal (Side by Side) -->
                <div class="footer-col footer-col-links-legal">
                    <div class="footer-nav-group">
                        <h3 class="footer-col-title"><?php _e('Quick Links', 'tahseen-ashrafi'); ?></h3>
                        <?php
                        if (has_nav_menu('footer-menu')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'menu_class'     => 'footer-links-list',
                                'container'      => false,
                            ));
                        } else {
                            echo '<ul class="footer-links-list">
                                <li><a href="' . esc_url(home_url('/')) . '">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Disclaimer</a></li>
                            </ul>';
                        }
                        ?>
                    </div>
                    <div class="footer-nav-group">
                        <h3 class="footer-col-title"><?php _e('Legal', 'tahseen-ashrafi'); ?></h3>
                        <?php
                        if (has_nav_menu('legal-menu')) {
                            wp_nav_menu(array(
                                'theme_location' => 'legal-menu',
                                'menu_class'     => 'footer-links-list',
                                'container'      => false,
                            ));
                        } else {
                            echo '<ul class="footer-links-list">
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Column 4: Follow Us (Stacked Buttons) -->
                <div class="footer-col footer-col-follow">
                    <h3 class="footer-col-title"><?php _e('FOLLOW US', 'tahseen-ashrafi'); ?></h3>
                    <div class="footer-social-stacked">
                        <?php
                        $fb    = get_theme_mod('tahseen_ashrafi_facebook', '#');
                        $insta = get_theme_mod('tahseen_ashrafi_instagram', '#');
                        $yt    = get_theme_mod('tahseen_ashrafi_youtube', '#');
                        $tw    = get_theme_mod('tahseen_ashrafi_twitter', '#');
                        ?>
                        <?php if ($fb) : ?>
                            <a href="<?php echo esc_url($fb); ?>" class="social-btn-stacked facebook" target="_blank" rel="noopener">
                                <i class="fa-brands fa-facebook-f"></i> <span>Facebook</span>
                            </a>
                        <?php endif; ?>
                        <?php if ($insta) : ?>
                            <a href="<?php echo esc_url($insta); ?>" class="social-btn-stacked instagram" target="_blank" rel="noopener">
                                <i class="fa-brands fa-instagram"></i> <span>Instagram</span>
                            </a>
                        <?php endif; ?>
                        <?php if ($yt) : ?>
                            <a href="<?php echo esc_url($yt); ?>" class="social-btn-stacked youtube" target="_blank" rel="noopener">
                                <i class="fa-brands fa-youtube"></i> <span>YouTube</span>
                            </a>
                        <?php endif; ?>
                        <?php if ($tw) : ?>
                            <a href="<?php echo esc_url($tw); ?>" class="social-btn-stacked twitter" target="_blank" rel="noopener">
                                <i class="fa-brands fa-x-twitter"></i> <span>X (Twitter)</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container footer-bottom-inner">
                <p class="copyright-text">
                    &copy; 2026 <?php echo esc_html($site_name); ?> &mdash; All Rights Reserved. &nbsp;|&nbsp; Made with <span class="heart-icon"><i class="fa-solid fa-heart"></i></span> by Tahseen Ashrafi
                </p>
                <button class="back-to-top-footer-btn" aria-label="Back to top">
                    <i class="fa-solid fa-arrow-up"></i>
                </button>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
