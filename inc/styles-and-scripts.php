<?php

/**
 * Enqueue theme styles.
 */
function theme_enqueue_styles()
{
    wp_enqueue_style('armantejarat-front-css', get_template_directory_uri() . '/assets/css/front-css.css', [], get_file_ver(get_template_directory() . '/assets/css/front-css.css'));
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * Enqueue theme scripts.
 */
function theme_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('armantejarat-front-js', get_template_directory_uri() . '/assets/js/front-js.js', ['jquery'], get_file_ver(get_template_directory() . '/assets/js/front-js.js'), true);

    wp_localize_script('armantejarat-front-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
