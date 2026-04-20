<?php
session_start();
$page_title = 'Admin Login';
include '../includes/header.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Demo credentials
    if ($username == 'admin' && $password == 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold text-primary mb-6 text-center">Admin Login</h1>
        
        <?php if($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" name="username" required class="w-full border border-gray-300 rounded-lg p-3">
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg p-3">
            </div>
            
            <button type="submit" class="btn-primary w-full text-center">Login</button>
        </form>
        
        <div class="mt-4 p-3 bg-gray-100 rounded text-center">
            <p class="text-sm">Demo Credentials:</p>
            <p class="text-sm font-mono">Username: admin | Password: admin123</p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>