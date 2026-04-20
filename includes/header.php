<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo getConfig('site_description'); ?>">
    <meta name="keywords" content="<?php echo getConfig('site_keywords'); ?>">
    <meta name="author" content="<?php echo getConfig('site_author'); ?>">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?><?php echo getConfig('site_name'); ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary: <?php echo getConfig('colors.primary'); ?>;
            --primary-dark: <?php echo getConfig('colors.primary_dark'); ?>;
            --primary-light: <?php echo getConfig('colors.primary_light'); ?>;
            --secondary: <?php echo getConfig('colors.secondary'); ?>;
            --secondary-dark: <?php echo getConfig('colors.secondary_dark'); ?>;
            --font-heading: <?php echo getConfig('fonts.heading'); ?>;
            --font-body: <?php echo getConfig('fonts.body'); ?>;
        }
        
        body {
            font-family: var(--font-body);
            padding-top: <?php echo isDemoMode() ? '40px' : '0'; ?>;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
        }
        
        .bg-primary { background-color: var(--primary); }
        .bg-primary-dark { background-color: var(--primary-dark); }
        .bg-primary-light { background-color: var(--primary-light); }
        .text-primary { color: var(--primary); }
        .border-primary { border-color: var(--primary); }
        .hover\:bg-primary-dark:hover { background-color: var(--primary-dark); }
        .hover\:text-primary:hover { color: var(--primary); }
        .bg-secondary { background-color: var(--secondary); }
        .text-secondary { color: var(--secondary); }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: var(--secondary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-secondary:hover {
            background-color: var(--secondary-dark);
            transform: translateY(-2px);
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .mobile-menu {
            transition: all 0.3s ease;
        }
        
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <?php echo getDemoBadge(); ?>
    
    <!-- Top Bar -->
    <div class="bg-primary-dark text-white text-sm py-2 no-print">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="flex space-x-4">
                    <a href="tel:<?php echo getConfig('contact.phone'); ?>" class="hover:text-gray-300">
                        <i class="fas fa-phone-alt mr-1"></i> <?php echo getConfig('contact.phone'); ?>
                    </a>
                    <a href="mailto:<?php echo getConfig('contact.email'); ?>" class="hover:text-gray-300">
                        <i class="fas fa-envelope mr-1"></i> <?php echo getConfig('contact.email'); ?>
                    </a>
                </div>
                <div class="flex space-x-3">
                    <?php foreach(getConfig('social') as $platform => $url): ?>
                        <?php if($url): ?>
                            <a href="<?php echo $url; ?>" target="_blank" class="hover:text-gray-300">
                                <i class="fab fa-<?php echo $platform; ?>"></i>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-40 no-print">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                        <i class="fas fa-church text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-primary"><?php echo getConfig('site_name'); ?></h1>
                        <p class="text-xs text-gray-600"><?php echo getConfig('site_tagline'); ?></p>
                    </div>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6">
                    <a href="/" class="text-gray-700 hover:text-primary transition">Home</a>
                    <a href="/pages/about.php" class="text-gray-700 hover:text-primary transition">About</a>
                    <a href="/pages/academics.php" class="text-gray-700 hover:text-primary transition">Academics</a>
                    <a href="/pages/admissions.php" class="text-gray-700 hover:text-primary transition">Admissions</a>
                    <a href="/pages/gallery.php" class="text-gray-700 hover:text-primary transition">Gallery</a>
                    <a href="/pages/contact.php" class="text-gray-700 hover:text-primary transition">Contact</a>
                    <a href="/apply.php" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        Apply Now
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden pb-4 mobile-menu">
                <a href="/" class="block py-2 text-gray-700 hover:text-primary">Home</a>
                <a href="/pages/about.php" class="block py-2 text-gray-700 hover:text-primary">About</a>
                <a href="/pages/academics.php" class="block py-2 text-gray-700 hover:text-primary">Academics</a>
                <a href="/pages/admissions.php" class="block py-2 text-gray-700 hover:text-primary">Admissions</a>
                <a href="/pages/gallery.php" class="block py-2 text-gray-700 hover:text-primary">Gallery</a>
                <a href="/pages/contact.php" class="block py-2 text-gray-700 hover:text-primary">Contact</a>
                <a href="/apply.php" class="block bg-primary text-white px-4 py-2 rounded-lg text-center mt-2">Apply Now</a>
            </div>
        </div>
    </nav>