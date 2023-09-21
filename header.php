<!DOCTYPE html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?> " />
    <?php wp_head(); ?>
</head>

<body>

    <div class="wide-header">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hr-logo.png" alt="">
        </a>

        <div class="search">
            <div class="icon"></div>
            <input type="text" id="search-input" placeholder="Search for products" />
            <div class="search-suggestions" id="search-suggestions"></div>
        </div>


        <div class="menu">
            <?php
            wp_nav_menu(array(
                'menu' => 'wideTopMenu',
                'container' => false,
                'walker' => new Wide_Menu_Walker(),
            ));
            ?>
        </div>

        <a href="tel:<?php the_field('nav-call-button-link', 'option'); ?>" class="contact-button">
            <div class="icon"><span></span></div><span><?php the_field('nav-call-button-title', 'option'); ?></span>
        </a>
    </div>

    <div class="burger-menu" id="burgerMenu">
        <div class="items">
            <?php
            wp_nav_menu(array(
                'menu' => 'mobileMenu',
                'container' => false,
                'walker' => new Mobile_Menu_Walker(),
            ));
            ?>
        </div>

        <a href="tel:<?php the_field('nav-call-button-link', 'option'); ?>" class="contact-button">
            <div class="icon"><span></span></div><span><?php the_field('nav-call-button-title', 'option'); ?></span>
        </a>
    </div>

    <div class="mobile-header">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hr-logo.png" alt=""></a>
        <div class="search-burger-flx">
            <!-- <div class="search" id="searchButton"><span></span></div> -->
            <div class="burger-button" id="burgerButton"><span></span></div>
        </div>
    </div>

    <div id="backdrop"></div>