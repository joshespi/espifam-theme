<!-- Back to top -->
<a href="#page-top"
   class="fixed bottom-6 left-6 z-50 bg-zinc-800 hover:bg-red-700 text-zinc-400 hover:text-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 no-underline"
   aria-label="Back to top">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
    </svg>
</a>

<footer class="bg-black border-t border-red-900 text-zinc-400 py-6 mt-8">
    <div class="container mx-auto px-4 text-center">
        <p class="text-sm">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
