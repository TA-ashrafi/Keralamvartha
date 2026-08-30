<?php
/**
 * Comments Template
 *
 * @package Tahseen_Ashrafi
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(_x('One comment on &ldquo;%s&rdquo;', 'comments title', 'tahseen-ashrafi'), get_the_title());
            } else {
                printf(
                    _nx(
                        '%1$s comment on &ldquo;%2$s&rdquo;',
                        '%1$s comments on &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'tahseen-ashrafi'
                    ),
                    number_format_i18n($comments_number),
                    get_the_title()
                );
            }
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'tahseen-ashrafi'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply'       => __('Leave a Reply', 'tahseen-ashrafi'),
        'title_reply_to'    => __('Leave a Reply to %s', 'tahseen-ashrafi'),
        'class_submit'      => 'submit-btn',
        'comment_field'     => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label><textarea id="comment" name="comment" cols="45" rows="6" aria-required="true" required></textarea></p>',
    ));
    ?>

</div><!-- #comments -->
