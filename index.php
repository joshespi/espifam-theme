<?php get_header(); ?>

<main class="bg-gradient-to-b from-blue-50 via-white to-pink-50 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('template-parts/content');
            endwhile;
            // Pagination below the loop
            echo '<div class="mt-8 flex justify-center">';
            the_posts_pagination([
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Previous', 'espifam-theme'),
                'next_text' => __('Next &raquo;', 'espifam-theme'),
                'screen_reader_text' => __('Posts navigation', 'espifam-theme'),
            ]);
            echo '</div>';
        else :
            echo '<p class="text-center text-gray-600">No content found. Please check back later.</p>';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>