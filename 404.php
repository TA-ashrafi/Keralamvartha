<?php
/**
 * 404 Not Found Template
 *
 * @package Tahseen_Ashrafi
 */

get_header();
?>

<main class="main-content-area container">
    <div class="site-main-grid no-sidebar">
        <div class="primary-content" style="text-align: center; padding: 60px 20px;">
            <h1 style="font-size: 80px; font-weight: 900; color: var(--primary-color);">404</h1>
            <h2 style="font-size: 24px; margin-bottom: 20px;"><?php _e('Oops! Page Not Found', 'tahseen-ashrafi'); ?></h2>
            <p style="margin-bottom: 30px;"><?php _e('The page you are looking for might have been removed or is temporarily unavailable.', 'tahseen-ashrafi'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="pagination-btn"><?php _e('Return to Homepage', 'tahseen-ashrafi'); ?></a>
        </div>
    </div>
</main>

<?php
get_footer();
