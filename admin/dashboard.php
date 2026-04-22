<?php
session_start();
require_once '../config/site-config.php';
$config = require '../config/site-config.php';

// Check authentication
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

// Get current page
$page = $_GET['page'] ?? 'dashboard';

// Mock data for demo
$applications = [
    ['id' => 'APP-2025-001', 'name' => 'John Okafor', 'class' => 'JSS 1', 'date' => '2025-01-15', 'status' => 'pending', 'email' => 'john@example.com', 'phone' => '08031234567'],
    ['id' => 'APP-2025-002', 'name' => 'Michael Eze', 'class' => 'SS 1', 'date' => '2025-01-14', 'status' => 'accepted', 'email' => 'michael@example.com', 'phone' => '08032345678'],
    ['id' => 'APP-2025-003', 'name' => 'Peter Obi', 'class' => 'JSS 2', 'date' => '2025-01-13', 'status' => 'pending', 'email' => 'peter@example.com', 'phone' => '08033456789'],
    ['id' => 'APP-2025-004', 'name' => 'David Okonkwo', 'class' => 'SS 2', 'date' => '2025-01-12', 'status' => 'reviewed', 'email' => 'david@example.com', 'phone' => '08034567890'],
    ['id' => 'APP-2025-005', 'name' => 'James Nnamdi', 'class' => 'JSS 3', 'date' => '2025-01-11', 'status' => 'pending', 'email' => 'james@example.com', 'phone' => '08035678901'],
];

$students = [
    ['id' => 'STU-2024-001', 'name' => 'Emmanuel Chukwu', 'class' => 'SS 2', 'parent' => 'Mr. Chukwu', 'phone' => '08036789012', 'status' => 'active'],
    ['id' => 'STU-2024-002', 'name' => 'Gabriel Okeke', 'class' => 'JSS 3', 'parent' => 'Mrs. Okeke', 'phone' => '08037890123', 'status' => 'active'],
    ['id' => 'STU-2024-003', 'name' => 'Raphael Ugwu', 'class' => 'SS 1', 'parent' => 'Mr. Ugwu', 'phone' => '08038901234', 'status' => 'active'],
];

