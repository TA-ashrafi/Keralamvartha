<?php
/**
 * Social Media Links Widget
 *
 * @package Tahseen_Ashrafi
 */

if (!defined('ABSPATH')) {
    exit;
}

class Tahseen_Ashrafi_Social_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'tahseen_ashrafi_social_widget',
            __('Tahseen Ashrafi - Social Media Links', 'tahseen-ashrafi'),
            array(
                'description' => __('Display social media profiles for YouTube, Instagram, Twitter, LinkedIn, and Facebook.', 'tahseen-ashrafi')
            )
        );
    }

    public function widget($args, $instance) {
        $title     = !empty($instance['title']) ? $instance['title'] : __('Follow Us', 'tahseen-ashrafi');
        $youtube   = !empty($instance['youtube']) ? $instance['youtube'] : '';
        $instagram = !empty($instance['instagram']) ? $instance['instagram'] : '';
        $twitter   = !empty($instance['twitter']) ? $instance['twitter'] : '';
        $linkedin  = !empty($instance['linkedin']) ? $instance['linkedin'] : '';
        $facebook  = !empty($instance['facebook']) ? $instance['facebook'] : '';

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }
        echo '<div class="social-widget-list">';

        if (!empty($youtube)) {
            echo '<a href="' . esc_url($youtube) . '" target="_blank" rel="noopener noreferrer" class="social-widget-item youtube">';
            echo '<span><i class="fa-brands fa-youtube"></i> YouTube</span><i class="fa-solid fa-arrow-right"></i>';
            echo '</a>';
        }

        if (!empty($instagram)) {
            echo '<a href="' . esc_url($instagram) . '" target="_blank" rel="noopener noreferrer" class="social-widget-item instagram">';
            echo '<span><i class="fa-brands fa-instagram"></i> Instagram</span><i class="fa-solid fa-arrow-right"></i>';
            echo '</a>';
        }

        if (!empty($twitter)) {
            echo '<a href="' . esc_url($twitter) . '" target="_blank" rel="noopener noreferrer" class="social-widget-item twitter">';
            echo '<span><i class="fa-brands fa-x-twitter"></i> Twitter / X</span><i class="fa-solid fa-arrow-right"></i>';
            echo '</a>';
        }

        if (!empty($linkedin)) {
            echo '<a href="' . esc_url($linkedin) . '" target="_blank" rel="noopener noreferrer" class="social-widget-item linkedin">';
            echo '<span><i class="fa-brands fa-linkedin-in"></i> LinkedIn</span><i class="fa-solid fa-arrow-right"></i>';
            echo '</a>';
        }

        if (!empty($facebook)) {
            echo '<a href="' . esc_url($facebook) . '" target="_blank" rel="noopener noreferrer" class="social-widget-item facebook">';
            echo '<span><i class="fa-brands fa-facebook-f"></i> Facebook</span><i class="fa-solid fa-arrow-right"></i>';
            echo '</a>';
        }

        echo '</div>';
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $youtube   = isset($instance['youtube']) ? esc_attr($instance['youtube']) : '';
        $instagram = isset($instance['instagram']) ? esc_attr($instance['instagram']) : '';
        $twitter   = isset($instance['twitter']) ? esc_attr($instance['twitter']) : '';
        $linkedin  = isset($instance['linkedin']) ? esc_attr($instance['linkedin']) : '';
        $facebook  = isset($instance['facebook']) ? esc_attr($instance['facebook']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube URL:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="url" value="<?php echo $youtube; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="url" value="<?php echo $instagram; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter / X URL:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="url" value="<?php echo $twitter; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn URL:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="url" value="<?php echo $linkedin; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:', 'tahseen-ashrafi'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="url" value="<?php echo $facebook; ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title']     = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['youtube']   = !empty($new_instance['youtube']) ? esc_url_raw($new_instance['youtube']) : '';
        $instance['instagram'] = !empty($new_instance['instagram']) ? esc_url_raw($new_instance['instagram']) : '';
        $instance['twitter']   = !empty($new_instance['twitter']) ? esc_url_raw($new_instance['twitter']) : '';
        $instance['linkedin']  = !empty($new_instance['linkedin']) ? esc_url_raw($new_instance['linkedin']) : '';
        $instance['facebook']  = !empty($new_instance['facebook']) ? esc_url_raw($new_instance['facebook']) : '';
        return $instance;
    }
}
