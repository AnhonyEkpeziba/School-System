<?php
$config = require __DIR__ . '/../config/site-config.php';
$page_title = $page_title ?? 'Home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['site_name']; ?> - <?php echo $page_title; ?></title>
    <meta name="description" content="Premier Catholic seminary in Delta State offering quality education and priestly formation">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4 { font-family: 'Playfair Display', serif; }
        .bg-primary { background-color: <?php echo $config['colors']['primary']; ?>; }
        .bg-primary-dark { background-color: <?php echo $config['colors']['primary_dark']; ?>; }
        .text-primary { color: <?php echo $config['colors']['primary']; ?>; }
        .border-primary { border-color: <?php echo $config['colors']['primary']; ?>; }
        .bg-secondary { background-color: <?php echo $config['colors']['secondary']; ?>; }
        .text-secondary { color: <?php echo $config['colors']['secondary']; ?>; }
        .btn-primary { background-color: <?php echo $config['colors']['primary']; ?>; color: white; padding: 12px 28px; border-radius: 8px; display: inline-block; transition: all 0.3s; font-weight: 600; }
        .btn-primary:hover { background-color: <?php echo $config['colors']['primary_dark']; ?>; transform: translateY(-2px); }
        .btn-secondary { background-color: <?php echo $config['colors']['secondary']; ?>; color: white; padding: 12px 28px; border-radius: 8px; display: inline-block; transition: all 0.3s; font-weight: 600; }
        .btn-secondary:hover { opacity: 0.9; transform: translateY(-2px); }
        .fade-in { animation: fadeIn 0.6s ease; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body class="bg-gray-50">
    <?php if($config['demo_mode']): ?>
    <div class="bg-yellow-500 text-black text-center py-2 px-4 no-print text-sm">
        <i class="fas fa-info-circle"></i> DEMO VERSION - For Proposal Purposes Only
        <button onclick="this.parentElement.style.display='none'" class="ml-4 underline">Hide</button>
    </div>
    <?php endif; ?>
    
    <!-- Top Bar -->
    <div class="bg-primary-dark text-white text-sm py-2 no-print">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex space-x-4">
                    <a href="tel:<?php echo $config['contact']['phone']; ?>" class="hover:text-gray-300"><i class="fas fa-phone-alt mr-1"></i> <?php echo $config['contact']['phone']; ?></a>
                    <a href="mailto:<?php echo $config['contact']['email']; ?>" class="hover:text-gray-300"><i class="fas fa-envelope mr-1"></i> <?php echo $config['contact']['email']; ?></a>
                </div>
                <div class="flex space-x-3 mt-2 md:mt-0">
                    <?php foreach($config['social'] as $platform => $url): ?>
                        <a href="<?php echo $url; ?>" target="_blank" class="hover:text-gray-300"><i class="fab fa-<?php echo $platform; ?>"></i></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-40 no-print">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center"><i class="fas fa-church text-white text-2xl"></i></div>
                    <div><h1 class="text-xl font-bold text-primary"><?php echo $config['site_name']; ?></h1><p class="text-xs text-gray-600"><?php echo $config['site_tagline']; ?></p></div>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="/" class="text-gray-700 hover:text-primary transition">Home</a>
                    <a href="/about.php" class="text-gray-700 hover:text-primary transition">About</a>
                    <a href="/academics.php" class="text-gray-700 hover:text-primary transition">Academics</a>
                    <a href="/admissions.php" class="text-gray-700 hover:text-primary transition">Admissions</a>
                    <a href="/gallery.php" class="text-gray-700 hover:text-primary transition">Gallery</a>
                    <a href="/contact.php" class="text-gray-700 hover:text-primary transition">Contact</a>
                    <a href="/apply.php" class="bg-primary text-white px-5 py-2 rounded-lg hover:bg-primary-dark transition">Apply Now</a>
                </div>
                <button id="mobileMenuBtn" class="md:hidden text-gray-700"><i class="fas fa-bars text-2xl"></i></button>
            </div>
            <div id="mobileMenu" class="hidden md:hidden pb-4">
                <a href="/" class="block py-2 text-gray-700 hover:text-primary">Home</a>
                <a href="/about.php" class="block py-2 text-gray-700 hover:text-primary">About</a>
                <a href="/academics.php" class="block py-2 text-gray-700 hover:text-primary">Academics</a>
                <a href="/admissions.php" class="block py-2 text-gray-700 hover:text-primary">Admissions</a>
                <a href="/gallery.php" class="block py-2 text-gray-700 hover:text-primary">Gallery</a>
                <a href="/contact.php" class="block py-2 text-gray-700 hover:text-primary">Contact</a>
                <a href="/apply.php" class="block bg-primary text-white px-4 py-2 rounded-lg text-center mt-2">Apply Now</a>
            </div>
        </div>
    </nav>
    <script>document.getElementById('mobileMenuBtn')?.addEventListener('click',function(){document.getElementById('mobileMenu').classList.toggle('hidden');});</script>
