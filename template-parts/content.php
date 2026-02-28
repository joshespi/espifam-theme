<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8 bg-white/90 rounded-xl shadow-lg border border-blue-100 p-8 flex items-center'); ?>>
    <div class="flex-1">
        <h2 class="text-2xl font-bold mb-2">
            <a href="<?php the_permalink(); ?>" class="hover:text-blue-500 transition-colors"><?php the_title(); ?></a>
        </h2>
        <div class="text-gray-500 text-sm mb-4">
            Posted on <?php echo get_the_date(); ?> by <?php the_author(); ?>
        </div>
        <div class="content text-gray-700">
            <?php the_excerpt(); ?>
        </div>
    </div>
    <?php if (has_post_thumbnail()) : ?>
        <div class="ml-6 flex-shrink-0">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', ['class' => 'rounded-lg w-32 h-32 object-cover shadow']); ?>
            </a>
        </div>
    <?php endif; ?>
</article>