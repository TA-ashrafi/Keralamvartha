<?php
/**
 * Sidebar Widget: Popular Numbered Posts
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

class Tahseen_Ashrafi_Sidebar_Popular_Posts_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'tahseen_ashrafi_sidebar_popular_posts_widget',
            __('Tahseen Ashrafi - Sidebar Popular Numbered Posts', 'tahseen-ashrafi'),
            array(
                'description' => __('Sidebar widget displaying numbered top-viewed posts (1 to 5) with clean vertical typography.', 'tahseen-ashrafi')
            )
        );
    }

    public function widget($args, $instance) {
        $title      = !empty($instance['title']) ? $instance['title'] : __('Popular Stories', 'tahseen-ashrafi');
        $post_count = !empty($instance['post_count']) ? intval($instance['post_count']) : 5;

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        $query_args = array(
            'posts_per_page'      => $post_count,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'meta_key'            => 'tahseen_ashrafi_post_views_count',
            'orderby'             => 'meta_value_num',
            'order'               => 'DESC',
        );

        $post_query = new WP_Query($query_args);

        if ($post_query->have_posts()) {
            echo '<div class="sidebar-numbered-list">';
            $rank = 1;
            while ($post_query->have_posts()) {
                $post_query->the_post();
                ?>
                <div class="sidebar-num-item">
                    <span class="sidebar-num-rank"><?php echo sprintf('%02d', $rank); ?></span>
                    <div class="sidebar-num-content">
                        <h4 class="sidebar-num-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <span class="sidebar-num-views"><i class="fa-regular fa-eye"></i> <?php echo esc_html(tahseen_ashrafi_get_post_views(get_the_ID())); ?></span>
                    </div>
                </div>
                <?php
                $rank++;
            }
            echo '</div>';
            wp_reset_postdata();
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title      = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $post_count = isset($instance['post_count']) ? intval($instance['post_count']) : 5;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts:', 'tahseen-ashrafi'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" type="number" step="1" min="1" max="10" value="<?php echo $post_count; ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title']      = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['post_count'] = !empty($new_instance['post_count']) ? intval($new_instance['post_count']) : 5;
        return $instance;
    }
}
