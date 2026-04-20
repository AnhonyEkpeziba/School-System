<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$page_title = 'Dashboard';
include '../includes/header.php';
?>

<div class="container mx-auto px-4 py-12">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold text-primary mb-6">Admin Dashboard</h1>
        
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="bg-blue-50 p-6 rounded-lg">
                <h3 class="text-2xl font-bold text-blue-600">147</h3>
                <p class="text-gray-600">Total Applications</p>
            </div>
            <div class="bg-yellow-50 p-6 rounded-lg">
                <h3 class="text-2xl font-bold text-yellow-600">89</h3>
                <p class="text-gray-600">Pending Review</p>
            </div>
            <div class="bg-green-50 p-6 rounded-lg">
                <h3 class="text-2xl font-bold text-green-600">42</h3>
                <p class="text-gray-600">Accepted Students</p>
            </div>
        </div>
        
        <div class="border-t pt-6">
            <h2 class="text-xl font-bold mb-4">Recent Applications</h2>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Date</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2">John Doe</td>
                        <td class="px-4 py-2">john@example.com</td>
                        <td class="px-4 py-2">2025-01-15</td>
                        <td class="px-4 py-2"><span class="bg-yellow-100 px-2 py-1 rounded">Pending</span></td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">Jane Smith</td>
                        <td class="px-4 py-2">jane@example.com</td>
                        <td class="px-4 py-2">2025-01-14</td>
                        <td class="px-4 py-2"><span class="bg-green-100 px-2 py-1 rounded">Accepted</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="mt-6 text-center">
            <a href="logout.php" class="text-red-600 hover:underline">Logout</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>