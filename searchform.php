<?php
/**
 * Search Form Template
 *
 * @package Tahseen_Ashrafi
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-form-inner" style="display:flex; gap:10px; margin: 15px 0;">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'tahseen-ashrafi'); ?>" value="<?php echo get_search_query(); ?>" name="s" style="flex-grow:1; padding:10px; border:1px solid #ccc; border-radius:4px;" />
        <button type="submit" class="search-submit" style="background:var(--primary-color, #e50914); color:#fff; border:none; padding:10px 20px; border-radius:4px; cursor:pointer;">
            <i class="fa-solid fa-magnifying-glass"></i> Search
        </button>
    </div>
</form>
