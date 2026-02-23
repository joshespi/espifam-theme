<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8'); ?>>
    <h2 class="text-2xl font-bold">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <div class="text-gray-600 text-sm mb-4">
        Posted on <?php echo get_the_date(); ?> by <?php the_author(); ?>
    </div>
    <div class="content">
        <?php the_excerpt(); ?>
    </div>
</article>