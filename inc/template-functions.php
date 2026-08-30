<?php
/**
 * Template Helper Functions and SEO Microdata
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Track and update post views count
 */
function tahseen_ashrafi_set_post_views($post_id) {
    $count_key = 'tahseen_ashrafi_post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '1');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

/**
 * Get post views count
 */
function tahseen_ashrafi_get_post_views($post_id) {
    $count_key = 'tahseen_ashrafi_post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        return '0 Views';
    }
    return number_format($count) . ' Views';
}

/**
 * Non-Numeric (Prev/Next) Pagination Function
 */
function tahseen_ashrafi_pagination() {
    echo '<nav class="pagination-container" aria-label="Posts navigation">';
    echo '<div class="pagination-prev">';
    previous_posts_link('<i class="fa-solid fa-arrow-left"></i> Previous');
    echo '</div>';
    echo '<div class="pagination-next">';
    next_posts_link('Next <i class="fa-solid fa-arrow-right"></i>');
    echo '</div>';
    echo '</nav>';
}

/**
 * Render Post Meta Elements based on widget toggles
 */
function tahseen_ashrafi_render_post_meta($post_id, $show_author = true, $show_date = true, $show_views = true) {
    echo '<div class="post-meta-items">';

    if ($show_author) {
        $author_id = get_post_field('post_author', $post_id);
        $author_name = get_the_author_meta('display_name', $author_id);
        $avatar_url = get_avatar_url($author_id, array('size' => 40));
        echo '<span class="post-meta-item meta-author">';
        echo '<img src="' . esc_url($avatar_url) . '" alt="' . esc_attr($author_name) . '" class="meta-author-avatar">';
        echo '<span>' . esc_html($author_name) . '</span>';
        echo '</span>';
    }

    if ($show_date) {
        echo '<span class="post-meta-item meta-date">';
        echo '<i class="fa-regular fa-clock"></i> ';
        echo esc_html(get_the_date('', $post_id));
        echo '</span>';
    }

    if ($show_views) {
        echo '<span class="post-meta-item meta-views">';
        echo '<i class="fa-regular fa-eye"></i> ';
        echo esc_html(tahseen_ashrafi_get_post_views($post_id));
        echo '</span>';
    }

    echo '</div>';
}

/**
 * Render Single Post Author Bio Box
 */
function tahseen_ashrafi_author_bio_box() {
    $author_id = get_the_author_meta('ID');
    $author_name = get_the_author_meta('display_name');
    $author_bio = get_the_author_meta('description');
    $avatar_url = get_avatar_url($author_id, array('size' => 160));

    if (empty($author_bio)) {
        $author_bio = __('Author bio has not been added yet.', 'tahseen-ashrafi');
    }
    ?>
    <div class="author-box" itemprop="author" itemscope itemtype="https://schema.org/Person">
        <div class="author-avatar">
            <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_attr($author_name); ?>" itemprop="image">
        </div>
        <div class="author-details">
            <h4 itemprop="name"><?php echo esc_html($author_name); ?></h4>
            <p class="author-bio" itemprop="description"><?php echo esc_html($author_bio); ?></p>
        </div>
    </div>
    <?php
}
