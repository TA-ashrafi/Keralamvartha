<?php
/**
 * Single Post Sidebar Toggle Metabox
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

function tahseen_ashrafi_add_sidebar_metabox() {
    add_meta_box(
        'tahseen_ashrafi_sidebar_settings',
        __('Sidebar Options', 'tahseen-ashrafi'),
        'tahseen_ashrafi_sidebar_metabox_callback',
        array('post', 'page'),
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'tahseen_ashrafi_add_sidebar_metabox');

function tahseen_ashrafi_sidebar_metabox_callback($post) {
    wp_nonce_field('tahseen_ashrafi_sidebar_nonce_action', 'tahseen_ashrafi_sidebar_nonce');
    $value = get_post_meta($post->ID, '_tahseen_ashrafi_enable_sidebar', true);
    if ($value === '') {
        $value = 'enable'; // Default enabled
    }
    ?>
    <p>
        <label for="tahseen_ashrafi_enable_sidebar"><strong><?php _e('Enable Sidebar:', 'tahseen-ashrafi'); ?></strong></label>
        <select name="tahseen_ashrafi_enable_sidebar" id="tahseen_ashrafi_enable_sidebar" class="widefat">
            <option value="enable" <?php selected($value, 'enable'); ?>><?php _e('Enable Sidebar', 'tahseen-ashrafi'); ?></option>
            <option value="disable" <?php selected($value, 'disable'); ?>><?php _e('Disable Sidebar (Full Width)', 'tahseen-ashrafi'); ?></option>
        </select>
    </p>
    <?php
}

function tahseen_ashrafi_save_sidebar_metabox($post_id) {
    if (!isset($_POST['tahseen_ashrafi_sidebar_nonce']) || !wp_verify_nonce($_POST['tahseen_ashrafi_sidebar_nonce'], 'tahseen_ashrafi_sidebar_nonce_action')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['tahseen_ashrafi_enable_sidebar'])) {
        update_post_meta($post_id, '_tahseen_ashrafi_enable_sidebar', sanitize_text_field($_POST['tahseen_ashrafi_enable_sidebar']));
    }
}
add_action('save_post', 'tahseen_ashrafi_save_sidebar_metabox');
