<?php get_header(); ?>

<main class="bg-zinc-950 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="bg-zinc-900 rounded-xl border border-zinc-800 p-8">
                <h1 class="text-4xl font-extrabold text-white mb-6"><?php the_title(); ?></h1>
                <div class="content text-zinc-300 leading-relaxed">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; else :
            echo '<p class="text-zinc-500">No content found.</p>';
        endif; ?>
    </div>
</main>

<?php get_footer(); ?>
