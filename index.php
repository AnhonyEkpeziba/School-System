<?php
require_once '../config/functions.php';
$page_title = 'Home';
include '../includes/header.php';
?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-primary to-primary-dark text-white py-20">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4"><?php echo getConfig('content.hero.title'); ?></h1>
            <p class="text-xl mb-8"><?php echo getConfig('content.hero.subtitle'); ?></p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/apply.php" class="bg-secondary text-white px-8 py-3 rounded-lg font-semibold hover:bg-secondary-dark transition inline-block">
                    <?php echo getConfig('content.hero.button_text'); ?>
                </a>
                <a href="/pages/about.php" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">
                    <?php echo getConfig('content.hero.button_secondary_text'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php foreach(getConfig('content.about.stats') as $stat): ?>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-primary"><?php echo $stat['number']; ?></div>
                    <div class="text-gray-600 mt-2"><?php echo $stat['label']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-primary mb-4"><?php echo getConfig('content.about.title'); ?></h2>
                <p class="text-gray-600 mb-6"><?php echo getConfig('content.about.content'); ?></p>
                <div class="space-y-3">
                    <h3 class="text-xl font-semibold">Our Mission</h3>
                    <p class="text-gray-600"><?php echo getConfig('content.about.mission'); ?></p>
                    <h3 class="text-xl font-semibold mt-4">Our Vision</h3>
                    <p class="text-gray-600"><?php echo getConfig('content.about.vision'); ?></p>
                </div>
                <a href="/pages/about.php" class="inline-block mt-6 text-primary font-semibold hover:underline">
                    Read More <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-primary rounded-lg p-6 text-white text-center">
                    <i class="fas fa-church text-4xl mb-3"></i>
                    <h3 class="font-bold">Spiritual Formation</h3>
                </div>
                <div class="bg-secondary rounded-lg p-6 text-white text-center">
                    <i class="fas fa-book text-4xl mb-3"></i>
                    <h3 class="font-bold">Academic Excellence</h3>
                </div>
                <div class="bg-primary-light rounded-lg p-6 text-white text-center">
                    <i class="fas fa-users text-4xl mb-3"></i>
                    <h3 class="font-bold">Community Life</h3>
                </div>
                <div class="bg-primary-dark rounded-lg p-6 text-white text-center">
                    <i class="fas fa-hand-holding-heart text-4xl mb-3"></i>
                    <h3 class="font-bold">Service to Others</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-primary mb-4">Our Core Values</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">The guiding principles that shape our formation program</p>
        </div>
        <div class="grid md:grid-cols-5 gap-6">
            <?php foreach(getConfig('content.about.core_values') as $value): ?>
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800"><?php echo $value; ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-primary mb-4"><?php echo getConfig('content.academics.title'); ?></h2>
            <p class="text-gray-600 max-w-2xl mx-auto"><?php echo getConfig('content.academics.subtitle'); ?></p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $programs = array_merge(getConfig('programs.junior_seminary'), getConfig('programs.senior_seminary'));
            foreach($programs as $key => $program): 
            ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="bg-primary p-4 text-white">
                        <h3 class="text-xl font-bold"><?php echo $program['name']; ?></h3>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-3"><?php echo $program['description']; ?></p>
                        <p class="text-sm text-gray-500 mb-2"><i class="fas fa-clock"></i> Duration: <?php echo $program['duration']; ?></p>
                        <a href="/pages/admissions.php" class="inline-block mt-4 text-primary font-semibold hover:underline">
                            Learn More <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Admission Process -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-primary mb-4">Admission Process</h2>
            <p class="text-gray-600">Simple steps to join our community</p>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            <?php foreach(getConfig('content.admissions.steps') as $step): ?>
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4 text-white text-xl font-bold">
                        <?php echo $step['step']; ?>
                    </div>
                    <h3 class="font-bold text-lg mb-2"><?php echo $step['title']; ?></h3>
                    <p class="text-gray-600 text-sm"><?php echo $step['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-8">
            <a href="/apply.php" class="btn-primary">Start Your Application</a>
        </div>
    </div>
</section>

<!-- Important Dates -->
<section class="py-16 bg-primary text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Important Dates</h2>
            <p class="text-white opacity-90">Mark these key dates for <?php echo getConfig('application.academic_year'); ?> academic session</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <div class="bg-white bg-opacity-10 rounded-lg p-6 text-center">
                <i class="fas fa-calendar-alt text-3xl mb-3"></i>
                <h3 class="font-bold mb-2">Application Opens</h3>
                <p class="text-lg"><?php echo getConfig('dates.application_opens'); ?></p>
            </div>
            <div class="bg-white bg-opacity-10 rounded-lg p-6 text-center">
                <i class="fas fa-calendar-times text-3xl mb-3"></i>
                <h3 class="font-bold mb-2">Application Closes</h3>
                <p class="text-lg"><?php echo getConfig('dates.application_closes'); ?></p>
            </div>
            <div class="bg-white bg-opacity-10 rounded-lg p-6 text-center">
                <i class="fas fa-pen text-3xl mb-3"></i>
                <h3 class="font-bold mb-2">Entrance Exam</h3>
                <p class="text-lg"><?php echo getConfig('dates.entrance_exam'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-primary mb-4">What Our Alumni Say</h2>
            <p class="text-gray-600">Testimonials from our graduates serving the Church</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg p-6 shadow-lg">
                <i class="fas fa-quote-left text-primary text-3xl mb-4"></i>
                <p class="text-gray-600 mb-4">"The formation I received at St. Charles prepared me not just academically, but spiritually and morally for the priesthood."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-bold">Rev. Fr. John Okonkwo</h4>
                        <p class="text-sm text-gray-500">Class of 2010</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-lg">
                <i class="fas fa-quote-left text-primary text-3xl mb-4"></i>
                <p class="text-gray-600 mb-4">"Excellent discipline, dedicated teachers, and a conducive environment for learning and spiritual growth."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-bold">Rev. Fr. Michael Eze</h4>
                        <p class="text-sm text-gray-500">Class of 2015</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-lg">
                <i class="fas fa-quote-left text-primary text-3xl mb-4"></i>
                <p class="text-gray-600 mb-4">"The best decision I ever made was choosing St. Charles for my seminary formation."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="ml-3">
                        <h4 class="font-bold">Rev. Fr. Peter Alozie</h4>
                        <p class="text-sm text-gray-500">Class of 2012</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-secondary text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Begin Your Journey Today</h2>
        <p class="text-xl mb-8">Take the first step towards becoming a priest and serving God's people</p>
        <a href="/apply.php" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-dark transition inline-block">
            Apply for Admission
        </a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>