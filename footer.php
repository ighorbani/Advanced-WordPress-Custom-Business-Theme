<div class="footer">
    <div class="call-box">
        <p><?php the_field('footer-first-title', 'option'); ?></p>
        <h2><?php the_field('footer-second-title', 'option'); ?></h2>

        <div class="call-items-flx">
            <?php
            if (have_rows('footer-calls', 'option')) {
                while (have_rows('footer-calls', 'option')) {
                    the_row();
                    echo  '<a href="tel:' . get_sub_field('link', 'option') . '">';
                    echo  '<div>';
                    echo '<div class="icon"><span style="background-image: url(\'' . get_sub_field("icon", "option") . '\');"></span></div><span>' . get_sub_field('title', 'option') . '</span>';
                    echo   '</div>';
                    echo  '<div class="number">' . get_sub_field('number', 'option') . '</div>';
                    echo '</a>';
                }
            }
            ?>
        </div>
    </div>

    <div class="footer-content">
        <div class="links-flx">

            <?php
            if (have_rows('footer-links', 'option')) {
                while (have_rows('footer-links', 'option')) {
                    the_row();
                    echo '<div class="links-group">';
                    echo '<h5>' . get_sub_field('group-title', 'option') . '</h5>';
                    if (have_rows('links', 'option')) {
                        while (have_rows('links', 'option')) {
                            the_row();
                            echo '<a href="' . get_sub_field('link', 'option') . '"  target="_blank"  >' . get_sub_field('title', 'option') . '</a>';
                        }
                    }
                    echo '</div>';
                }
            }
            ?>
        </div>

        <div class="company">
            <img src="<?php echo get_template_directory_uri(); ?>//assets/images/footer-logo.png" class="logo" alt="">
            <div class="social-meida-flex">

                <?php
                if (have_rows('social-medias', 'option')) {
                    while (have_rows('social-medias', 'option')) {
                        the_row();
                        echo '<a style="background-image: url(\'' . get_sub_field("icon", "option") . '\');" target="_blank" href="' . get_sub_field('link', 'option') . '" class="telegram"></a>';
                    }
                }
                ?>
            </div>

            <p><?php the_field('footer-description', 'option'); ?></p>

            <div class="hr-line"></div>
            <div class="address-flx">
                <div>
                    <div class="icon"></div>
                    <span>Address</span>
                </div>
                <p><?php the_field('address', 'option'); ?></p>
            </div>
            <a href="mailto:imanwpexpert@gmail.com" class="creator-box">Designed and developed by Iman Ghorbani</a>
        </div>
    </div>
</div>

</body>
<?php wp_footer(); ?>

</html>