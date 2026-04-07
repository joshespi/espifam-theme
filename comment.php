<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area mt-12">

    <?php if (have_comments()) : ?>
        <h2 class="text-2xl font-bold text-white mb-6 border-b border-zinc-800 pb-3">
            <?php
            $count = get_comments_number();
            echo $count === '1' ? 'One Comment' : $count . ' Comments';
            ?>
        </h2>

        <ol class="comment-list space-y-6 list-none pl-0 mb-8">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 48,
                'callback'   => 'espifam_comment_template',
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php
    if (!comments_open()) {
        echo '<p class="text-zinc-500 text-sm mt-4">Comments are closed.</p>';
    }

    comment_form(array(
        'title_reply'          => '<span class="text-white">Leave a Comment</span>',
        'label_submit'         => 'Post Comment',
        'class_submit'         => 'bg-red-700 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition cursor-pointer',
        'comment_notes_before' => '',
        'comment_field'        => '<p class="comment-form-comment"><label for="comment" class="block mb-2 font-medium text-zinc-300">Comment</label><textarea id="comment" name="comment" rows="5" required class="w-full px-4 py-2 rounded-lg border border-zinc-700 bg-zinc-800 text-zinc-100 focus:outline-none focus:ring-2 focus:ring-red-600 transition"></textarea></p>',
    ));
    ?>
</div>
