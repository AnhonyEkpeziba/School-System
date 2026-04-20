<?php
session_start();
require_once '../config/site-config.php';
$config = require '../config/site-config.php';

// If already logged in, go to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Demo credentials
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_name'] = 'System Administrator';
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - <?php echo $config['site_name']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-primary { background-color: <?php echo $config['colors']['primary']; ?>; }
        .bg-primary-dark { background-color: <?php echo $config['colors']['primary_dark']; ?>; }
        .text-primary { color: <?php echo $config['colors']['primary']; ?>; }
        .btn-primary { background-color: <?php echo $config['colors']['primary']; ?>; }
        .btn-primary:hover { background-color: <?php echo $config['colors']['primary_dark']; ?>; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="bg-primary text-white text-center py-6 rounded-t-lg">
                <i class="fas fa-church text-4xl mb-2"></i>
                <h2 class="text-2xl font-bold">Admin Login</h2>
                <p class="text-sm opacity-90"><?php echo $config['site_name']; ?></p>
            </div>
            
            <div class="p-8">
                <?php if($error): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <i class="fas fa-exclamation-circle mr-2"></i> <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-user mr-2"></i> Username
                        </label>
                        <input type="text" name="username" required 
                               class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-primary">
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-lock mr-2"></i> Password
                        </label>
                        <input type="password" name="password" required 
                               class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-primary">
                    </div>
                    
                    <button type="submit" class="btn-primary w-full text-white py-3 rounded-lg font-semibold transition">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login to Dashboard
                    </button>
                </form>
                
                <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-600 text-center">
                        <i class="fas fa-info-circle mr-1"></i> Demo Credentials:<br>
                        <strong>Username:</strong> admin | <strong>Password:</strong> admin123
                    </p>
                </div>
                
                <p class="text-center text-sm text-gray-500 mt-6">
                    <a href="/" class="text-primary hover:underline">
                        <i class="fas fa-arrow-left mr-1"></i> Back to Website
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
