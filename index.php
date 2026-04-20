<?php
$page_title = 'Home';
include 'includes/header.php';
?>

<!-- Hero Section with Image -->
<section class="relative bg-gradient-to-r from-primary to-primary-dark text-white py-24">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-4 fade-in"><?php echo $config['site_name']; ?></h1>
        <p class="text-xl md:text-2xl mb-8 fade-in"><?php echo $config['site_tagline']; ?></p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/apply.php" class="btn-secondary">Start Your Application <i class="fas fa-arrow-right ml-2"></i></a>
            <a href="/about.php" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Learn More</a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center"><div class="text-4xl font-bold text-primary">38+</div><div class="text-gray-600">Years of Excellence</div></div>
            <div class="text-center"><div class="text-4xl font-bold text-primary">500+</div><div class="text-gray-600">Alumni Priests</div></div>
            <div class="text-center"><div class="text-4xl font-bold text-primary">250</div><div class="text-gray-600">Current Students</div></div>
            <div class="text-center"><div class="text-4xl font-bold text-primary">45</div><div class="text-gray-600">Dedicated Staff</div></div>
        </div>
    </div>
</section>

<!-- About Preview -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div><h2 class="text-3xl font-bold text-primary mb-4">Welcome to Our Seminary</h2><p class="text-gray-600 mb-4">St. Charles Borromeo Minor Seminary is a Catholic institution dedicated to the formation of young men who aspire to the priesthood. Founded in 1985, we have consistently provided excellent academic and spiritual formation.</p><p class="text-gray-600 mb-6">Our holistic approach combines rigorous academics with deep spiritual formation, producing well-rounded priests for the Church.</p><a href="/about.php" class="text-primary font-semibold hover:underline">Read More <i class="fas fa-arrow-right ml-1"></i></a></div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-primary rounded-lg p-6 text-white text-center"><i class="fas fa-church text-4xl mb-3"></i><h3 class="font-bold">Spiritual Formation</h3></div>
                <div class="bg-secondary rounded-lg p-6 text-white text-center"><i class="fas fa-book text-4xl mb-3"></i><h3 class="font-bold">Academic Excellence</h3></div>
                <div class="bg-primary-dark rounded-lg p-6 text-white text-center"><i class="fas fa-users text-4xl mb-3"></i><h3 class="font-bold">Community Life</h3></div>
                <div class="bg-primary-light rounded-lg p-6 text-white text-center"><i class="fas fa-hand-holding-heart text-4xl mb-3"></i><h3 class="font-bold">Service to Others</h3></div>
            </div>
        </div>
    </div>
</section>

<!-- Programs -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12"><h2 class="text-3xl font-bold text-primary mb-4">Our Academic Programs</h2><p class="text-gray-600">Comprehensive formation for future priests</p></div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition"><div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-school text-white text-2xl"></i></div><h3 class="text-xl font-bold mb-2">Junior Seminary</h3><p class="text-gray-600">JSS 1 - JSS 3</p><p class="text-gray-500 text-sm mt-2">Foundation years for priestly formation</p></div>
            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition"><div class="w-20 h-20 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-university text-white text-2xl"></i></div><h3 class="text-xl font-bold mb-2">Senior Seminary</h3><p class="text-gray-600">SS 1 - SS 3</p><p class="text-gray-500 text-sm mt-2">Advanced studies and spiritual deepening</p></div>
            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition"><div class="w-20 h-20 bg-primary-dark rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-church text-white text-2xl"></i></div><h3 class="text-xl font-bold mb-2">Philosophy Studies</h3><p class="text-gray-600">Preparatory Year</p><p class="text-gray-500 text-sm mt-2">Introduction to philosophical thinking</p></div>
        </div>
    </div>
</section>

<!-- Important Dates -->
<section class="py-16 bg-primary text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-8">Important Dates for <?php echo date('Y') . '/' . (date('Y')+1); ?></h2>
        <div class="grid md:grid-cols-4 gap-6">
            <div><i class="fas fa-calendar-alt text-3xl mb-3"></i><p class="font-bold">Application Opens</p><p><?php echo $config['dates']['application_opens']; ?></p></div>
            <div><i class="fas fa-calendar-times text-3xl mb-3"></i><p class="font-bold">Application Closes</p><p><?php echo $config['dates']['application_closes']; ?></p></div>
            <div><i class="fas fa-pen text-3xl mb-3"></i><p class="font-bold">Entrance Exam</p><p><?php echo $config['dates']['entrance_exam']; ?></p></div>
            <div><i class="fas fa-church text-3xl mb-3"></i><p class="font-bold">Resumption</p><p><?php echo $config['dates']['resumption_date']; ?></p></div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12"><h2 class="text-3xl font-bold text-primary mb-4">What Our Alumni Say</h2><p class="text-gray-600">Testimonials from our graduates serving the Church</p></div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg p-6 shadow"><i class="fas fa-quote-left text-primary text-3xl mb-4"></i><p class="text-gray-600 mb-4">"The formation I received prepared me not just academically, but spiritually and morally for the priesthood."</p><div class="flex items-center"><div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white"><i class="fas fa-user"></i></div><div class="ml-3"><h4 class="font-bold">Rev. Fr. John Okonkwo</h4><p class="text-sm text-gray-500">Class of 2010</p></div></div></div>
            <div class="bg-white rounded-lg p-6 shadow"><i class="fas fa-quote-left text-primary text-3xl mb-4"></i><p class="text-gray-600 mb-4">"Excellent discipline, dedicated teachers, and a conducive environment for learning and spiritual growth."</p><div class="flex items-center"><div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white"><i class="fas fa-user"></i></div><div class="ml-3"><h4 class="font-bold">Rev. Fr. Michael Eze</h4><p class="text-sm text-gray-500">Class of 2015</p></div></div></div>
            <div class="bg-white rounded-lg p-6 shadow"><i class="fas fa-quote-left text-primary text-3xl mb-4"></i><p class="text-gray-600 mb-4">"The best decision I ever made was choosing St. Charles for my seminary formation."</p><div class="flex items-center"><div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white"><i class="fas fa-user"></i></div><div class="ml-3"><h4 class="font-bold">Rev. Fr. Peter Alozie</h4><p class="text-sm text-gray-500">Class of 2012</p></div></div></div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-secondary text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Begin Your Journey Today</h2>
        <p class="text-xl mb-8">Take the first step towards becoming a priest and serving God's people</p>
        <a href="/apply.php" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-dark transition inline-block">Apply for Admission <i class="fas fa-arrow-right ml-2"></i></a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
