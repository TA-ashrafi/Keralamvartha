<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-container">
    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="container top-bar-inner">
            <div class="top-nav-area">
                <?php
                if (has_nav_menu('top-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'menu_class'     => 'top-nav',
                        'container'      => false,
                    ));
                } else {
                    echo '<ul class="top-nav"><li><a href="' . esc_url(home_url('/')) . '">Home</a></li></ul>';
                }
                ?>
            </div>
            <div class="top-social-icons">
                <a href="#" class="social-icon-btn youtube" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                <a href="#" class="social-icon-btn instagram" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-icon-btn twitter" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#" class="social-icon-btn linkedin" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#" class="social-icon-btn facebook" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            </div>
        </div>
    </div>

    <!-- MAIN HEADER -->
    <header class="site-header">
        <div class="container header-inner">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php endif; ?>
            </div>

            <nav class="primary-menu-wrapper" aria-label="Primary Navigation">
                <?php
                if (has_nav_menu('primary-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'menu_class'     => 'primary-menu',
                        'container'      => false,
                    ));
                } else {
                    echo '<ul class="primary-menu"><li><a href="' . esc_url(home_url('/')) . '">Home</a></li></ul>';
                }
                ?>
            </nav>

            <div class="header-actions">
                <button class="menu-toggle-btn" aria-label="Toggle Navigation Menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- TRENDING BAR -->
    <div class="trending-bar">
        <div class="container trending-inner">
            <span class="trending-badge">Trending:</span>
            <div class="trending-items">
                <?php
                $trending_posts = get_posts(array(
                    'posts_per_page' => 5,
                    'meta_key'       => 'tahseen_ashrafi_post_views_count',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'DESC'
                ));
                if (!empty($trending_posts)) {
                    foreach ($trending_posts as $t_post) {
                        echo '<a href="' . esc_url(get_permalink($t_post->ID)) . '">' . esc_html(get_the_title($t_post->ID)) . '</a> &nbsp;|&nbsp; ';
                    }
                } else {
                    echo '<span>Welcome to ' . esc_html(get_bloginfo('name')) . ' - Latest updates and news.</span>';
                }
                ?>
            </div>
        </div>
    </div>
