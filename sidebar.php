<div id="sidebar" class="fixed top-0 right-0 h-full w-64 bg-gray-800 text-white transform translate-x-full transition-transform duration-300">
    <div class="p-4">
        <h2 class="text-xl font-bold mb-4">Sidebar</h2>
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <?php dynamic_sidebar('sidebar-1'); ?>
        <?php else : ?>
            <p>No widgets added yet. Add some from the Widgets screen in the WordPress admin.</p>
        <?php endif; ?>
    </div>
</div>
<button id="sidebar-toggle" class="fixed top-1/2 right-0 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 rounded-l-md">
    Open Sidebar
</button>