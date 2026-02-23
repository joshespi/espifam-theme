<div class="relative">
    <!-- Hidden checkbox to manage the toggle state -->
    <input type="checkbox" id="sidebar-toggle" class="peer hidden">

    <!-- Sidebar -->
    <div class="fixed top-0 right-0 h-full w-64 bg-gray-800 text-white transform translate-x-full peer-checked:translate-x-0 transition-transform duration-300 shadow-lg z-50">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Sidebar</h2>
            <?php if (is_active_sidebar('sidebar-1')) : ?>
                <?php dynamic_sidebar('sidebar-1'); ?>
            <?php else : ?>
                <p>No widgets added yet. Add some from the Widgets screen in the WordPress admin.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Toggle Button -->
    <label for="sidebar-toggle" class="fixed top-4 right-4 bg-blue-500 text-white p-3 rounded-md z-50 cursor-pointer transition-colors duration-300 peer-checked:bg-red-500">
        <!-- X Icon -->
        <svg class="w-6 h-6 hidden peer-checked:block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <!-- Hamburger Icon -->
        <svg class="w-6 h-6 peer-checked:hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>

    </label>
</div>