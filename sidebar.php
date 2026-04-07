<div class="relative">
    <input type="checkbox" id="sidebar-toggle" class="peer hidden">

    <!-- Toggle Button -->
    <label for="sidebar-toggle"
        class="fixed right-4 top-4 z-[60] bg-red-700 hover:bg-red-600 text-white p-3 rounded-full cursor-pointer transition-colors duration-300 <?php if (is_admin_bar_showing()) echo 'mt-6'; ?> shadow-lg w-12 h-12 flex items-center justify-center">
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
    <div class="fixed top-0 right-0 h-full w-64 bg-zinc-900 text-zinc-100 transform translate-x-full peer-checked:translate-x-0 transition-transform duration-300 shadow-2xl z-50 border-l border-zinc-800">
        <div class="p-6 flex flex-col items-center <?php if (is_admin_bar_showing()) echo 'pt-12 mt-10'; ?>">
            <!-- Family Avatar -->
            <?php
            $sidebar_avatar = get_theme_mod('espifam_sidebar_avatar');
            $escaped_avatar = esc_url($sidebar_avatar ?: get_template_directory_uri() . '/assets/family-avatar.png');
            ?>
            <img src="<?= $escaped_avatar ?>"
                alt="Family Avatar"
                class="w-20 h-20 rounded-full shadow mb-4 border-4 border-red-700">
            <h2 class="text-2xl font-bold mb-2 text-white">Welcome!</h2>
            <p class="text-sm text-zinc-400 mb-6 text-center">Espifam Family Blog</p>
            <div class="w-full border-t border-zinc-800 mb-6"></div>
            <?php if (is_active_sidebar('sidebar-1')) : ?>
                <div class="space-y-4 w-full">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            <?php else : ?>
                <p class="text-zinc-500 text-sm">No widgets added yet.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
