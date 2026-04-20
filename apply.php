<?php
$page_title = 'Online Application';
include 'includes/header.php';

$success = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $class = $_POST['class'] ?? '';
    
    if (empty($fullname) || empty($email) || empty($phone)) {
        $error = "Please fill in all required fields.";
    } else {
        $success = "Application submitted successfully! You will receive a confirmation email within 48 hours.";
    }
}
?>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-primary">Online Application Form</h1>
            <p class="text-gray-600 mt-2"><?php echo $config['application']['academic_year'] ?? '2025/2026'; ?> Academic Session</p>
        </div>
        
        <?php if($success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6"><i class="fas fa-check-circle mr-2"></i> <?php echo $success; ?></div>
        <?php endif; ?>
        
        <?php if($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6"><i class="fas fa-exclamation-circle mr-2"></i> <?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="bg-white rounded-lg shadow-lg p-8">
            <form method="POST">
                <div class="grid md:grid-cols-2 gap-6">
                    <div><label class="block text-gray-700 font-medium mb-2">Full Name *</label><input type="text" name="fullname" required class="w-full border border-gray-300 rounded-lg p-3"></div>
                    <div><label class="block text-gray-700 font-medium mb-2">Date of Birth *</label><input type="date" name="dob" required class="w-full border border-gray-300 rounded-lg p-3"></div>
                    <div><label class="block text-gray-700 font-medium mb-2">Email Address *</label><input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-3"></div>
                    <div><label class="block text-gray-700 font-medium mb-2">Phone Number *</label><input type="tel" name="phone" required class="w-full border border-gray-300 rounded-lg p-3"></div>
                    <div><label class="block text-gray-700 font-medium mb-2">Applying for Class *</label><select name="class" required class="w-full border border-gray-300 rounded-lg p-3"><option value="">Select Class</option><option value="JSS1">JSS 1</option><option value="JSS2">JSS 2</option><option value="JSS3">JSS 3</option><option value="SS1">SS 1</option><option value="SS2">SS 2</option><option value="SS3">SS 3</option></select></div>
                    <div><label class="block text-gray-700 font-medium mb-2">Gender *</label><select name="gender" required class="w-full border border-gray-300 rounded-lg p-3"><option value="">Select Gender</option><option value="Male">Male</option><option value="Female">Female</option></select></div>
                    <div class="md:col-span-2"><label class="block text-gray-700 font-medium mb-2">Address *</label><textarea name="address" required rows="2" class="w-full border border-gray-300 rounded-lg p-3"></textarea></div>
                    <div class="md:col-span-2"><label class="block text-gray-700 font-medium mb-2">Last School Attended</label><input type="text" name="last_school" class="w-full border border-gray-300 rounded-lg p-3"></div>
                    <div class="md:col-span-2"><label class="block text-gray-700 font-medium mb-2">Why do you wish to join our seminary? *</label><textarea name="motivation" required rows="4" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Please explain your motivation for seeking priestly formation..."></textarea></div>
                </div>
                
                <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                    <label class="flex items-start gap-3 cursor-pointer"><input type="checkbox" name="terms" required class="mt-1"><span class="text-sm">I confirm that all information provided is true and correct</span></label>
                </div>
                
                <button type="submit" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-primary-dark transition mt-6">Submit Application</button>
            </form>
            
            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                <p class="text-sm text-blue-800"><i class="fas fa-info-circle mr-2"></i> Application Fee: ₦5,000. Payment details will be sent to your email after submission.</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
