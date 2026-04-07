<?php
// Theme setup
function espifam_theme_setup()
{
    // Add support for dynamic title tags
    add_theme_support('title-tag');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'espifam-theme'),
        'footer' => __('Footer Menu', 'espifam-theme'),
    ));

    // Add support for HTML5 markup
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Required for YouTube/Vimeo embeds to be responsive
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'espifam_theme_setup');

// Enqueue styles and scripts
function espifam_enqueue_assets()
{
    // Enqueue Tailwind CSS
    wp_enqueue_style('espifam-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.0', 'all');

    // Enqueue theme stylesheet
    wp_enqueue_style('espifam-style', get_stylesheet_uri(), array('espifam-tailwind'), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'espifam_enqueue_assets');


// Add support for widgets
function espifam_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'espifam-theme'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'espifam-theme'),
        'before_widget' => '<section class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'espifam_widgets_init');

// Add support for custom logo
add_theme_support('custom-logo', array(
    'height' => 100,
    'width' => 400,
    'flex-height' => true,
    'flex-width' => true,
));

function espifam_customize_register($wp_customize)
{
    // Add a section for the sidebar avatar
    $wp_customize->add_section('espifam_sidebar_section', [
        'title'    => __('Sidebar Avatar', 'espifam-theme'),
        'priority' => 30,
    ]);

    // Add setting for the avatar image
    $wp_customize->add_setting('espifam_sidebar_avatar', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    // Add image upload control
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'espifam_sidebar_avatar',
        [
            'label'    => __('Sidebar Avatar Image', 'espifam-theme'),
            'section'  => 'espifam_sidebar_section',
            'settings' => 'espifam_sidebar_avatar',
        ]
    ));
}
add_action('customize_register', 'espifam_customize_register');

// Reading time estimate
function espifam_reading_time($post_id = null) {
    $content    = get_post_field('post_content', $post_id ?: get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $minutes    = max(1, (int) ceil($word_count / 200));
    return $minutes . ' min read';
}

// Open Graph / Twitter Card meta tags
function espifam_open_graph_tags() {
    if (!is_singular()) return;

    $title       = get_the_title();
    $url         = get_permalink();
    $description = has_excerpt()
        ? wp_strip_all_tags(get_the_excerpt())
        : wp_trim_words(wp_strip_all_tags(get_the_content()), 30, '...');
    $site_name   = get_bloginfo('name');
    $image       = '';

    if (has_post_thumbnail()) {
        $src   = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        $image = $src ? $src[0] : '';
    }

    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:type" content="article">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    if ($image) {
        echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    }
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    if ($image) {
        echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
    }
}
add_action('wp_head', 'espifam_open_graph_tags', 5);

// Custom comment template
function espifam_comment_template($comment, $args, $depth) {
    $avatar = get_avatar($comment, 48, '', '', ['class' => 'rounded-full border-2 border-zinc-700 flex-shrink-0']);
    $author = get_comment_author_link($comment);
    $date   = get_comment_date('F j, Y', $comment);
    $text   = get_comment_text($comment);
    $edit   = get_edit_comment_link($comment);
    ?>
    <li id="comment-<?php comment_ID(); ?>" class="bg-zinc-900 border border-zinc-800 rounded-xl p-5">
        <div class="flex gap-4">
            <?php echo $avatar; ?>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-3 mb-2 flex-wrap">
                    <span class="font-semibold text-white"><?php echo $author; ?></span>
                    <span class="text-zinc-500 text-xs"><?php echo $date; ?></span>
                    <?php if ($edit) : ?>
                        <a href="<?php echo esc_url($edit); ?>" class="text-xs text-red-500 hover:text-red-400 no-underline">Edit</a>
                    <?php endif; ?>
                </div>
                <?php if ($comment->comment_approved === '0') : ?>
                    <p class="text-zinc-500 text-sm italic mb-2">Your comment is awaiting moderation.</p>
                <?php endif; ?>
                <div class="text-zinc-300 text-sm leading-relaxed"><?php echo $text; ?></div>
                <div class="mt-2">
                    <?php comment_reply_link(array_merge($args, [
                        'reply_text' => 'Reply',
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth'],
                        'before'     => '<span class="text-xs text-red-500 hover:text-red-400 cursor-pointer">',
                        'after'      => '</span>',
                    ])); ?>
                </div>
            </div>
        </div>
    </li>
    <?php
}
