<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body>

<?php


  // Start “The Loop”
  if ( have_posts() ) : // Does our website have any posts to  display?
      while (  have_posts() ) : the_post(); // If the answer is “yes”, let’s run some code.

          the_title( '<h2>', '</h2>' );  // Let’s display the title of our post.
          the_content();  // Let’s display the content of our post.

      endwhile; // There  are no more posts to display, let’s shut this down.

  else : // If we don’t have any posts, let’s display a custom  message below.

      _e( 'Sorry, no  posts matched your criteria.', 'textdomain' );

  endif; // OK, we can stop looking for posts now.

  // End of “The Loop”

?>
</body>
</html>