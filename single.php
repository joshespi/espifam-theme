<?php get_header(); ?>

<main class="container mx-auto py-8">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="text-4xl font-bold mb-4"><?php the_title(); ?></h1>
                <div class="text-gray-600 text-sm mb-4">
                    Posted on <?php echo get_the_date(); ?> by <?php the_author(); ?>
                </div>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </article>
    <?php endwhile;
    else :
        echo '<p class="text-gray-600">No content found.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>