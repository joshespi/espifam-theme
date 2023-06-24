<?php
// Load site styles
function espi_theme_assets()
{
    wp_enqueue_style('reset', get_template_directory_uri() . '/assets/css/reset.css', null, '2.0');
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css', '', '0.0.1');
    // wp_enqueue_script('my-scripts', get_template_directory_uri() . '/assets/js/mainScripts.js', array('jquery'), '0.0.1');
}
add_action('wp_enqueue_scripts', 'espi_theme_assets', 20);

// Add Featured Image Support
add_theme_support('post-thumbnails');

// Let WordPress build our <title> tags
add_theme_support('title-tag');


// Register Main Menu
function register_main_menu()
{
    register_nav_menu('main-menu', 'Main Menu');
}
add_action('after_setup_theme', 'register_main_menu');
// Add class "active" to menu item if currnetly on page
function add_active_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class', 10, 2);
