<?php
/**
 * Widget 5: Grid + List Widget
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

class Tahseen_Ashrafi_Grid_List_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'tahseen_ashrafi_grid_list_widget',
            __('Tahseen Ashrafi - Grid + List Widget', 'tahseen-ashrafi'),
            array(
                'description' => __('Widget 5: Top section 4 equal cards in a row + Bottom section 3-column list style posts.', 'tahseen-ashrafi')
            )
        );
    }

    public function widget($args, $instance) {
        $title          = !empty($instance['title']) ? $instance['title'] : '';
        $category_id    = !empty($instance['category_id']) ? intval($instance['category_id']) : 0;
        $post_count     = !empty($instance['post_count']) ? intval($instance['post_count']) : 7;
        $skip_posts     = !empty($instance['skip_posts']) ? intval($instance['skip_posts']) : 0;
        $order_mode     = !empty($instance['order_mode']) ? $instance['order_mode'] : 'latest';
        $show_view_all  = !empty($instance['show_view_all']);
        $view_all_url   = !empty($instance['view_all_url']) ? $instance['view_all_url'] : '';
        $show_author    = isset($instance['show_author']) ? (bool) $instance['show_author'] : true;
        $show_date      = isset($instance['show_date']) ? (bool) $instance['show_date'] : true;
        $show_views     = isset($instance['show_views']) ? (bool) $instance['show_views'] : true;

        echo $args['before_widget'];

        if (!empty($title)) {
            echo '<div class="widget-section-header">';
            echo '<h3 class="widget-section-title">' . esc_html($title) . '</h3>';
            if ($show_view_all && !empty($view_all_url)) {
                echo '<a href="' . esc_url($view_all_url) . '" class="widget-view-all-btn">' . __('View All', 'tahseen-ashrafi') . ' <i class="fa-solid fa-chevron-right"></i></a>';
            }
            echo '</div>';
        }

        $query_args = array(
            'posts_per_page'      => $post_count,
            'offset'              => $skip_posts,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        );

        if ($order_mode === 'random') {
            $query_args['orderby'] = 'rand';
        } else {
            if ($category_id > 0) {
                $query_args['cat'] = $category_id;
            }
            if ($order_mode === 'most_viewed') {
                $query_args['meta_key'] = 'tahseen_ashrafi_post_views_count';
                $query_args['orderby']  = 'meta_value_num';
                $query_args['order']    = 'DESC';
            } else {
                $query_args['orderby'] = 'date';
                $query_args['order']   = 'DESC';
            }
        }

        $post_query = new WP_Query($query_args);

        if ($post_query->have_posts()) {
            $all_posts  = $post_query->posts;
            $top_posts  = array_slice($all_posts, 0, 4);
            $list_posts = array_slice($all_posts, 4);
            ?>
            <div class="grid-list-widget-container">
                <!-- Top Section: 4 Equal Cards in a Row -->
                <div class="grid-top-4col">
                    <?php foreach ($top_posts as $t_post) :
                        $cat = get_the_category($t_post->ID);
                        $cat_name = !empty($cat) ? $cat[0]->name : '';
                    ?>
                        <div class="top-grid-card">
                            <?php if (has_post_thumbnail($t_post->ID)) : ?>
                                <div class="top-grid-thumb">
                                    <a href="<?php echo esc_url(get_permalink($t_post->ID)); ?>">
                                        <?php echo get_the_post_thumbnail($t_post->ID, 'medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="top-grid-body">
                                <?php if ($cat_name) : ?>
                                    <span class="category-badge"><?php echo esc_html($cat_name); ?></span>
                                <?php endif; ?>
                                <h4 class="top-grid-headline">
                                    <a href="<?php echo esc_url(get_permalink($t_post->ID)); ?>"><?php echo esc_html(get_the_title($t_post->ID)); ?></a>
                                </h4>
                                <?php tahseen_ashrafi_render_post_meta($t_post->ID, $show_author, $show_date, $show_views); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Bottom Section: List Style Posts (3 Columns) -->
                <?php if (!empty($list_posts)) : ?>
                    <div class="list-bottom-3col">
                        <?php foreach ($list_posts as $l_post) :
                            $cat = get_the_category($l_post->ID);
                            $cat_name = !empty($cat) ? $cat[0]->name : '';
                        ?>
                            <div class="bottom-list-card">
                                <?php if (has_post_thumbnail($l_post->ID)) : ?>
                                    <div class="bottom-list-thumb">
                                        <a href="<?php echo esc_url(get_permalink($l_post->ID)); ?>">
                                            <?php echo get_the_post_thumbnail($l_post->ID, 'thumbnail'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="bottom-list-body">
                                    <?php if ($cat_name) : ?>
                                        <span class="category-badge"><?php echo esc_html($cat_name); ?></span>
                                    <?php endif; ?>
                                    <h5 class="bottom-list-headline">
                                        <a href="<?php echo esc_url(get_permalink($l_post->ID)); ?>"><?php echo esc_html(get_the_title($l_post->ID)); ?></a>
                                    </h5>
                                    <?php tahseen_ashrafi_render_post_meta($l_post->ID, $show_author, $show_date, $show_views); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php
            wp_reset_postdata();
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title          = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $category_id    = isset($instance['category_id']) ? intval($instance['category_id']) : 0;
        $post_count     = isset($instance['post_count']) ? intval($instance['post_count']) : 7;
        $skip_posts     = isset($instance['skip_posts']) ? intval($instance['skip_posts']) : 0;
        $order_mode     = isset($instance['order_mode']) ? $instance['order_mode'] : 'latest';
        $show_view_all  = !empty($instance['show_view_all']);
        $view_all_url   = isset($instance['view_all_url']) ? esc_url($instance['view_all_url']) : '';
        $show_author    = isset($instance['show_author']) ? (bool) $instance['show_author'] : true;
        $show_date      = isset($instance['show_date']) ? (bool) $instance['show_date'] : true;
        $show_views     = isset($instance['show_views']) ? (bool) $instance['show_views'] : true;

        $categories = get_categories(array('hide_empty' => false));
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Section Title:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('order_mode'); ?>"><?php _e('Post Order Mode:', 'tahseen-ashrafi'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('order_mode'); ?>" name="<?php echo $this->get_field_name('order_mode'); ?>">
                <option value="latest" <?php selected($order_mode, 'latest'); ?>><?php _e('1 - Latest Post (by category)', 'tahseen-ashrafi'); ?></option>
                <option value="most_viewed" <?php selected($order_mode, 'most_viewed'); ?>><?php _e('2 - Most Viewed (by category)', 'tahseen-ashrafi'); ?></option>
                <option value="random" <?php selected($order_mode, 'random'); ?>><?php _e('3 - Random (Disables category selection)', 'tahseen-ashrafi'); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('category_id'); ?>"><?php _e('Select Category / Menu:', 'tahseen-ashrafi'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('category_id'); ?>" name="<?php echo $this->get_field_name('category_id'); ?>" <?php echo ($order_mode === 'random') ? 'disabled' : ''; ?>>
                <option value="0"><?php _e('-- All Categories --', 'tahseen-ashrafi'); ?></option>
                <?php foreach ($categories as $cat) : ?>
                    <option value="<?php echo $cat->term_id; ?>" <?php selected($category_id, $cat->term_id); ?>><?php echo esc_html($cat->name); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts:', 'tahseen-ashrafi'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" type="number" step="1" min="1" value="<?php echo $post_count; ?>" size="3">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('skip_posts'); ?>"><?php _e('Skip Posts (Offset):', 'tahseen-ashrafi'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('skip_posts'); ?>" name="<?php echo $this->get_field_name('skip_posts'); ?>" type="number" step="1" min="0" value="<?php echo $skip_posts; ?>" size="3">
        </p>
        <p>
            <input type="checkbox" id="<?php echo $this->get_field_id('show_view_all'); ?>" name="<?php echo $this->get_field_name('show_view_all'); ?>" value="1" <?php checked($show_view_all); ?>>
            <label for="<?php echo $this->get_field_id('show_view_all'); ?>"><?php _e('Show View All Button', 'tahseen-ashrafi'); ?></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('view_all_url'); ?>"><?php _e('View All URL:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('view_all_url'); ?>" name="<?php echo $this->get_field_name('view_all_url'); ?>" type="url" value="<?php echo $view_all_url; ?>">
        </p>
        <p>
            <input type="checkbox" id="<?php echo $this->get_field_id('show_author'); ?>" name="<?php echo $this->get_field_name('show_author'); ?>" value="1" <?php checked($show_author); ?>>
            <label for="<?php echo $this->get_field_id('show_author'); ?>"><?php _e('Show Author', 'tahseen-ashrafi'); ?></label>
        </p>
        <p>
            <input type="checkbox" id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" value="1" <?php checked($show_date); ?>>
            <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Show Date & Time', 'tahseen-ashrafi'); ?></label>
        </p>
        <p>
            <input type="checkbox" id="<?php echo $this->get_field_id('show_views'); ?>" name="<?php echo $this->get_field_name('show_views'); ?>" value="1" <?php checked($show_views); ?>>
            <label for="<?php echo $this->get_field_id('show_views'); ?>"><?php _e('Show Views Count', 'tahseen-ashrafi'); ?></label>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title']         = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['category_id']   = !empty($new_instance['category_id']) ? intval($new_instance['category_id']) : 0;
        $instance['post_count']    = !empty($new_instance['post_count']) ? intval($new_instance['post_count']) : 7;
        $instance['skip_posts']    = !empty($new_instance['skip_posts']) ? intval($new_instance['skip_posts']) : 0;
        $instance['order_mode']    = !empty($new_instance['order_mode']) ? sanitize_text_field($new_instance['order_mode']) : 'latest';
        $instance['show_view_all'] = !empty($new_instance['show_view_all']) ? 1 : 0;
        $instance['view_all_url']  = !empty($new_instance['view_all_url']) ? esc_url_raw($new_instance['view_all_url']) : '';
        $instance['show_author']   = !empty($new_instance['show_author']) ? 1 : 0;
        $instance['show_date']     = !empty($new_instance['show_date']) ? 1 : 0;
        $instance['show_views']    = !empty($new_instance['show_views']) ? 1 : 0;
        return $instance;
    }
}
