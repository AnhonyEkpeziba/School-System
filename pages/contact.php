<?php
require_once '../config/functions.php';
$page_title = 'Contact Us';
include '../includes/header.php';

// Handle contact form submission
$contact_success = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact_submit'])) {
    // In demo mode, just show success message
    $contact_success = true;
}
?>

<section class="bg-gradient-to-r from-primary to-primary-dark text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Contact Us</h1>
        <p class="text-xl">Get in touch with us for any inquiries</p>
    </div>
</section>

<div class="container mx-auto px-4 py-12">
    <div class="grid md:grid-cols-2 gap-12">
        <!-- Contact Information -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-6">Contact Information</h2>
            <div class="space-y-4">
                <div class="flex items-start">
                    <i class="fas fa-map-marker-alt text-primary text-xl mt-1 w-8"></i>
                    <div>
                        <h3 class="font-semibold">Address</h3>
                        <p class="text-gray-600"><?php echo getConfig('contact.address'); ?></p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-phone-alt text-primary text-xl mt-1 w-8"></i>
                    <div>
                        <h3 class="font-semibold">Phone Numbers</h3>
                        <p class="text-gray-600"><?php echo getConfig('contact.phone'); ?></p>
                        <p class="text-gray-600"><?php echo getConfig('contact.phone_alt'); ?></p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-envelope text-primary text-xl mt-1 w-8"></i>
                    <div>
                        <h3 class="font-semibold">Email Addresses</h3>
                        <p class="text-gray-600">General: <?php echo getConfig('contact.email'); ?></p>
                        <p class="text-gray-600">Admissions: <?php echo getConfig('contact.email_admissions'); ?></p>
                        <p class="text-gray-600">Admin: <?php echo getConfig('contact.email_admin'); ?></p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-clock text-primary text-xl mt-1 w-8"></i>
                    <div>
                        <h3 class="font-semibold">Office Hours</h3>
                        <p class="text-gray-600"><?php echo getConfig('contact.hours'); ?></p>
                        <p class="text-gray-600"><?php echo getConfig('contact.sat_hours'); ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Social Media -->
            <div class="mt-8">
                <h3 class="font-semibold mb-3">Follow Us</h3>
                <div class="flex space-x-3">
                    <?php foreach(getConfig('social') as $platform => $url): ?>
                        <?php if($url): ?>
                            <a href="<?php echo $url; ?>" target="_blank" class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center hover:bg-primary-dark transition">
                                <i class="fab fa-<?php echo $platform; ?>"></i>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-6">Send us a Message</h2>
            
            <?php if($contact_success): ?>
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                    <i class="fas fa-check-circle mr-2"></i> Thank you for your message! We'll get back to you soon.
                </div>
            <?php endif; ?>
            
            <form method="POST" class="space-y-4">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Your Name *</label>
                        <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Email Address *</label>
                        <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Subject *</label>
                    <input type="text" name="subject" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Message *</label>
                    <textarea name="message" required rows="5" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary"></textarea>
                </div>
                <button type="submit" name="contact_submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition w-full">
                    Send Message
                </button>
                <p class="text-xs text-gray-500 text-center">* Required fields (Demo mode - message not actually sent)</p>
            </form>
        </div>
    </div>
    
    <!-- Map -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-primary mb-4">Our Location</h2>
        <div class="rounded-lg overflow-hidden shadow-lg">
            <iframe 
                src="<?php echo getConfig('content.contact.map_embed'); ?>" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>