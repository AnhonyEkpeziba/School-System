<?php
$config = require __DIR__ . '/../config/site-config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['site_name']; ?> - <?php echo $page_title ?? 'Home'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-primary { background-color: <?php echo $config['colors']['primary']; ?>; }
        .text-primary { color: <?php echo $config['colors']['primary']; ?>; }
        .bg-secondary { background-color: <?php echo $config['colors']['secondary']; ?>; }
        .btn-primary { background-color: <?php echo $config['colors']['primary']; ?>; color: white; padding: 12px 24px; border-radius: 8px; display: inline-block; }
        .btn-primary:hover { opacity: 0.9; }
    </style>
</head>
<body class="bg-gray-50">
    <?php if($config['demo_mode']): ?>
    <div class="bg-yellow-500 text-black text-center py-2 px-4">
        ⚠️ DEMO VERSION - For Proposal Purposes Only
    </div>
    <?php endif; ?>
    
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-primary"><?php echo $config['site_name']; ?></h1>
                    <p class="text-sm text-gray-600"><?php echo $config['site_tagline']; ?></p>
                </div>
                <div class="space-x-4">
                    <a href="/" class="text-gray-700 hover:text-primary">Home</a>
                    <a href="/apply.php" class="bg-primary text-white px-4 py-2 rounded hover:opacity-90">Apply Now</a>
                </div>
            </div>
        </div>
    </nav>