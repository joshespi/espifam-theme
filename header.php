<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="bg-gradient-to-r from-blue-200 via-white to-pink-200 text-gray-800 py-6 shadow">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight">
                    <a href="<?php echo home_url(); ?>" class="hover:text-blue-600 transition-colors"><?php bloginfo('name'); ?></a>
                </h1>
                <p class="text-base text-gray-600"><?php bloginfo('description'); ?></p>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'flex space-x-6 mt-4 md:mt-0 text-lg font-medium',
                'fallback_cb' => false,
            ));
            ?>
        </div>
    </header>
    <?php get_template_part('sidebar'); ?>