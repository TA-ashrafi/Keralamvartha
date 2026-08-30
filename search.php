<?php
/**
 * Search Results Template
 *
 * @package Tahseen_Ashrafi
 */

get_header();
?>

<main class="main-content-area container">
    <div class="site-main-grid">
        <div class="primary-content">
            <header class="widget-section-header">
                <h1 class="widget-section-title">
                    <?php printf(__('Search Results for: %s', 'tahseen-ashrafi'), '<span>' . get_search_query() . '</span>'); ?>
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
                <p><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'tahseen-ashrafi'); ?></p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php
get_footer();
