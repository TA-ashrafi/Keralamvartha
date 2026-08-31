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
    <!-- TOP BAR - ALL BLACK, SLIMMER, DATE TIME LEFT, SOCIAL RIGHT -->
    <div class="top-bar">
        <div class="container top-bar-inner">
            <div class="top-date-time">
                <i class="fa-regular fa-calendar-days"></i> <?php echo date('l, F j, Y'); ?>
            </div>
            <div class="top-social-icons">
                <?php
                $yt = get_theme_mod('tahseen_ashrafi_youtube', '#');
                $insta = get_theme_mod('tahseen_ashrafi_instagram', '#');
                $tw = get_theme_mod('tahseen_ashrafi_twitter', '#');
                $li = get_theme_mod('tahseen_ashrafi_linkedin', '#');
                $fb = get_theme_mod('tahseen_ashrafi_facebook', '#');
                ?>
                <?php if ($yt) : ?><a href="<?php echo esc_url($yt); ?>" class="social-icon-btn youtube" aria-label="YouTube" target="_blank" rel="noopener"><i class="fa-brands fa-youtube"></i></a><?php endif; ?>
                <?php if ($insta) : ?><a href="<?php echo esc_url($insta); ?>" class="social-icon-btn instagram" aria-label="Instagram" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a><?php endif; ?>
                <?php if ($tw) : ?><a href="<?php echo esc_url($tw); ?>" class="social-icon-btn twitter" aria-label="Twitter" target="_blank" rel="noopener"><i class="fa-brands fa-x-twitter"></i></a><?php endif; ?>
                <?php if ($li) : ?><a href="<?php echo esc_url($li); ?>" class="social-icon-btn linkedin" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a><?php endif; ?>
                <?php if ($fb) : ?><a href="<?php echo esc_url($fb); ?>" class="social-icon-btn facebook" aria-label="Facebook" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a><?php endif; ?>
            </div>
        </div>
    </div>

    <!-- MAIN HEADER - NON STICKY -->
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

    <!-- TRENDING NEWS MARQUEE TICKER -->
    <div class="trending-bar">
        <div class="container trending-inner">
            <span class="trending-badge">TRENDING:</span>
            <div class="marquee-ticker-wrapper">
                <div class="marquee-ticker-content">
                    <?php
                    $latest_posts = get_posts(array(
                        'posts_per_page' => 10,
                        'post_status'    => 'publish',
                    ));
                    if (!empty($latest_posts)) {
                        $marquee_items = array();
                        foreach ($latest_posts as $l_post) {
                            $marquee_items[] = '<a href="' . esc_url(get_permalink($l_post->ID)) . '">' . esc_html(get_the_title($l_post->ID)) . '</a>';
                        }
                        echo implode(' &nbsp;<span class="marquee-pipe">|</span>&nbsp; ', $marquee_items);
                    } else {
                        echo '<span>Welcome to ' . esc_html(get_bloginfo('name')) . ' - Latest headlines & news updates.</span>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
