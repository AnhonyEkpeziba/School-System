<?php
$page_title = 'Online Application';
include 'includes/header.php';

$success = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simple validation
    if (empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['phone'])) {
        $error = "Please fill in all required fields.";
    } else {
        // In demo mode, just show success
        $success = "Application submitted successfully! You will be contacted soon.";
        
        // You can add email sending here later
    }
}
?>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold text-primary mb-4">Online Application Form</h1>
        <p class="text-gray-600 mb-6">Please fill in your details to apply for admission</p>
        
        <?php if($success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        
        <?php if($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Full Name *</label>
                <input type="text" name="fullname" required class="w-full border border-gray-300 rounded-lg p-3">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Email Address *</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-3">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Phone Number *</label>
                <input type="tel" name="phone" required class="w-full border border-gray-300 rounded-lg p-3">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Applying for Class</label>
                <select name="class" class="w-full border border-gray-300 rounded-lg p-3">
                    <option value="JSS1">JSS 1</option>
                    <option value="JSS2">JSS 2</option>
                    <option value="SS1">SS 1</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Message / Motivation</label>
                <textarea name="message" rows="4" class="w-full border border-gray-300 rounded-lg p-3"></textarea>
            </div>
            
            <button type="submit" class="btn-primary w-full text-center">Submit Application</button>
        </form>
        
        <p class="text-sm text-gray-500 mt-4 text-center">
            Application Fee: ₦5,000 (To be paid after submission)
        </p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>