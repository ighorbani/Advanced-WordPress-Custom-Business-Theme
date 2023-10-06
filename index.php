<?php get_header(); ?>

<div class="motors-section">
    <h2 class="regular-title"><?php the_field('engines-title', 'option'); ?></h2>
    <p class="regular-subtitle">Exploring the Best Engines</p>

    <div class="items-flx">

        <?php
        $engines = new WP_Query(['post_type' => 'product', 'tax_query' => [['taxonomy' => 'products-category', 'field' => 'slug', 'terms' => 'engines']], 'post_status' => 'publish', 'order' => 'DESC', 'posts_per_page' => 3]);
        while ($engines->have_posts()) {
            $engines->the_post();
            $img_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

            echo '<a href="' . get_permalink() . '" target="_blank" class="motor-item">';
            echo '<div class="image" style="background-image: url(' . $img_url . ');"></div>';
            echo '<h3>' . get_the_title() . '</h3>';
            echo '<p>' . mb_strimwidth(get_the_excerpt(), 0, 56, '...') . '</p>';
            echo '<div class="button-flx">';
            echo '<div class="feature">';
            echo '<div class="icon"><span></span></div><span>' . get_comments_number() . ' Comments</span>';
            echo '</div>';
            echo '<div class="view-button"><span>View Product</span>';
            echo '<div class="icon"></div>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
        }
        wp_reset_postdata();
        ?>

    </div>
</div>

<div class="oils-section">
    <h2 class="regular-title"><?php the_field('oils-title', 'option'); ?></h2>
    <p class="regular-subtitle">Exploring the Best Oils</p>

    <div class="items-flx">

        <?php
        $oils = new WP_Query(['post_type' => 'product', 'tax_query' => [['taxonomy' => 'products-category', 'field' => 'slug', 'terms' => 'oils']], 'post_status' => 'publish', 'order' => 'DESC', 'posts_per_page' => 3]);
        while ($oils->have_posts()) {
            $oils->the_post();
            $img_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

            echo '<a href="' . get_permalink() . '" target="_blank" class="oil-item">';
            echo '<div class="image" style="background-image: url(' . $img_url . ');"></div>';
            echo '<h3>' . get_the_title() . '</h3>';
            echo '<p>' . mb_strimwidth(get_the_excerpt(), 0, 56, '...') . '</p>';
            echo '<div class="button-flx">';
            echo '<div>';
            echo '<div class="icon"><span></span></div>';
            echo '<span>Check Product</span>';
            echo '</div>';
            echo '<div class="arrow"></div>';
            echo '</div>';
            echo '</a>';
        }
        wp_reset_postdata();
        ?>
    </div>
</div>

<div class="about-us-section">
    <h2 class="regular-title"><?php the_field('about-us-title', 'option'); ?></h2>
    <p class="regular-subtitle">Organizational Values and Our Image Gallery</p>

    <div class="text-image-flx">
        <img src="<?php the_field('about-us-image', 'option'); ?>" alt="">
        <div>
            <h4><span>+3 </span>Years of Your Trust</h4>
            <p><?php the_field('about-us-content', 'option'); ?></p>
        </div>
    </div>

    <div class="values-flex">
        <?php
        if (have_rows('values', 'option')) {
            while (have_rows('values', 'option')) {
                the_row();
                echo '<div class="value-item">';
                echo '<div class="icon" style="background-image: url(\'' . get_sub_field("image", "option") . '\');"></div>';
                echo '<h4>' . get_sub_field('title', 'option') . '</h4>';
                echo '<p>' . get_sub_field('description', 'option') . '</p>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>