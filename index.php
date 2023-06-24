<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <p id="siteTitle"><?php bloginfo('name'); ?></p>
        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_class' => 'menu',
            ));
            ?>
        </nav>
    </header>
    <main>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <?php if (is_singular(array('post', 'page'))) {
                    ?>
                        <h2><?php the_title(); ?></h2>
                    <?php
                    } else {
                    ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php
                    }
                    ?>

                    <?php if (is_singular(array('post', 'page'))) : ?>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endwhile;
        else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </main>
    <?php wp_footer(); ?>
</body>

</html>