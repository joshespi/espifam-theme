<?php get_header(); ?>

<main class="container mx-auto py-8">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('template-parts/content');
        endwhile;
    else :
        echo '<p class="text-center text-gray-600">No content found. Please check back later.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>