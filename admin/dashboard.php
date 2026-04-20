<?php
session_start();
require_once '../config/functions.php';

// Check authentication
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$page = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - <?php echo getConfig('site_name'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: <?php echo getConfig('colors.primary'); ?>;
        }
        .bg-primary { background-color: var(--primary); }
        .text-primary { color: var(--primary); }
        .sidebar-item:hover { background-color: var(--primary); }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-primary text-white flex flex-col">
            <div class="p-4 border-b border-white border-opacity-20">
                <h2 class="text-xl font-bold">Admin Panel</h2>
                <p class="text-sm opacity-75"><?php echo getConfig('site_name'); ?></p>
            </div>
            
            <nav class="flex-1 p-4">
                <a href="?page=dashboard" class="sidebar-item block py-2 px-4 rounded mb-2 <?php echo $page == 'dashboard' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10'; ?>">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="?page=applications" class="sidebar-item block py-2 px-4 rounded mb-2 <?php echo $page == 'applications' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10'; ?>">
                    <i class="fas fa-file-alt mr-2"></i> Applications
                </a>
                <a href="?page=students" class="sidebar-item block py-2 px-4 rounded mb-2 <?php echo $page == 'students' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10'; ?>">
                    <i class="fas fa-users mr-2"></i> Students
                </a>
                <a href="?page=settings" class="sidebar-item block py-2 px-4 rounded mb-2 <?php echo $page == 'settings' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10'; ?>">
                    <i class="fas fa-cog mr-2"></i> Settings
                </a>
                <a href="logout.php" class="sidebar-item block py-2 px-4 rounded hover:bg-white hover:bg-opacity-10">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </nav>
            
            <div class="p-4 border-t border-white border-opacity-20 text-xs opacity-75">
                Logged in as: <?php echo $_SESSION['admin_username']; ?>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <div class="bg-white shadow-sm p-4">
                <h1 class="text-2xl font-bold text-gray-800">
                    <?php 
                        switch($page) {
                            case 'dashboard': echo 'Dashboard'; break;
                            case 'applications': echo 'Applications Management'; break;
                            case 'students': echo 'Students Management'; break;
                            case 'settings': echo 'System Settings'; break;
                            default: echo 'Dashboard';
                        }
                    ?>
                </h1>
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <?php if($page == 'dashboard'): ?>
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500">Total Applications</p>
                                    <h3 class="text-2xl font-bold">147</h3>
                                    <p class="text-sm text-green-600">+12% from last month</p>
                                </div>
                                <i class="fas fa-file-alt text-4xl text-primary opacity-50"></i>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500">Pending Review</p>
                                    <h3 class="text-2xl font-bold">89</h3>
                                    <p class="text-sm text-yellow-600">Needs attention</p>
                                </div>
                                <i class="fas fa-clock text-4xl text-yellow-500 opacity-50"></i>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500">Accepted Students</p>
                                    <h3 class="text-2xl font-bold">42</h3>
                                    <p class="text-sm text-green-600">Ready for enrollment</p>
                                </div>
                                <i class="fas fa-check-circle text-4xl text-green-500 opacity-50"></i>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500">Revenue Generated</p>
                                    <h3 class="text-2xl font-bold">₦735,000</h3>
                                    <p class="text-sm text-green-600">From application fees</p>
                                </div>
                                <i class="fas fa-money-bill-wave text-4xl text-primary opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Charts -->
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="font-bold mb-4">Applications by Program</h3>
                            <canvas id="programsChart" height="200"></canvas>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="font-bold mb-4">Monthly Applications</h3>
                            <canvas id="monthlyChart" height="200"></canvas>
                        </div>
                    </div>
                    
                    <!-- Recent Applications -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h3 class="font-bold">Recent Applications</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Application No.</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Class</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <tr>
                                        <td class="px-6 py-4">APP-2025-001</td>
                                        <td class="px-6 py-4">John Okafor</td>
                                        <td class="px-6 py-4">JSS 1</td>
                                        <td class="px-6 py-4">2025-01-15</td>
                                        <td class="px-6 py-4"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Pending</span></td>
                                        <td class="px-6 py-4">
                                            <button class="text-primary hover:underline text-sm">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4">APP-2025-002</td>
                                        <td class="px-6 py-4">Michael Eze</td>
                                        <td class="px-6 py-4">SS 1</td>
                                        <td class="px-6 py-4">2025-01-14</td>
                                        <td class="px-6 py-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Accepted</span></td>
                                        <td class="px-6 py-4">
                                            <button class="text-primary hover:underline text-sm">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4">APP-2025-003</td>
                                        <td class="px-6 py-4">Peter Obi</td>
                                        <td class="px-6 py-4">JSS 2</td>
                                        <td class="px-6 py-4">2025-01-13</td>
                                        <td class="px-6 py-4"><span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Rejected</span></td>
                                        <td class="px-6 py-4">
                                            <button class="text-primary hover:underline text-sm">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <script>
                        // Program chart
                        const ctx1 = document.getElementById('programsChart').getContext('2d');
                        new Chart(ctx1, {
                            type: 'doughnut',
                            data: {
                                labels: ['JSS 1', 'JSS 2', 'JSS 3', 'SS 1', 'SS 2', 'SS 3'],
                                datasets: [{
                                    data: [45, 30, 25, 60, 40, 35],
                                    backgroundColor: ['#065f46', '#10b981', '#34d399', '#f59e0b', '#fbbf24', '#fcd34d']
                                }]
                            }
                        });
                        
                        // Monthly chart
                        const ctx2 = document.getElementById('monthlyChart').getContext('2d');
                        new Chart(ctx2, {
                            type: 'line',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                                datasets: [{
                                    label: 'Applications',
                                    data: [12, 19, 25, 32, 45, 58],
                                    borderColor: '#065f46',
                                    tension: 0.4
                                }]
                            }
                        });
                    </script>
                    
                <?php elseif($page == 'applications'): ?>
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h3 class="font-bold">All Applications</h3>
                            <div class="flex space-x-2">
                                <select class="border rounded-lg px-3 py-1">
                                    <option>All Status</option>
                                    <option>Pending</option>
                                    <option>Accepted</option>
                                    <option>Rejected</option>
                                </select>
                                <input type="search" placeholder="Search..." class="border rounded-lg px-3 py-1">
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left">ID</th>
                                        <th class="px-6 py-3 text-left">Name</th>
                                        <th class="px-6 py-3 text-left">Class</th>
                                        <th class="px-6 py-3 text-left">Date</th>
                                        <th class="px-6 py-3 text-left">Status</th>
                                        <th class="px-6 py-3 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i = 1; $i <= 10; $i++): ?>
                                    <tr class="border-b">
                                        <td class="px-6 py-4"><?php echo $i; ?></td>
                                        <td class="px-6 py-4">Applicant <?php echo $i; ?></td>
                                        <td class="px-6 py-4">JSS 1</td>
                                        <td class="px-6 py-4">2025-01-<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></td>
                                        <td class="px-6 py-4">
                                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Pending</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button class="text-primary hover:underline mr-2">View</button>
                                            <button class="text-green-600 hover:underline mr-2">Accept</button>
                                            <button class="text-red-600 hover:underline">Reject</button>
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-6 border-t">
                            <div class="flex justify-between items-center">
                                <p class="text-sm text-gray-600">Showing 1-10 of 147 applications</p>
                                <div class="flex space-x-2">
                                    <button class="px-3 py-1 border rounded">Previous</button>
                                    <button class="px-3 py-1 bg-primary text-white rounded">1</button>
                                    <button class="px-3 py-1 border rounded">2</button>
                                    <button class="px-3 py-1 border rounded">3</button>
                                    <button class="px-3 py-1 border rounded">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?php elseif($page == 'settings'): ?>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="font-bold mb-4">System Settings (Demo)</h3>
                        <p class="text-gray-600 mb-6">In the full version, you can edit all settings from this panel.</p>
                        
                        <div class="space-y-4">
                            <div class="border rounded-lg p-4">
                                <h4 class="font-semibold mb-2">General Settings</h4>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm">Site Name</label>
                                        <input type="text" value="<?php echo getConfig('site_name'); ?>" class="w-full border rounded px-3 py-2">
                                    </div>
                                    <div>
                                        <label class="block text-sm">Site Tagline</label>
                                        <input type="text" value="<?php echo getConfig('site_tagline'); ?>" class="w-full border rounded px-3 py-2">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4">
                                <h4 class="font-semibold mb-2">Application Settings</h4>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm">Application Fee</label>
                                        <input type="text" value="<?php echo getConfig('application.fee'); ?>" class="w-full border rounded px-3 py-2">
                                    </div>
                                    <div>
                                        <label class="block text-sm">Academic Year</label>
                                        <input type="text" value="<?php echo getConfig('application.academic_year'); ?>" class="w-full border rounded px-3 py-2">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <p class="text-blue-800">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    These settings are for demonstration. In the production version, all settings can be edited here and saved to the database.
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>