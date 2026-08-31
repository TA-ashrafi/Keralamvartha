<?php
/**
 * Single Post Template
 *
 * @package Tahseen_Ashrafi
 */

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        tahseen_ashrafi_set_post_views(get_the_ID());

        $global_single_sidebar = get_theme_mod('tahseen_ashrafi_enable_single_sidebar', true);
        $metabox_sidebar = get_post_meta(get_the_ID(), '_tahseen_ashrafi_enable_sidebar', true);

        // Single post sidebar enabled only if both global setting and post metabox allow it
        $has_sidebar = $global_single_sidebar && ($metabox_sidebar !== 'disable');
        $grid_class  = $has_sidebar ? 'site-main-grid' : 'site-main-grid no-sidebar';
        $cat = get_the_category();
        $cat_name = !empty($cat) ? $cat[0]->name : '';
        ?>

        <main class="main-content-area container">
            <div class="<?php echo esc_attr($grid_class); ?>">
                <div class="primary-content">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?> itemscope itemtype="https://schema.org/NewsArticle">
                        <header class="single-post-header">
                            <?php if ($cat_name) : ?>
                                <span class="category-badge"><?php echo esc_html($cat_name); ?></span>
                            <?php endif; ?>
                            <h1 class="single-post-title" itemprop="headline"><?php the_title(); ?></h1>
                            <?php tahseen_ashrafi_render_post_meta(get_the_ID(), true, true, true); ?>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="single-featured-image" itemprop="image">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content" itemprop="articleBody">
                            <?php the_content(); ?>
                        </div>
                    </article>

                    <!-- AUTHOR BIO BOX BELOW POST -->
                    <?php tahseen_ashrafi_author_bio_box(); ?>

                    <!-- LEAVE A REPLY & COMMENTS SECTION -->
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
