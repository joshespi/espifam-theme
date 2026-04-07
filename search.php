<?php get_header(); ?>

<main class="bg-zinc-950 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-white mb-2">
            Search Results
        </h1>
        <p class="text-zinc-500 text-sm mb-8">
            <?php if (have_posts()) : ?>
                Showing results for: <span class="text-red-400 font-medium"><?php echo get_search_query(); ?></span>
            <?php else : ?>
                No results for: <span class="text-red-400 font-medium"><?php echo get_search_query(); ?></span>
            <?php endif; ?>
        </p>

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('template-parts/content');
            endwhile;
        else : ?>
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-10 text-center">
                <p class="text-zinc-400 text-lg mb-2">Nothing came up for that search.</p>
                <p class="text-zinc-600 text-sm mb-6">Try a different word, or browse the blog from the home page.</p>
                <a href="<?php echo home_url(); ?>" class="bg-red-700 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition-colors no-underline">
                    Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