$stats = [
    'total_applications' => 147,
    'pending' => 89,
    'accepted' => 42,
    'rejected' => 16,
    'total_students' => 250,
    'total_revenue' => 735000
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - <?php echo $config['site_name']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-primary { background-color: <?php echo $config['colors']['primary']; ?>; }
        .bg-primary-dark { background-color: <?php echo $config['colors']['primary_dark']; ?>; }
        .text-primary { color: <?php echo $config['colors']['primary']; ?>; }
        .border-primary { border-color: <?php echo $config['colors']['primary']; ?>; }
        .hover\:bg-primary-dark:hover { background-color: <?php echo $config['colors']['primary_dark']; ?>; }
        .sidebar-item:hover { background-color: <?php echo $config['colors']['primary']; ?>; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
<div id="sidebar"
     class="fixed lg:static z-40 w-64 bg-primary text-white flex flex-col h-full
            transform -translate-x-full lg:translate-x-0 transition-transform duration-200">
            <div class="p-4 border-b border-white border-opacity-20">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-church text-2xl"></i>
                    <div>
                        <h2 class="font-bold">Admin Panel</h2>
                        <p class="text-xs opacity-75"><?php echo $config['site_name']; ?></p>
                    </div>
                </div>
            </div>
            
            <nav class="flex-1 p-4">
                <a href="?page=dashboard" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded mb-2 transition <?php echo $page == 'dashboard' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10'; ?>">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="?page=applications" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded mb-2 transition <?php echo $page == 'applications' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10'; ?>">
                    <i class="fas fa-file-alt w-5"></i>
                    <span>Applications</span>
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded"><?php echo $stats['pending']; ?></span>
                </a>
                <a href="?page=students" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded mb-2 transition <?php echo $page == 'students' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10'; ?>">
                    <i class="fas fa-users w-5"></i>
                    <span>Students</span>
                </a>
                <a href="?page=payments" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded mb-2 transition <?php echo $page == 'payments' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10'; ?>">
                    <i class="fas fa-money-bill-wave w-5"></i>
                    <span>Payments</span>
                </a>
                <a href="?page=settings" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded mb-2 transition <?php echo $page == 'settings' ? 'bg-white bg-opacity-20' : 'hover:bg-white hover:bg-opacity-10'; ?>">
                    <i class="fas fa-cog w-5"></i>
                    <span>Settings</span>
                </a>
                <a href="?logout=1" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded mt-8 hover:bg-red-600 transition">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </nav>
            
            <div class="p-4 border-t border-white border-opacity-20 text-xs opacity-75">
                <i class="fas fa-user-circle mr-1"></i> <?php echo $_SESSION['admin_name']; ?>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto w-full">
            <!-- Mobile Top Bar -->
<div class="lg:hidden bg-white shadow px-4 py-3 flex items-center justify-between">
    <button onclick="toggleSidebar()" class="text-gray-700 text-xl">
        <i class="fas fa-bars"></i>
    </button>
    <h2 class="font-bold text-gray-800">Admin</h2>
</div>
            <!-- Top Header -->
            <div class="bg-white shadow-sm px-4 sm:px-6 py-4">
                <h1 class="text-2xl font-bold text-gray-800">
                    <?php 
                        switch($page) {
                            case 'dashboard': echo 'Dashboard'; break;
                            case 'applications': echo 'Applications Management'; break;
                            case 'students': echo 'Students Management'; break;
                            case 'payments': echo 'Payment Management'; break;
                            case 'settings': echo 'System Settings'; break;
                            default: echo 'Dashboard';
                        }
                    ?>
                </h1>
                <p class="text-gray-500 text-sm">Welcome back, <?php echo $_SESSION['admin_name']; ?></p>
            </div>
            
            <div class="p-6">
                <?php if($page == 'dashboard'): ?>
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-primary">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-500 text-sm">Total Applications</p>
                                    <h3 class="text-3xl font-bold text-gray-800"><?php echo $stats['total_applications']; ?></h3>
                                    <p class="text-green-600 text-xs mt-2"><i class="fas fa-arrow-up"></i> +12% from last month</p>
                                </div>
                                <i class="fas fa-file-alt text-4xl text-primary opacity-50"></i>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-500 text-sm">Pending Review</p>
                                    <h3 class="text-3xl font-bold text-gray-800"><?php echo $stats['pending']; ?></h3>
                                    <p class="text-yellow-600 text-xs mt-2"><i class="fas fa-clock"></i> Needs attention</p>
                                </div>
                                <i class="fas fa-clock text-4xl text-yellow-500 opacity-50"></i>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-500 text-sm">Accepted Students</p>
                                    <h3 class="text-3xl font-bold text-gray-800"><?php echo $stats['accepted']; ?></h3>
                                    <p class="text-green-600 text-xs mt-2"><i class="fas fa-check"></i> Ready for enrollment</p>
                                </div>
                                <i class="fas fa-check-circle text-4xl text-green-500 opacity-50"></i>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-500 text-sm">Revenue Generated</p>
                                    <h3 class="text-3xl font-bold text-gray-800">₦<?php echo number_format($stats['total_revenue']); ?></h3>
                                    <p class="text-blue-600 text-xs mt-2"><i class="fas fa-chart-line"></i> From application fees</p>
                                </div>
                                <i class="fas fa-money-bill-wave text-4xl text-blue-500 opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Charts -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="font-bold text-gray-800 mb-4">Applications by Program</h3>
                            <canvas id="programsChart" height="200"></canvas>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="font-bold text-gray-800 mb-4">Monthly Applications</h3>
                            <canvas id="monthlyChart" height="200"></canvas>
                        </div>
                    </div>
                    
                    <!-- Recent Applications -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h3 class="font-bold text-gray-800">Recent Applications</h3>
                            <a href="?page=applications" class="text-primary text-sm hover:underline">View All →</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Class</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <?php foreach(array_slice($applications, 0, 5) as $app): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm"><?php echo $app['id']; ?></td>
                                        <td class="px-6 py-4 font-medium"><?php echo $app['name']; ?></td>
                                        <td class="px-6 py-4 text-sm"><?php echo $app['class']; ?></td>
                                        <td class="px-6 py-4 text-sm"><?php echo date('M d, Y', strtotime($app['date'])); ?></td>
                                        <td class="px-6 py-4">
                                            <?php if($app['status'] == 'pending'): ?>
                                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs"><i class="fas fa-clock mr-1"></i> Pending</span>
                                            <?php elseif($app['status'] == 'accepted'): ?>
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs"><i class="fas fa-check mr-1"></i> Accepted</span>
                                            <?php else: ?>
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs"><i class="fas fa-eye mr-1"></i> Reviewed</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button onclick="viewApplication('<?php echo $app['id']; ?>')" class="text-primary hover:underline text-sm mr-2">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <script>
                        // Programs Chart
                        const ctx1 = document.getElementById('programsChart').getContext('2d');
                        new Chart(ctx1, {
                            type: 'doughnut',
                            data: {
                                labels: ['JSS 1', 'JSS 2', 'JSS 3', 'SS 1', 'SS 2', 'SS 3'],
                                datasets: [{
                                    data: [45, 30, 25, 60, 40, 35],
                                    backgroundColor: ['#065f46', '#10b981', '#34d399', '#f59e0b', '#fbbf24', '#fcd34d'],
                                    borderWidth: 0
                                }]
                            },
                            options: { responsive: true, maintainAspectRatio: true }
                        });
                        
                        // Monthly Chart
                        const ctx2 = document.getElementById('monthlyChart').getContext('2d');
                        new Chart(ctx2, {
                            type: 'line',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                datasets: [{
                                    label: 'Applications',
                                    data: [12, 19, 25, 32, 45, 58, 72, 68, 85, 92, 78, 95],
                                    borderColor: '#065f46',
                                    backgroundColor: 'rgba(6, 95, 70, 0.1)',
                                    tension: 0.4,
                                    fill: true
                                }]
                            },
                            options: { responsive: true, maintainAspectRatio: true }
                        });
                        
                        function viewApplication(id) {
                            alert('Viewing application: ' + id + '\n\nFull application details would appear here in the complete system.');
                        }
                    </script>
                    
                <?php elseif($page == 'applications'): ?>
                    <!-- Applications Management -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <div class="flex flex-wrap justify-between items-center gap-4">
                                <h3 class="font-bold text-gray-800">All Applications</h3>
                                <div class="flex space-x-2">
                                    <select id="filterStatus" class="border rounded-lg px-3 py-2 text-sm">
                                        <option value="all">All Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="accepted">Accepted</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                    <input type="search" id="searchApp" placeholder="Search by name..." class="border rounded-lg px-3 py-2 text-sm w-64">
                                    <button onclick="exportData()" class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-primary-dark">
                                        <i class="fas fa-download mr-1">Export</i> 
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Class</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <?php foreach($applications as $app): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm"><?php echo $app['id']; ?></td>
                                        <td class="px-6 py-4 font-medium"><?php echo $app['name']; ?></td>
                                        <td class="px-6 py-4 text-sm"><?php echo $app['email']; ?></td>
                                        <td class="px-6 py-4 text-sm"><?php echo $app['phone']; ?></td>
                                        <td class="px-6 py-4 text-sm"><?php echo $app['class']; ?></td>
                                        <td class="px-6 py-4 text-sm"><?php echo date('M d, Y', strtotime($app['date'])); ?></td>
                                        <td class="px-6 py-4">
                                            <select class="status-select text-xs px-2 py-1 rounded border" data-id="<?php echo $app['id']; ?>">
                                                <option value="pending" <?php echo $app['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                <option value="reviewed" <?php echo $app['status'] == 'reviewed' ? 'selected' : ''; ?>>Reviewed</option>
                                                <option value="accepted" <?php echo $app['status'] == 'accepted' ? 'selected' : ''; ?>>Accepted</option>
                                                <option value="rejected" <?php echo $app['status'] == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button onclick="viewApplication('<?php echo $app['id']; ?>')" class="text-primary hover:underline text-sm mr-2">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button onclick="sendEmail('<?php echo $app['email']; ?>')" class="text-blue-600 hover:underline text-sm">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-6 border-t">
                            <div class="flex justify-between items-center">
                                <p class="text-sm text-gray-600">Showing <?php echo count($applications); ?> of <?php echo $stats['total_applications']; ?> applications</p>
                                <div class="flex space-x-2">
                                    <button class="px-3 py-1 border rounded hover:bg-gray-50">Previous</button>
                                    <button class="px-3 py-1 bg-primary text-white rounded">1</button>
                                    <button class="px-3 py-1 border rounded hover:bg-gray-50">2</button>
                                    <button class="px-3 py-1 border rounded hover:bg-gray-50">3</button>
                                    <button class="px-3 py-1 border rounded hover:bg-gray-50">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?php elseif($page == 'students'): ?>
                    <!-- Students Management -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h3 class="font-bold text-gray-800">Enrolled Students</h3>
                            <button onclick="addStudent()" class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-primary-dark">
                                <i class="fas fa-plus mr-1"></i> Add Student
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Class</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Parent/Guardian</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <?php foreach($students as $student): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm"><?php echo $student['id']; ?></td>
                                        <td class="px-6 py-4 font-medium"><?php echo $student['name']; ?></td>
                                        <td class="px-6 py-4 text-sm"><?php echo $student['class']; ?></td>
                                        <td class="px-6 py-4 text-sm"><?php echo $student['parent']; ?></td>
                                        <td class="px-6 py-4 text-sm"><?php echo $student['phone']; ?></td>
                                        <td class="px-6 py-4">
                                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">
                                                <i class="fas fa-circle text-xs mr-1"></i> <?php echo ucfirst($student['status']); ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button onclick="viewStudent('<?php echo $student['id']; ?>')" class="text-primary hover:underline text-sm mr-2">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button onclick="editStudent('<?php echo $student['id']; ?>')" class="text-blue-600 hover:underline text-sm mr-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button onclick="viewResults('<?php echo $student['id']; ?>')" class="text-green-600 hover:underline text-sm">
                                                <i class="fas fa-chart-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                <?php elseif($page == 'payments'): ?>
                    <!-- Payments Management -->
                    <div class="grid lg:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Total Collected</p>
                                    <h3 class="text-2xl font-bold text-gray-800">₦735,000</h3>
                                </div>
                                <i class="fas fa-wallet text-3xl text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Pending Payments</p>
                                    <h3 class="text-2xl font-bold text-gray-800">₦245,000</h3>
                                </div>
                                <i class="fas fa-clock text-3xl text-yellow-500"></i>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Total Transactions</p>
                                    <h3 class="text-2xl font-bold text-gray-800">147</h3>
                                </div>
                                <i class="fas fa-receipt text-3xl text-green-500"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h3 class="font-bold text-gray-800">Recent Payments</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Receipt No</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment Method</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <tr><td class="px-6 py-4">RCP-2025-001</td><td class="px-6 py-4">John Okafor</td><td class="px-6 py-4">₦75,000</td><td class="px-6 py-4">Bank Transfer</td><td class="px-6 py-4">Jan 20, 2025</td><td class="px-6 py-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Completed</span></td></tr>
                                    <tr><td class="px-6 py-4">RCP-2025-002</td><td class="px-6 py-4">Michael Eze</td><td class="px-6 py-4">₦75,000</td><td class="px-6 py-4">Card</td><td class="px-6 py-4">Jan 18, 2025</td><td class="px-6 py-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Completed</span></td></tr>
                                    <tr><td class="px-6 py-4">RCP-2025-003</td><td class="px-6 py-4">Peter Obi</td><td class="px-6 py-4">₦75,000</td><td class="px-6 py-4">Cash</td><td class="px-6 py-4">Jan 15, 2025</td><td class="px-6 py-4"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Pending</span></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                <?php elseif($page == 'settings'): ?>
                    <!-- Settings -->
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="font-bold text-gray-800 mb-4">General Settings</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Site Name</label>
                                    <input type="text" value="<?php echo $config['site_name']; ?>" class="w-full border rounded-lg p-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Site Tagline</label>
                                    <input type="text" value="<?php echo $config['site_tagline']; ?>" class="w-full border rounded-lg p-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Contact Email</label>
                                    <input type="email" value="<?php echo $config['contact']['email']; ?>" class="w-full border rounded-lg p-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Contact Phone</label>
                                    <input type="text" value="<?php echo $config['contact']['phone']; ?>" class="w-full border rounded-lg p-2">
                                </div>
                                <button class="bg-primary text-white px-4 py-2 rounded-lg w-full hover:bg-primary-dark">Save Changes</button>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="font-bold text-gray-800 mb-4">Application Settings</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Application Fee (₦)</label>
                                    <input type="number" value="5000" class="w-full border rounded-lg p-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Academic Year</label>
                                    <input type="text" value="2025/2026" class="w-full border rounded-lg p-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Application Open Date</label>
                                    <input type="date" value="2025-01-15" class="w-full border rounded-lg p-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Application Close Date</label>
                                    <input type="date" value="2025-06-30" class="w-full border rounded-lg p-2">
                                </div>
                                <button class="bg-primary text-white px-4 py-2 rounded-lg w-full hover:bg-primary-dark">Save Changes</button>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="font-bold text-gray-800 mb-4">Color Settings</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Primary Color</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="color" value="<?php echo $config['colors']['primary']; ?>" class="w-12 h-10 border rounded">
                                        <input type="text" value="<?php echo $config['colors']['primary']; ?>" class="flex-1 border rounded-lg p-2">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Secondary Color</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="color" value="<?php echo $config['colors']['secondary']; ?>" class="w-12 h-10 border rounded">
                                        <input type="text" value="<?php echo $config['colors']['secondary']; ?>" class="flex-1 border rounded-lg p-2">
                                    </div>
                                </div>
                                <button class="bg-primary text-white px-4 py-2 rounded-lg w-full hover:bg-primary-dark">Save Changes</button>
                            </div>
                        </div>
                        
                        <div class="bg-blue-50 rounded-lg p-6">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                                <div>
                                    <h3 class="font-bold text-blue-800 mb-1">Demo Mode Notice</h3>
                                    <p class="text-sm text-blue-700">This is a demonstration version. In the full system, all settings can be saved to the database and will persist across sessions. The full system includes:</p>
                                    <ul class="text-sm text-blue-700 mt-2 list-disc list-inside">
                                        <li>Database storage for all settings</li>
                                        <li>Real application management</li>
                                        <li>Payment gateway integration</li>
                                        <li>Email notification system</li>
                                        <li>Student and parent portals</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <script>
        function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('-translate-x-full');
}
        
        // Status update
        document.querySelectorAll('.status-select').forEach(select => {
            select.addEventListener('change', function() {
                const id = this.dataset.id;
                const status = this.value;
                alert(`Application ${id} status updated to: ${status.toUpperCase()}\n\nIn the full system, this would be saved to the database.`);
            });
        });
        
        // Filter applications
        document.getElementById('filterStatus')?.addEventListener('change', function() {
            alert(`Filtering by: ${this.value}\n\nIn the full system, this would filter the applications table.`);
        });
        
        // Search applications
        document.getElementById('searchApp')?.addEventListener('input', function() {
            console.log(`Searching: ${this.value}`);
        });
        
        function exportData() {
            alert('Export functionality would be available in the full system.\n\nWould export applications as CSV/Excel.');
        }
        
        function sendEmail(email) {
            alert(`Send email to: ${email}\n\nIn the full system, this would open an email composer.`);
        }
        
        function addStudent() {
            alert('Add Student Form\n\nIn the full system, this would open a form to add new students.');
        }
        
        function viewStudent(id) {
            alert(`Viewing Student: ${id}\n\nFull student profile would appear here.`);
        }
        
        function editStudent(id) {
            alert(`Editing Student: ${id}\n\nEdit form would appear here.`);
        }
        
        function viewResults(id) {
            alert(`Viewing Results for Student: ${id}\n\nAcademic results would appear here.`);
        }
    </script>
</body>
</html>
