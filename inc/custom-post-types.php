<?php

/**
 * Register custom post types.
 */
function theme_register_custom_post_types()
{
    // Register product post type.
    register_post_type('product', array(
        'labels' => array(
            'name' => __('Product', 'advanced-busines-theme'),
            'singular_name' => __('Product', 'advanced-busines-theme'),
            'all_items' => __('Products', 'advanced-busines-theme'),
            'add_new' => __('Add Product', 'advanced-busines-theme'),
            'add_new_item' => __('Add New Product', 'advanced-busines-theme'),
            'edit_item' => __('Edit Product', 'advanced-busines-theme'),
            'new_item' => __('New Product', 'advanced-busines-theme'),
            'view_item' => __('View Product', 'advanced-busines-theme'),
            'search_items' => __('Search Products', 'advanced-busines-theme'),
            'not_found' => __('No products found', 'advanced-busines-theme'),
            'not_found_in_trash' => __('No products found in trash', 'advanced-busines-theme'),
            'archives' => __('Products', 'advanced-busines-theme'),
        ),
        'public' => true,
        'has_archive' => 'product',
        'menu_icon' => 'dashicons-cart',
        'show_in_rest' => true,
        'thumbnail' => 'Product Thumbnail',
        'rewrite' => array('slug' => 'product'),
        'query_var' => true,
        'taxonomies' => array('products-category'),
        'menu_position' => 5,
        'supports'    => array('custom-fields', 'title', 'thumbnail', 'excerpt', 'editor'),
    ));
}

/**
 * Register custom taxonomies.
 */
function theme_register_custom_taxonomies()
{
    // Register product category taxonomy.
    register_taxonomy('products-category', array('product'), array(
        'labels' => array(
            'name' => __('Categories', 'advanced-busines-theme'),
            'singular_name' => __('Category', 'advanced-busines-theme'),
            'add_new_item' => __('Add Category', 'advanced-busines-theme'),
            'all_items' => __('Categories', 'advanced-busines-theme'),
            'add_new' => __('Add Category', 'advanced-busines-theme'),
            'edit_item' => __('Edit Category', 'advanced-busines-theme'),
            'new_item' => __('New Category', 'advanced-busines-theme'),
            'view_item' => __('View Category', 'advanced-busines-theme'),
            'search_items' => __('Search Categories', 'advanced-busines-theme'),
            'not_found' => __('No categories found', 'advanced-busines-theme'),
            'not_found_in_trash' => __('No categories found in trash', 'advanced-busines-theme'),
            'archives' => __('Categories', 'advanced-busines-theme'),
        ),
        'public' => true,
        'show_admin_column' => true,
        'show_in_quick_edit' => true,
        'show_in_rest' => true,
        'hierarchical' => true
    ));
}

add_action('init', 'theme_register_custom_taxonomies');
add_action('init', 'theme_register_custom_post_types');
