<article id="post-<?php the_ID(); ?>" <?php post_class('mb-6 bg-zinc-900 rounded-xl shadow-lg border border-zinc-800 p-6 flex items-center hover:border-red-800 hover:-translate-y-1 hover:shadow-red-950/40 hover:shadow-xl transition-all duration-300 group'); ?>>
    <div class="flex-1">
        <h2 class="text-2xl font-bold mb-2">
            <a href="<?php the_permalink(); ?>" class="text-white group-hover:text-red-400 transition-colors no-underline"><?php the_title(); ?></a>
        </h2>
        <div class="text-zinc-500 text-sm mb-3">
            <?php echo get_the_date(); ?> &middot; <?php the_author(); ?> &middot; <?php echo espifam_reading_time(); ?>
        </div>
        <?php
        $categories = get_the_category();
        if ($categories) : ?>
            <div class="flex flex-wrap gap-2 mb-3">
                <?php foreach ($categories as $cat) :
                    $is_autism = strtolower($cat->name) === 'autism';
                ?>
                    <a href="<?php echo get_category_link($cat->term_id); ?>"
                       class="text-xs font-semibold px-2 py-0.5 rounded-full no-underline transition-colors <?php echo $is_autism ? 'bg-red-900 text-red-200 hover:bg-red-800' : 'bg-zinc-800 text-zinc-400 hover:bg-zinc-700'; ?>">
                        <?php echo esc_html($cat->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="text-zinc-400">
            <?php the_excerpt(); ?>
        </div>
    </div>
    <?php if (has_post_thumbnail()) : ?>
        <div class="ml-6 flex-shrink-0">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', ['class' => 'rounded-lg w-32 h-32 object-cover shadow border border-zinc-700 group-hover:border-red-900 transition-colors']); ?>
            </a>
        </div>
    <?php endif; ?>
</article>
