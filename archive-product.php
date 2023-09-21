<?php

/**
 * Template Name: Products archive template
 * Template Post Type: post, page
 */

get_header(); ?>

<div class="archive-page">
    <h2 class="regular-title"><?php the_title(); ?></h2>
    <p class="regular-subtitle"><?php the_field('subtitle'); ?></p>

    <div class="items-flx">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $products = new WP_Query(['post_type' => 'product', 'post_status' => 'publish', 'order' => 'DESC', 'posts_per_page' => 4, 'paged' => $paged]);
        while ($products->have_posts()) {
            $products->the_post();
            $img_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

            echo '<a href="' . get_permalink() . '" target="_blank" class="motor-item">';
            echo '<div class="image" style="background-image: url(' . $img_url . ');"></div>';
            echo '<h3>' . get_the_title() . '</h3>';
            echo '<p>' . mb_strimwidth(get_the_excerpt(), 0, 67, '...') . '</p>';
            echo '<div class="button-flx">';
            echo '<div class="feature">';
            echo '<div class="icon"><span></span></div><span>' . get_comments_number() . ' Comments</span>';
            echo '</div>';
            echo '<div class="view-button"><span>Check Product</span>';
            echo '<div class="icon"></div>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
        }
        ?>
    </div>
    <?php if ($products->max_num_pages > 1) { ?>
        <div class='navigation'>
            <h6>Products Pagination</h6>
            <div class='navigation-flex'>

                <?php
                $big = PHP_INT_MAX;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $products->max_num_pages,
                    'show_all' => False,
                    'end_size' => 1,
                    'mid_size' => 0,
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;'
                ));
                ?>

            </div>
        </div>
    <?php } ?>
    <?php wp_reset_postdata(); ?>

</div>


<?php get_footer(); ?>