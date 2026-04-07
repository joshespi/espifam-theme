<?php get_header(); ?>

<main class="bg-zinc-950 min-h-screen">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $categories   = get_the_category();
        $is_autism    = false;
        $cat_ids      = [];
        foreach ($categories as $cat) {
            $cat_ids[] = $cat->term_id;
            if (strtolower($cat->name) === 'autism') {
                $is_autism = true;
            }
        }
        ?>

        <!-- Featured Image Hero -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="relative w-full h-72 md:h-96 overflow-hidden">
                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/60 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-8">
                    <div class="container mx-auto">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-white drop-shadow-lg"><?php the_title(); ?></h1>
                        <p class="text-zinc-400 text-sm mt-2"><?php echo get_the_date(); ?> &middot; <?php the_author(); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="container mx-auto px-4 py-8">

            <!-- Title when no featured image -->
            <?php if (!has_post_thumbnail()) : ?>
                <h1 class="text-4xl font-extrabold text-white mb-2"><?php the_title(); ?></h1>
                <p class="text-zinc-500 text-sm mb-6"><?php echo get_the_date(); ?> &middot; <?php the_author(); ?></p>
            <?php else : ?>
                <p class="text-zinc-500 text-sm mb-6">&nbsp;</p>
            <?php endif; ?>

            <!-- Category badges -->
            <?php if ($categories) : ?>
                <div class="flex flex-wrap gap-2 mb-6">
                    <?php foreach ($categories as $cat) :
                        $badge_autism = strtolower($cat->name) === 'autism';
                    ?>
                        <a href="<?php echo get_category_link($cat->term_id); ?>"
                           class="text-xs font-semibold px-2 py-0.5 rounded-full no-underline transition-colors <?php echo $badge_autism ? 'bg-red-900 text-red-200 hover:bg-red-800' : 'bg-zinc-800 text-zinc-400 hover:bg-zinc-700'; ?>">
                            <?php echo esc_html($cat->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Trigger Warning (autism category only) -->
            <?php if ($is_autism) : ?>
                <details class="mb-8 rounded-xl border border-red-900 bg-zinc-900 group">
                    <summary class="flex items-center gap-3 px-5 py-4 cursor-pointer list-none select-none">
                        <span class="text-red-500 text-xl" aria-hidden="true">&#9888;</span>
                        <span class="font-semibold text-red-300">Content Notice</span>
                        <span class="ml-auto text-zinc-500 text-sm group-open:hidden">Click to read</span>
                        <span class="ml-auto text-zinc-500 text-sm hidden group-open:inline">Click to hide</span>
                    </summary>
                    <div class="px-5 pb-5 text-zinc-400 text-sm leading-relaxed border-t border-red-900/50 pt-4">
                        This post covers topics related to autism, including parenting challenges, emotional experiences,
                        and neurodivergent perspectives. Some content may be heavy or resonate deeply with parents and
                        caregivers. Take care of yourself and read at your own pace.
                    </div>
                </details>
            <?php endif; ?>

            <!-- Post Content -->
            <article class="bg-zinc-900 rounded-xl border border-zinc-800 p-8">
                <div class="content text-zinc-300 leading-relaxed">
                    <?php the_content(); ?>
                </div>
            </article>

            <!-- Related Posts -->
            <?php
            $related = new WP_Query([
                'category__in'   => $cat_ids,
                'post__not_in'   => [get_the_ID()],
                'posts_per_page' => 3,
                'orderby'        => 'rand',
            ]);
            if ($related->have_posts()) : ?>
                <section class="mt-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-zinc-800 pb-3">Related Posts</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <?php while ($related->have_posts()) : $related->the_post(); ?>
                            <a href="<?php the_permalink(); ?>"
                               class="group block bg-zinc-900 rounded-xl border border-zinc-800 overflow-hidden hover:border-red-900 hover:-translate-y-1 hover:shadow-xl hover:shadow-red-950/30 transition-all duration-300 no-underline">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="h-40 overflow-hidden">
                                        <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300']); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="p-4">
                                    <h3 class="font-bold text-white group-hover:text-red-400 transition-colors text-base leading-snug">
                                        <?php the_title(); ?>
                                    </h3>
                                    <p class="text-zinc-500 text-xs mt-2"><?php echo get_the_date(); ?></p>
                                </div>
                            </a>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </section>
            <?php endif; ?>

        </div>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
