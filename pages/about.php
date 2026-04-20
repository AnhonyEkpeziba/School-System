<?php
require_once '../config/functions.php';
$page_title = 'About Us';
include '../includes/header.php';
?>

<section class="bg-gradient-to-r from-primary to-primary-dark text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">About Our Seminary</h1>
        <p class="text-xl">Learn about our history, mission, and vision</p>
    </div>
</section>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <!-- History -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-primary mb-4">Our History</h2>
            <p class="text-gray-600 leading-relaxed">
                St. Charles Borromeo Minor Seminary was established in 1985 by the Catholic Diocese of Bomadi 
                to provide quality education and spiritual formation for young men aspiring to the priesthood. 
                For over three decades, we have remained committed to our founding principles of academic excellence, 
                spiritual growth, and moral integrity.
            </p>
            <p class="text-gray-600 leading-relaxed mt-4">
                Named after the great reformer St. Charles Borromeo, our seminary has produced hundreds of priests 
                serving in various dioceses across Nigeria and beyond. We take pride in our rich heritage and 
                continue to build on the solid foundation laid by our founding fathers.
            </p>
        </div>
        
        <!-- Mission & Vision -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <div class="bg-gray-50 rounded-lg p-6">
                <i class="fas fa-bullseye text-primary text-3xl mb-4"></i>
                <h3 class="text-xl font-bold text-primary mb-2">Our Mission</h3>
                <p class="text-gray-600"><?php echo getConfig('content.about.mission'); ?></p>
            </div>
            <div class="bg-gray-50 rounded-lg p-6">
                <i class="fas fa-eye text-primary text-3xl mb-4"></i>
                <h3 class="text-xl font-bold text-primary mb-2">Our Vision</h3>
                <p class="text-gray-600"><?php echo getConfig('content.about.vision'); ?></p>
            </div>
        </div>
        
        <!-- Core Values -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-primary mb-6 text-center">Our Core Values</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <?php foreach(getConfig('content.about.core_values') as $value): ?>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                        <h3 class="font-semibold"><?php echo $value; ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Leadership -->
        <div>
            <h2 class="text-3xl font-bold text-primary mb-6 text-center">Our Leadership</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-4xl text-gray-500"></i>
                    </div>
                    <h3 class="font-bold text-lg">Most Rev. Dr. John Okeoghene</h3>
                    <p class="text-primary">Bishop of Bomadi Diocese</p>
                    <p class="text-sm text-gray-500 mt-2">Chairman, Board of Governors</p>
                </div>
                <div class="text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-4xl text-gray-500"></i>
                    </div>
                    <h3 class="font-bold text-lg">Very Rev. Fr. Michael Obiora</h3>
                    <p class="text-primary">Rector</p>
                    <p class="text-sm text-gray-500 mt-2">Chief Administrator</p>
                </div>
                <div class="text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user text-4xl text-gray-500"></i>
                    </div>
                    <h3 class="font-bold text-lg">Rev. Fr. Paul Okafor</h3>
                    <p class="text-primary">Vice Rector</p>
                    <p class="text-sm text-gray-500 mt-2">Academics & Formation</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>