<?php
/**
 * Page Template
 *
 * @package Tahseen_Ashrafi
 */

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        $global_single_sidebar = get_theme_mod('tahseen_ashrafi_enable_single_sidebar', false);
        $meta_sidebar = get_post_meta(get_the_ID(), '_tahseen_ashrafi_enable_sidebar', true);
        if ($meta_sidebar === 'enable') {
            $has_sidebar = true;
        } elseif ($meta_sidebar === 'disable') {
            $has_sidebar = false;
        } else {
            $has_sidebar = $global_single_sidebar;
        }
        $grid_class = $has_sidebar ? 'site-main-grid' : 'site-main-grid no-sidebar';
        ?>

        <main class="main-content-area container">
            <div class="<?php echo esc_attr($grid_class); ?>">
                <div class="primary-content">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>
                        <header class="single-post-header">
                            <h1 class="single-post-title"><?php the_title(); ?></h1>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="single-featured-image">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>

                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>

                <?php if ($has_sidebar) : ?>
                    <?php get_sidebar(); ?>
                <?php endif; ?>
            </div>
        </main>

    <?php
    endwhile;
endif;

get_footer();
