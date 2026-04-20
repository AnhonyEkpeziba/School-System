<?php
require_once 'config/site-config.php';
$config = require 'config/site-config.php';

// Demo mode notice
if ($config['demo_mode']) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['site_name']; ?> - Online Application System</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary: <?php echo $config['colors']['primary']; ?>;
            --primary-dark: <?php echo $config['colors']['primary_dark']; ?>;
            --primary-light: <?php echo $config['colors']['primary_light']; ?>;
            --secondary: <?php echo $config['colors']['secondary']; ?>;
        }
        
        .bg-primary { background-color: var(--primary); }
        .bg-primary-dark { background-color: var(--primary-dark); }
        .bg-primary-light { background-color: var(--primary-light); }
        .text-primary { color: var(--primary); }
        .border-primary { border-color: var(--primary); }
        .hover\:bg-primary-dark:hover { background-color: var(--primary-dark); }
        
        .form-step { display: none; animation: fadeIn 0.5s ease; }
        .form-step.active { display: block; }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .step-indicator {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .step-indicator.active {
            background-color: var(--primary);
            color: white;
            transform: scale(1.05);
        }
        
        .step-indicator.completed {
            background-color: var(--primary-light);
            color: white;
        }
        
        .required-star { color: #dc2626; margin-left: 2px; }
        
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Demo Banner -->
    <?php if ($config['demo_mode']): ?>
    <div class="bg-yellow-500 text-black text-center py-2 px-4 no-print">
        <i class="fas fa-info-circle"></i> 
        <?php echo $config['demo_message']; ?> - 
        <button onclick="this.parentElement.style.display='none'" class="underline">Hide</button>
    </div>
    <?php endif; ?>
    
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50 no-print">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-primary"><?php echo $config['site_name']; ?></h1>
                    <p class="text-sm text-gray-600"><?php echo $config['site_tagline']; ?></p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-phone-alt"></i> <?php echo $config['contact']['phone']; ?><br>
                        <i class="fas fa-envelope"></i> <?php echo $config['contact']['email']; ?>
                    </p>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-primary-dark text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-2">Online Application Form</h1>
            <p class="text-xl opacity-90">Academic Year <?php echo $config['application']['academic_year']; ?></p>
            <p class="mt-4">
                <i class="fas fa-calendar-alt"></i> Application Period: 
                <?php echo date('F j, Y', strtotime($config['application']['start_date'])); ?> - 
                <?php echo date('F j, Y', strtotime($config['application']['end_date'])); ?>
            </p>
        </div>
    </section>
    
    <!-- Progress Bar -->
    <div class="bg-white border-b shadow-sm sticky top-[73px] z-40 no-print">
        <div class="container mx-auto px-4 py-4">
            <div class="max-w-4xl mx-auto">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-500" id="stepLabel">Step 1 of 7</span>
                    <span class="text-sm font-medium text-primary" id="progressPercent">0%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-primary rounded-full h-2 transition-all duration-500" id="progressBar" style="width: 0%"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            
            <!-- Step Indicators -->
            <div class="grid grid-cols-4 md:grid-cols-7 gap-2 mb-8 no-print">
                <div class="step-indicator text-center p-2 rounded-lg bg-gray-100 text-gray-600 text-sm font-medium" data-step="1">
                    <i class="fas fa-user"></i> <span class="hidden md:inline">Personal</span>
                </div>
                <div class="step-indicator text-center p-2 rounded-lg bg-gray-100 text-gray-600 text-sm font-medium" data-step="2">
                    <i class="fas fa-church"></i> <span class="hidden md:inline">Parish</span>
                </div>
                <div class="step-indicator text-center p-2 rounded-lg bg-gray-100 text-gray-600 text-sm font-medium" data-step="3">
                    <i class="fas fa-users"></i> <span class="hidden md:inline">Parents</span>
                </div>
                <div class="step-indicator text-center p-2 rounded-lg bg-gray-100 text-gray-600 text-sm font-medium" data-step="4">
                    <i class="fas fa-graduation-cap"></i> <span class="hidden md:inline">Academic</span>
                </div>
                <div class="step-indicator text-center p-2 rounded-lg bg-gray-100 text-gray-600 text-sm font-medium" data-step="5">
                    <i class="fas fa-heartbeat"></i> <span class="hidden md:inline">Medical</span>
                </div>
                <div class="step-indicator text-center p-2 rounded-lg bg-gray-100 text-gray-600 text-sm font-medium" data-step="6">
                    <i class="fas fa-pray"></i> <span class="hidden md:inline">Vocation</span>
                </div>
                <div class="step-indicator text-center p-2 rounded-lg bg-gray-100 text-gray-600 text-sm font-medium" data-step="7">
                    <i class="fas fa-check"></i> <span class="hidden md:inline">Submit</span>
                </div>
            </div>
            
            <!-- Form -->
            <form id="applicationForm" method="POST" action="" class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <input type="hidden" name="csrf_token" value="<?php echo bin2hex(random_bytes(32)); ?>">
                
                <!-- Step 1: Personal Information -->
                <div class="form-step active p-6 md:p-8" data-step="1">
                    <h2 class="text-2xl font-bold text-primary mb-2">Personal Information</h2>
                    <p class="text-gray-500 text-sm mb-6">Please provide your basic personal details</p>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Surname <span class="required-star">*</span></label>
                            <input type="text" name="surname" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">First Name <span class="required-star">*</span></label>
                            <input type="text" name="firstname" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Middle Name</label>
                            <input type="text" name="middlename" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Date of Birth <span class="required-star">*</span></label>
                            <input type="date" name="dob" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Gender <span class="required-star">*</span></label>
                            <select name="gender" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Nationality <span class="required-star">*</span></label>
                            <input type="text" name="nationality" value="Nigerian" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Address <span class="required-star">*</span></label>
                            <textarea name="address" required rows="2" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Phone Number</label>
                            <input type="tel" name="phone" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email Address <span class="required-star">*</span></label>
                            <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                    
                    <div class="flex justify-end mt-8">
                        <button type="button" class="next-step bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">
                            Next <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Step 2: Parish/Church Information (Customizable) -->
                <div class="form-step p-6 md:p-8" data-step="2">
                    <h2 class="text-2xl font-bold text-primary mb-2"><?php echo $config['institution_type'] == 'seminary' ? 'Parish' : 'Church/Religious'; ?> Information</h2>
                    <p class="text-gray-500 text-sm mb-6">Please provide your <?php echo $config['institution_type'] == 'seminary' ? 'parish' : 'church/religious'; ?> details</p>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1"><?php echo $config['institution_type'] == 'seminary' ? 'Parish' : 'Church'; ?> Name <span class="required-star">*</span></label>
                            <input type="text" name="parish_name" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1"><?php echo $config['institution_type'] == 'seminary' ? 'Parish Priest' : 'Pastor/Minister'; ?> Name <span class="required-star">*</span></label>
                            <input type="text" name="parish_priest" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Church Address</label>
                            <textarea name="parish_address" rows="2" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Denomination/Diocese</label>
                            <input type="text" name="diocese" placeholder="e.g., Catholic Diocese, Anglican Communion" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Years as Member <span class="required-star">*</span></label>
                            <input type="number" name="years_member" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" class="prev-step bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Previous
                        </button>
                        <button type="button" class="next-step bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">
                            Next <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Step 3: Parents/Guardian Information -->
                <div class="form-step p-6 md:p-8" data-step="3">
                    <h2 class="text-2xl font-bold text-primary mb-2">Parents / Guardian Information</h2>
                    <p class="text-gray-500 text-sm mb-6">Please provide details of your parents or guardian</p>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Father's Full Name</label>
                            <input type="text" name="father_name" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Father's Phone</label>
                            <input type="tel" name="father_phone" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Mother's Full Name</label>
                            <input type="text" name="mother_name" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Mother's Phone</label>
                            <input type="tel" name="mother_phone" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Guardian Name (if different) <span class="required-star">*</span></label>
                            <input type="text" name="parent_name" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Guardian Phone <span class="required-star">*</span></label>
                            <input type="tel" name="parent_phone" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Guardian Email</label>
                            <input type="email" name="parent_email" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" class="prev-step bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Previous
                        </button>
                        <button type="button" class="next-step bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">
                            Next <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Step 4: Academic Information -->
                <div class="form-step p-6 md:p-8" data-step="4">
                    <h2 class="text-2xl font-bold text-primary mb-2">Academic Information</h2>
                    <p class="text-gray-500 text-sm mb-6">Please provide your academic background</p>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Applying for Class/Program <span class="required-star">*</span></label>
                            <select name="applying_class" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                                <option value="">Select Program</option>
                                <?php 
                                $programs = $config['programs'][$config['institution_type']];
                                foreach ($programs as $key => $value): ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Last School Attended</label>
                            <input type="text" name="last_school" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Last Class Completed</label>
                            <input type="text" name="last_class" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Overall Grade/Average</label>
                            <input type="text" name="grade" placeholder="e.g., 75% or Distinction" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" class="prev-step bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Previous
                        </button>
                        <button type="button" class="next-step bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">
                            Next <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Step 5: Medical Information -->
                <div class="form-step p-6 md:p-8" data-step="5">
                    <h2 class="text-2xl font-bold text-primary mb-2">Medical Information</h2>
                    <p class="text-gray-500 text-sm mb-6">Please provide health information (confidential)</p>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Blood Group</label>
                            <select name="blood_group" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                                <option value="">Select blood group</option>
                                <option>A+</option><option>A-</option><option>B+</option><option>B-</option>
                                <option>AB+</option><option>AB-</option><option>O+</option><option>O-</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Genotype</label>
                            <select name="genotype" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                                <option value="">Select genotype</option>
                                <option>AA</option><option>AS</option><option>SS</option><option>AC</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Known Allergies</label>
                            <input type="text" name="allergies" placeholder="e.g., peanuts, dust" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Chronic Illnesses</label>
                            <input type="text" name="illnesses" placeholder="e.g., asthma, diabetes" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Current Medications</label>
                            <textarea name="medications" rows="2" placeholder="List any medications you are currently taking" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary"></textarea>
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" class="prev-step bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Previous
                        </button>
                        <button type="button" class="next-step bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">
                            Next <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Step 6: Statement of Purpose (Customizable) -->
                <div class="form-step p-6 md:p-8" data-step="6">
                    <h2 class="text-2xl font-bold text-primary mb-2">Statement of Purpose</h2>
                    <p class="text-gray-500 text-sm mb-6">Please share your motivation for seeking admission</p>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Why do you wish to join our institution? <span class="required-star">*</span></label>
                            <textarea name="motivation" required rows="5" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary" placeholder="Please explain your motivation and desire..."></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">What are your career aspirations?</label>
                            <textarea name="career_goals" rows="3" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-primary" placeholder="What do you hope to achieve after completing your studies?"></textarea>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg space-y-3">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="checkbox" name="terms_agree" class="mt-1 w-5 h-5 text-primary" required>
                                <span class="text-sm">I confirm that all information provided is true and correct to the best of my knowledge</span>
                            </label>
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="checkbox" name="policy_agree" class="mt-1 w-5 h-5 text-primary" required>
                                <span class="text-sm">I agree to abide by the rules and regulations of the institution</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" class="prev-step bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Previous
                        </button>
                        <button type="button" class="next-step bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">
                            Review Application <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Step 7: Review & Submit -->
                <div class="form-step p-6 md:p-8" data-step="7">
                    <h2 class="text-2xl font-bold text-primary mb-2">Review & Submit</h2>
                    <p class="text-gray-500 text-sm mb-6">Please review your information before submitting</p>
                    
                    <div id="reviewContent" class="bg-gray-50 rounded-lg p-6 mb-6 max-h-96 overflow-y-auto">
                        <!-- Review content will be populated via JavaScript -->
                    </div>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                        <p class="text-sm text-blue-800">
                            <i class="fas fa-info-circle mr-2"></i>
                            After submission, you will receive a confirmation email. 
                            <?php if ($config['application']['fee'] > 0): ?>
                            A non-refundable application fee of <?php echo $config['application']['currency']; ?><?php echo number_format($config['application']['fee']); ?> is required. 
                            Payment details will be sent to your email.
                            <?php endif; ?>
                        </p>
                    </div>
                    
                    <div class="flex justify-between">
                        <button type="button" class="prev-step bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Previous
                        </button>
                        <button type="submit" class="bg-secondary text-white px-8 py-3 rounded-lg font-bold hover:opacity-90 transition flex items-center gap-2">
                            <i class="fas fa-paper-plane"></i> Submit Application
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12 py-8 no-print">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4"><?php echo $config['site_name']; ?></h3>
                    <p class="text-gray-300"><?php echo $config['content']['about_text']; ?></p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Info</h3>
                    <p class="text-gray-300"><i class="fas fa-map-marker-alt mr-2"></i> <?php echo $config['contact']['address']; ?></p>
                    <p class="text-gray-300 mt-2"><i class="fas fa-phone mr-2"></i> <?php echo $config['contact']['phone']; ?></p>
                    <p class="text-gray-300 mt-2"><i class="fas fa-envelope mr-2"></i> <?php echo $config['contact']['email']; ?></p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Admissions</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Academics</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; <?php echo date('Y'); ?> <?php echo $config['site_name']; ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentStep = 1;
        const totalSteps = 7;
        
        // Function to show current step
        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('.form-step').forEach(el => {
                el.classList.remove('active');
            });
            
            // Show current step
            document.querySelector(`.form-step[data-step="${step}"]`).classList.add('active');
            
            // Update step indicators
            document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
                const stepNum = index + 1;
                indicator.classList.remove('active', 'completed');
                if (stepNum === step) {
                    indicator.classList.add('active');
                } else if (stepNum < step) {
                    indicator.classList.add('completed');
                }
            });
            
            // Update progress bar
            const progress = ((step - 1) / (totalSteps - 1)) * 100;
            document.getElementById('progressBar').style.width = `${progress}%`;
            document.getElementById('progressPercent').textContent = `${Math.round(progress)}%`;
            document.getElementById('stepLabel').textContent = `Step ${step} of ${totalSteps}`;
            
            // If on review step, populate review content
            if (step === totalSteps) {
                populateReview();
            }
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        
        // Populate review section
        function populateReview() {
            const formData = new FormData(document.getElementById('applicationForm'));
            const reviewHtml = [];
            
            reviewHtml.push('<div class="space-y-4">');
            
            // Personal Information
            reviewHtml.push('<div><h3 class="font-bold text-primary mb-2">Personal Information</h3>');
            reviewHtml.push('<table class="w-full text-sm">');
            reviewHtml.push(`<tr><td class="py-1 font-medium">Full Name:</td><td>${formData.get('firstname') || 'N/A'} ${formData.get('surname') || 'N/A'}</td></tr>`);
            reviewHtml.push(`<tr><td class="py-1 font-medium">Date of Birth:</td><td>${formData.get('dob') || 'N/A'}</td></tr>`);
            reviewHtml.push(`<tr><td class="py-1 font-medium">Gender:</td><td>${formData.get('gender') || 'N/A'}</td></tr>`);
            reviewHtml.push(`<tr><td class="py-1 font-medium">Email:</td><td>${formData.get('email') || 'N/A'}</td></tr>`);
            reviewHtml.push(`<tr><td class="py-1 font-medium">Phone:</td><td>${formData.get('phone') || 'N/A'}</td></tr>`);
            reviewHtml.push('</table></div><hr>');
            
            // Academic Information
            const applyingClass = formData.get('applying_class');
            const classDisplay = document.querySelector('select[name="applying_class"] option:checked')?.text || applyingClass;
            reviewHtml.push('<div><h3 class="font-bold text-primary mb-2">Academic Information</h3>');
            reviewHtml.push('<table class="w-full text-sm">');
            reviewHtml.push(`<tr><td class="py-1 font-medium">Applying for:</td><td>${classDisplay}</td></tr>`);
            reviewHtml.push(`<tr><td class="py-1 font-medium">Last School:</td><td>${formData.get('last_school') || 'N/A'}</td></tr>`);
            reviewHtml.push(`<tr><td class="py-1 font-medium">Last Class:</td><td>${formData.get('last_class') || 'N/A'}</td></tr>`);
            reviewHtml.push('</table></div>');
            
            reviewHtml.push('</div>');
            
            document.getElementById('reviewContent').innerHTML = reviewHtml.join('');
        }
        
        // Next button clicks
        document.querySelectorAll('.next-step').forEach(btn => {
            btn.addEventListener('click', () => {
                // Basic validation for current step
                const currentStepDiv = document.querySelector(`.form-step[data-step="${currentStep}"]`);
                const requiredFields = currentStepDiv.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('border-red-500');
                        setTimeout(() => field.classList.remove('border-red-500'), 2000);
                    }
                });
                
                if (!isValid) {
                    alert('Please fill in all required fields.');
                    return;
                }
                
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                }
            });
        });
        
        // Previous button clicks
        document.querySelectorAll('.prev-step').forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });
        
        // Step indicator clicks
        document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                const step = index + 1;
                if (step < currentStep) {
                    currentStep = step;
                    showStep(currentStep);
                } else if (step === currentStep + 1) {
                    // Only allow moving forward if current step is valid
                    const currentStepDiv = document.querySelector(`.form-step[data-step="${currentStep}"]`);
                    const requiredFields = currentStepDiv.querySelectorAll('[required]');
                    let isValid = true;
                    
                    requiredFields.forEach(field => {
                        if (!field.value.trim()) isValid = false;
                    });
                    
                    if (isValid) {
                        currentStep = step;
                        showStep(currentStep);
                    }
                }
            });
        });
        
        // Form submission
        document.getElementById('applicationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Check terms agreement
            const termsAgree = document.querySelector('input[name="terms_agree"]');
            const policyAgree = document.querySelector('input[name="policy_agree"]');
            
            if (!termsAgree?.checked || !policyAgree?.checked) {
                alert('Please agree to the terms and conditions.');
                return;
            }
            
            if (confirm('Are you sure you want to submit your application? Please review all information before submitting.')) {
                // In a real implementation, you would submit via AJAX or standard POST
                alert('Application submitted successfully! You will receive a confirmation email shortly.');
                // this.submit(); // Uncomment for actual submission
            }
        });
        
        // Add input validation styling
        document.querySelectorAll('input, select, textarea').forEach(field => {
            field.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value.trim()) {
                    this.classList.add('border-red-500');
                } else {
                    this.classList.remove('border-red-500');
                }
            });
            
            field.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('border-red-500');
                }
            });
        });
    });
    </script>
</body>
</html>