<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
        <p id="siteTitle"><?php bloginfo('name'); ?></p>
        <nav id="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_class' => 'menu',
            ));
            ?>
        </nav>
</header>
    <?php
    // The Query
    $main_args = array(
        'post_type' => 'post',
        // 'posts_per_page' => 5
    );
    $main_query = new WP_Query($main_args);

    // The Loop
    if ($main_query->have_posts()) {
        while ($main_query->have_posts()) {
            $main_query->the_post();
    ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
    <?php
        }
    } else {
        // If no posts match the query
        echo "No posts found.";
    }

    // Restore original post data
    wp_reset_postdata();
    ?>

</body>

</html>