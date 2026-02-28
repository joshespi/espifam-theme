<?php
// Theme setup
function espifam_theme_setup()
{
    // Add support for dynamic title tags
    add_theme_support('title-tag');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'espifam-theme'),
        'footer' => __('Footer Menu', 'espifam-theme'),
    ));

    // Add support for HTML5 markup
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'espifam_theme_setup');

// Enqueue styles and scripts
function espifam_enqueue_assets()
{
    // Enqueue Tailwind CSS
    wp_enqueue_style('espifam-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.0', 'all');

    // Enqueue theme stylesheet
    wp_enqueue_style('espifam-style', get_stylesheet_uri(), array('espifam-tailwind'), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'espifam_enqueue_assets');


// Add support for widgets
function espifam_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'espifam-theme'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'espifam-theme'),
        'before_widget' => '<section class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'espifam_widgets_init');

// Add support for custom logo
add_theme_support('custom-logo', array(
    'height' => 100,
    'width' => 400,
    'flex-height' => true,
    'flex-width' => true,
));

function espifam_customize_register($wp_customize)
{
    // Add a section for the sidebar avatar
    $wp_customize->add_section('espifam_sidebar_section', [
        'title'    => __('Sidebar Avatar', 'espifam-theme'),
        'priority' => 30,
    ]);

    // Add setting for the avatar image
    $wp_customize->add_setting('espifam_sidebar_avatar', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    // Add image upload control
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'espifam_sidebar_avatar',
        [
            'label'    => __('Sidebar Avatar Image', 'espifam-theme'),
            'section'  => 'espifam_sidebar_section',
            'settings' => 'espifam_sidebar_avatar',
        ]
    ));
}
add_action('customize_register', 'espifam_customize_register');
