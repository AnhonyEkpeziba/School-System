<?php
$page_title = 'Home';
include 'includes/header.php';
?>

<section class="bg-gradient-to-r from-primary to-green-800 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">Welcome to <?php echo $config['site_name']; ?></h1>
        <p class="text-xl mb-8"><?php echo $config['site_tagline']; ?></p>
        <a href="/apply.php" class="bg-secondary text-white px-8 py-3 rounded-lg font-semibold inline-block hover:opacity-90">
            Start Your Application
        </a>
    </div>
</section>

<section class="container mx-auto px-4 py-16">
    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <i class="fas fa-graduation-cap text-4xl text-primary mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Quality Education</h3>
            <p class="text-gray-600">Excellence in academic formation</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <i class="fas fa-church text-4xl text-primary mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Spiritual Formation</h3>
            <p class="text-gray-600">Growing in faith and virtue</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <i class="fas fa-users text-4xl text-primary mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Community Life</h3>
            <p class="text-gray-600">Brotherhood and camaraderie</p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>