<?php get_header(); ?>
<?php while (have_posts()) {
    the_post(); ?>

    <div class="single-page">

        <div class="header-flx">
            <div class="description">
                <h1><?php the_title(); ?></h1>
                <div class="top-feature">
                    <div class="icon"><span></span></div><span><?php echo get_comments_number(); ?> Comments</span>
                </div>
                <h2>Applications</h2>
                <p><?php the_field('applications'); ?></p>
                <h2>Specifications</h2>
                <div class="features">

                    <?php if (have_rows('feature')) {
                        while (have_rows('feature')) {
                            the_row();
                            echo '<div class="feature">';
                            echo    '<div class="title"><div class="icon"></div>' . get_sub_field('title') . '</div>';
                            echo    '<p>' . get_sub_field('value') . '</p>';
                            echo   '</div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <?php
            $post_thumbnail_uri = "";
            if (has_post_thumbnail()) {
                $post_thumbnail_uri = get_the_post_thumbnail_url();
                echo '<img src="' . $post_thumbnail_uri . '" alt="" class="product-image">';
            }
            ?>
        </div>

        <div class="description-suggestions-flx">
            <div class="description">
                <h2>Description</h2>
                <div class="hr-line"></div>
                <?php the_content(); ?>
                <?php if (get_field('notice-message')) { ?>
                    <div class="notice-box">
                        <div class="title">
                            <div class="icon"></div>Attention
                        </div>
                        <p><?php the_field('notice-message'); ?></p>
                    </div>
                <?php } ?>
            </div>

        <?php } ?>

        <div class="suggestions-section">

            <h2>Recommended Products</h2>
            <div class="suggestions">

                <?php
                $suggestions = new WP_Query(['post_type' => 'product', 'post_status' => 'publish', 'order' => 'DESC', 'posts_per_page' => 3]);
                while ($suggestions->have_posts()) {

                    $suggestions->the_post();
                    $img_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

                    echo '<a href="' . get_permalink() . '" class="suggest-engine-item">';
                    echo '<div class="image-content-flx">';
                    echo '<img src="' . $img_url . '" class="image" />';
                    echo '<div class="content">';
                    echo '<h3>' . get_the_title() . '</h3>';
                    echo '<p>' . mb_strimwidth(get_the_excerpt(), 0, 67, '...') . '</p>';
                    echo '</div>';
                    echo '</div>';

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
        </div>
        </div>

    </div>
    <?php get_footer(); ?>