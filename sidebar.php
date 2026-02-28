<div class="relative">
    <input type="checkbox" id="sidebar-toggle" class="peer hidden">

    <!-- Toggle Button (label only, no icons inside) -->
    <label for="sidebar-toggle"
        class="fixed right-4 top-4 z-[60] bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-full cursor-pointer transition-colors duration-300 <?php if (is_admin_bar_showing()) echo 'mt-6'; ?> peer-checked:bg-red-500 shadow-lg w-12 h-12 flex items-center justify-center">
    </label>

    <!-- X Icon (shows when checked) -->
    <svg class="w-6 h-6 text-white hidden <?php if (is_admin_bar_showing()) echo 'mt-6'; ?> peer-checked:block fixed right-7 top-7 z-[61] pointer-events-none"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
    <!-- Hamburger Icon (shows when not checked) -->
    <svg class="w-6 h-6 block text-white <?php if (is_admin_bar_showing()) echo 'mt-6'; ?> peer-checked:hidden fixed right-7 top-7 z-[61] pointer-events-none"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
    </svg>

    <!-- Sidebar -->
    <div class="fixed top-0 right-0 h-full w-64 bg-gradient-to-b from-blue-100 via-white to-pink-100 text-gray-800 transform translate-x-full peer-checked:translate-x-0 transition-transform duration-300 shadow-2xl z-50 border-l border-blue-200 ">
        <div class="p-6 flex flex-col items-center <?php if (is_admin_bar_showing()) echo 'pt-12 mt-10'; ?>">
            <!-- Family Avatar -->
            <?php
            $sidebar_avatar = get_theme_mod('espifam_sidebar_avatar');
            $escaped_avatar = esc_url($sidebar_avatar ?: get_template_directory_uri() . '/assets/family-avatar.png');

            ?>
            <img src="<?= $escaped_avatar ?>"
                alt="Family Avatar"
                class="w-20 h-20 rounded-full shadow mb-4 border-4 border-blue-200">
            <h2 class="text-2xl font-bold mb-2">Welcome!</h2>
            <p class="text-sm text-gray-600 mb-6 text-center">Espifam Family Blog</p>
            <?php if (is_active_sidebar('sidebar-1')) : ?>
                <div class="space-y-4 w-full">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            <?php else : ?>
                <p class="text-gray-500">No widgets added yet. Add some from the Widgets screen in the WordPress admin.</p>
            <?php endif; ?>
        </div>
    </div>
</div>