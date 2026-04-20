<?php
require_once '../config/functions.php';
$page_title = 'Gallery';
include '../includes/header.php';

// Sample gallery images (replace with actual images)
$gallery_images = [
    ['url' => '/assets/images/gallery/campus1.jpg', 'title' => 'Campus Aerial View', 'category' => 'Campus'],
    ['url' => '/assets/images/gallery/chapel.jpg', 'title' => 'Seminary Chapel', 'category' => 'Spiritual Life'],
    ['url' => '/assets/images/gallery/library.jpg', 'title' => 'Library', 'category' => 'Academics'],
    ['url' => '/assets/images/gallery/sports.jpg', 'title' => 'Sports Complex', 'category' => 'Sports'],
    ['url' => '/assets/images/gallery/graduation.jpg', 'title' => 'Graduation Ceremony', 'category' => 'Events'],
    ['url' => '/assets/images/gallery/students.jpg', 'title' => 'Students in Class', 'category' => 'Academics'],
];
?>

<section class="bg-gradient-to-r from-primary to-primary-dark text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Photo Gallery</h1>
        <p class="text-xl">Explore life at our seminary</p>
    </div>
</section>

<div class="container mx-auto px-4 py-12">
    <!-- Category Filter -->
    <div class="flex flex-wrap justify-center gap-3 mb-12">
        <button class="filter-btn active bg-primary text-white px-4 py-2 rounded-lg" data-filter="all">All</button>
        <?php foreach(getConfig('content.gallery.categories') as $category): ?>
            <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-primary hover:text-white transition" data-filter="<?php echo strtolower($category); ?>">
                <?php echo $category; ?>
            </button>
        <?php endforeach; ?>
    </div>
    
    <!-- Gallery Grid -->
    <div class="grid md:grid-cols-3 gap-6">
        <?php for($i = 1; $i <= 9; $i++): ?>
            <div class="gallery-item relative group overflow-hidden rounded-lg shadow-lg cursor-pointer" data-category="<?php echo ['campus', 'academics', 'spiritual', 'sports', 'events'][array_rand(['campus', 'academics', 'spiritual', 'sports', 'events'])]; ?>">
                <div class="bg-gray-300 h-64 flex items-center justify-center">
                    <i class="fas fa-image text-6xl text-gray-400"></i>
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <div class="text-center text-white">
                        <i class="fas fa-search-plus text-3xl mb-2"></i>
                        <p class="font-semibold">View Image</p>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                    <p class="text-white font-semibold">Gallery Image <?php echo $i; ?></p>
                    <p class="text-white text-sm opacity-75">Sample description</p>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    
    <div class="text-center mt-12">
        <p class="text-gray-500">* Images are for demonstration purposes. Actual gallery content will be added.</p>
    </div>
</div>

<script>
// Simple gallery filter
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const filter = this.dataset.filter;
        
        // Update active button styling
        document.querySelectorAll('.filter-btn').forEach(b => {
            b.classList.remove('bg-primary', 'text-white');
            b.classList.add('bg-gray-200', 'text-gray-700');
        });
        this.classList.add('bg-primary', 'text-white');
        this.classList.remove('bg-gray-200', 'text-gray-700');
        
        // Filter gallery items
        document.querySelectorAll('.gallery-item').forEach(item => {
            if (filter === 'all' || item.dataset.category === filter) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
</script>

<?php include '../includes/footer.php'; ?>