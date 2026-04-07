<?php get_header(); ?>

<main class="bg-zinc-950 min-h-screen flex items-center justify-center px-4 py-16">
    <div class="text-center max-w-lg">

        <!-- Animated camera / photo icon -->
        <div class="relative inline-block mb-8">
            <div class="text-8xl animate-bounce select-none" aria-hidden="true">📷</div>
            <div class="absolute -top-2 -right-2 bg-red-700 text-white text-xs font-bold px-2 py-0.5 rounded-full animate-pulse">
                404
            </div>
        </div>

        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
            Oops! This one got lost.
        </h1>

        <p class="text-zinc-400 text-lg mb-3">
            Looks like this page wandered off and nobody took a picture of where it went.
        </p>
        <p class="text-zinc-500 text-sm mb-10">
            Happens in every family.
        </p>

        <!-- Action buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo home_url(); ?>"
               class="bg-red-700 hover:bg-red-600 text-white font-bold py-3 px-8 rounded-xl transition-colors no-underline">
                Take Me Home
            </a>
            <a href="<?php echo home_url('/blog'); ?>"
               class="bg-zinc-800 hover:bg-zinc-700 text-zinc-200 font-bold py-3 px-8 rounded-xl transition-colors no-underline">
                Browse the Blog
            </a>
        </div>

        <!-- Fun search fallback -->
        <div class="mt-12">
            <p class="text-zinc-600 text-sm mb-3">Or try searching for what you need:</p>
            <?php get_search_form(); ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>
