<?php get_header(); ?>

<main class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Search Results for: <?php echo get_search_query(); ?></h1>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('template-parts/content');
        endwhile;
    else :
        echo '<p class="text-gray-600">No results found. Please try a different search.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>