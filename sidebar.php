<?php
/**
 * Sidebar Template
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

// Check metabox sidebar toggle for single post or page
if (is_singular()) {
    $sidebar_setting = get_post_meta(get_the_ID(), '_tahseen_ashrafi_enable_sidebar', true);
    if ($sidebar_setting === 'disable') {
        return; // Sidebar disabled via metabox
    }
}
?>

<aside class="sidebar-area" aria-label="Sidebar Widgets">
    <?php
    if (is_active_sidebar('sidebar-primary')) {
        dynamic_sidebar('sidebar-primary');
    } elseif (is_active_sidebar('sidebar-secondary')) {
        dynamic_sidebar('sidebar-secondary');
    } else {
        // Fallback default widgets
        the_widget('Tahseen_Ashrafi_Social_Widget', array(
            'title'     => 'Connect With Us',
            'youtube'   => 'https://youtube.com',
            'instagram' => 'https://instagram.com',
            'twitter'   => 'https://twitter.com',
            'linkedin'  => 'https://linkedin.com',
            'facebook'  => 'https://facebook.com',
        ));
    }
    ?>
</aside>
