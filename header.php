<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-zinc-950 text-zinc-100'); ?>>
    <header class="bg-black border-b border-red-900 text-white py-5 shadow-lg">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight">
                    <a href="<?php echo home_url(); ?>" class="text-white hover:text-red-500 transition-colors no-underline"><?php bloginfo('name'); ?></a>
                </h1>
                <p class="text-sm text-zinc-400"><?php bloginfo('description'); ?></p>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'primary-menu flex space-x-6 mt-4 md:mt-0 text-base font-medium',
                'fallback_cb' => false,
            ));
            ?>
        </div>
    </header>
    <?php get_template_part('sidebar'); ?>
