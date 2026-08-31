<?php
/**
 * Archive & Category Template
 *
 * @package Tahseen_Ashrafi
 */

get_header();

$enable_archive_sidebar = get_theme_mod('tahseen_ashrafi_enable_archive_sidebar', true);
$grid_class = $enable_archive_sidebar ? 'site-main-grid' : 'site-main-grid no-sidebar';
?>

<?php
$show_sidebar = get_theme_mod('tahseen_ashrafi_enable_archive_sidebar', false);
$grid_class   = $show_sidebar ? 'site-main-grid' : 'site-main-grid no-sidebar';
?>
<main class="main-content-area container">
    <div class="<?php echo esc_attr($grid_class); ?>">
        <div class="primary-content">
            <header class="widget-section-header">
                <h1 class="widget-section-title">
                    <?php the_archive_title(); ?>
                </h1>
            </header>

            <?php if (have_posts()) : ?>
                <div class="post-grid-3-col">
                    <?php while (have_posts()) : the_post();
                        $cat = get_the_category();
                        $cat_name = !empty($cat) ? $cat[0]->name : '';
                    ?>
                        <div class="grid-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="grid-card-thumb">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                                </div>
                            <?php endif; ?>
                            <div class="grid-card-body">
                                <?php if ($cat_name) : ?>
                                    <span class="category-badge"><?php echo esc_html($cat_name); ?></span>
                                <?php endif; ?>
                                <h4 class="grid-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <?php tahseen_ashrafi_render_post_meta(get_the_ID(), true, true, true); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <?php tahseen_ashrafi_pagination(); ?>
            <?php else : ?>
                <p><?php _e('No posts found in this archive.', 'tahseen-ashrafi'); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($enable_archive_sidebar) : ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
