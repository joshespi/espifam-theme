<?php
get_header(); ?>

<main class="container mx-auto py-8 text-center">
    <h1 class="text-4xl font-bold text-gray-800">404 - Page Not Found</h1>
    <p class="text-gray-600 mt-4">Sorry, the page you are looking for does not exist.</p>
    <a href="<?php echo home_url(); ?>" class="text-blue-500 hover:underline mt-4">Return to Home</a>
</main>

<?php get_footer(); ?>