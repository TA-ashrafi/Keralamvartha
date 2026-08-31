<?php
/**
 * Sidebar Widget: Vertical Post List
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

class Tahseen_Ashrafi_Sidebar_Vertical_Posts_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'tahseen_ashrafi_sidebar_vertical_posts_widget',
            __('Tahseen Ashrafi - Sidebar Vertical Posts', 'tahseen-ashrafi'),
            array(
                'description' => __('Sidebar widget showing a clean vertical list of posts with uncropped square thumbnails.', 'tahseen-ashrafi')
            )
        );
    }

    public function widget($args, $instance) {
        $title       = !empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'tahseen-ashrafi');
        $category_id = !empty($instance['category_id']) ? intval($instance['category_id']) : 0;
        $post_count  = !empty($instance['post_count']) ? intval($instance['post_count']) : 5;

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        $query_args = array(
            'posts_per_page'      => $post_count,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        );
        if ($category_id > 0) {
            $query_args['cat'] = $category_id;
        }

        $post_query = new WP_Query($query_args);

        if ($post_query->have_posts()) {
            echo '<div class="sidebar-vertical-post-list">';
            while ($post_query->have_posts()) {
                $post_query->the_post();
                ?>
                <div class="sidebar-v-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="sidebar-v-thumb">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="sidebar-v-content">
                        <h4 class="sidebar-v-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <span class="sidebar-v-date"><i class="fa-regular fa-clock"></i> <?php echo get_the_date(); ?></span>
                    </div>
                </div>
                <?php
            }
            echo '</div>';
            wp_reset_postdata();
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title       = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $category_id = isset($instance['category_id']) ? intval($instance['category_id']) : 0;
        $post_count  = isset($instance['post_count']) ? intval($instance['post_count']) : 5;
        $categories  = get_categories(array('hide_empty' => false));
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('category_id'); ?>"><?php _e('Category:', 'tahseen-ashrafi'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('category_id'); ?>" name="<?php echo $this->get_field_name('category_id'); ?>">
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
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title']       = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['category_id'] = !empty($new_instance['category_id']) ? intval($new_instance['category_id']) : 0;
        $instance['post_count']  = !empty($new_instance['post_count']) ? intval($new_instance['post_count']) : 5;
        return $instance;
    }
}
