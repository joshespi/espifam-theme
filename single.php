<?php get_header(); ?>

<main class="container mx-auto py-8">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="bg-white/90 rounded-xl shadow-lg border border-blue-100 p-8 flex flex-col md:flex-row items-start">
                <div class="flex-1">
                    <h1 class="text-4xl font-extrabold mb-4"><?php the_title(); ?></h1>
                    <div class="text-gray-500 text-sm mb-6">
                        Posted on <?php echo get_the_date(); ?> by <?php the_author(); ?>
                    </div>
                    <div class="content text-gray-700 mb-8">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="md:ml-10 mt-6 md:mt-0 flex-shrink-0">
                        <?php the_post_thumbnail('large', ['class' => 'rounded-xl w-full md:w-96 object-cover shadow-lg']); ?>
                    </div>
                <?php endif; ?>
            </article>
    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>