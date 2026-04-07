<?php
/*
 * Template Name: About Us
 */
get_header(); ?>

<main class="bg-zinc-950 min-h-screen">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- Hero -->
    <div class="relative w-full h-64 md:h-80 overflow-hidden bg-black">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover opacity-40']); ?>
        <?php endif; ?>
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
            <h1 class="text-5xl font-extrabold text-white tracking-tight"><?php the_title(); ?></h1>
            <div class="mt-3 w-16 h-1 bg-red-700 rounded-full"></div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- Sidebar: family photo + quick facts -->
            <aside class="lg:col-span-1 flex flex-col gap-6">
                <?php
                $avatar = get_theme_mod('espifam_sidebar_avatar');
                $avatar_url = esc_url($avatar ?: get_template_directory_uri() . '/assets/family-avatar.png');
                ?>
                <div class="bg-zinc-900 rounded-xl border border-zinc-800 p-6 flex flex-col items-center text-center">
                    <img src="<?php echo $avatar_url; ?>" alt="The Espinoza Family"
                         class="w-36 h-36 rounded-full border-4 border-red-700 shadow-lg object-cover mb-4">
                    <h2 class="text-xl font-bold text-white">The Espinoza Family</h2>
                    <p class="text-zinc-400 text-sm mt-1">Est. with love &amp; chaos</p>
                    <div class="mt-4 w-full border-t border-zinc-800 pt-4">
                        <ul class="text-sm text-zinc-400 space-y-2 text-left">
                            <li class="flex items-center gap-2">
                                <span class="text-red-500">&#9679;</span> Family life &amp; adventures
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-red-500">&#9679;</span> Autism parenting &amp; advocacy
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-red-500">&#9679;</span> Honest stories, real life
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>

            <!-- Main content -->
            <div class="lg:col-span-2">
                <article class="bg-zinc-900 rounded-xl border border-zinc-800 p-8">
                    <div class="content text-zinc-300 leading-relaxed">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>

        </div>
    </div>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
