<?php

// Add helper functions.
require_once('inc/helpers.php');

// Theme setup and initialization.
require_once('inc/initialization.php');

// Custom post types registration.
require_once('inc/custom-post-types.php');

// Register Advanced Custom Fields options pages.
require_once('inc/acf-options-pages.php');

// Styles and scripts management.
require_once('inc/styles-and-scripts.php');

// Custom menu walker
class Wide_Menu_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
    }
    function end_lvl(&$output, $depth = 0, $args = null)
    {
    }
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $current_class = in_array('current-menu-item', $classes) ? 'active' : '';

        $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr(implode(' ', $classes)) . ' ' . $current_class . '">' . esc_html($item->title) . '</a>';
    }
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
    }
}

class Mobile_Menu_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
    }
    function end_lvl(&$output, $depth = 0, $args = null)
    {
    }
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $current_class = in_array('current-menu-item', $classes) ? 'active' : '';

        $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr(implode(' ', $classes)) . ' ' . $current_class . '"><div class="title"><div class="icon"></div><span>' . esc_html($item->title) . '</span></div><div class="arrow"></div></a>';
    }
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
    }
}

// Search with ajax functionality
function search_products()
{
    $search_term = sanitize_text_field($_POST['term']);
    $args = array(
        'post_type' => 'product',
        's' => $search_term,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Get the URL of the full-sized image (you can specify a custom image size)
            $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'small')[0];

            echo '<a href="' . get_permalink() . '">' . get_the_title() . '<img src="' . $image_url . '" alt="Thumbnail"></a>';
        }
        wp_reset_postdata();
    } else {
        echo 'No products found.';
    }

    wp_die();
}

add_action('wp_ajax_search_products', 'search_products');
add_action('wp_ajax_nopriv_search_products', 'search_products');
