<?php
require_once '../config/functions.php';
$page_title = 'Admissions';
include '../includes/header.php';
?>

<section class="bg-gradient-to-r from-primary to-primary-dark text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Admissions</h1>
        <p class="text-xl">Join our community of future priests</p>
    </div>
</section>

<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <!-- Admission Requirements -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-primary mb-6">Admission Requirements</h2>
            <div class="bg-gray-50 rounded-lg p-6">
                <ul class="space-y-3">
                    <?php foreach(getConfig('content.admissions.requirements') as $requirement): ?>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            <span class="text-gray-700"><?php echo $requirement; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        
        <!-- Application Process -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-primary mb-6">Application Process</h2>
            <div class="space-y-6">
                <?php foreach(getConfig('content.admissions.steps') as $step): ?>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl flex-shrink-0">
                            <?php echo $step['step']; ?>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-bold text-gray-800"><?php echo $step['title']; ?></h3>
                            <p class="text-gray-600"><?php echo $step['description']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Fee Structure -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-primary mb-6">Fee Structure</h2>
            <div class="overflow-x-auto">
                <table class="w-full bg-white rounded-lg shadow">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">Class</th>
                            <th class="px-6 py-3 text-right">Fees (₦)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-6 py-3">JSS 1</td>
                            <td class="px-6 py-3 text-right"><?php echo number_format(getConfig('fees.jss1')); ?></td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-6 py-3">JSS 2</td>
                            <td class="px-6 py-3 text-right"><?php echo number_format(getConfig('fees.jss2')); ?></td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-6 py-3">JSS 3</td>
                            <td class="px-6 py-3 text-right"><?php echo number_format(getConfig('fees.jss3')); ?></td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-6 py-3">SS 1</td>
                            <td class="px-6 py-3 text-right"><?php echo number_format(getConfig('fees.ss1')); ?></td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-6 py-3">SS 2</td>
                            <td class="px-6 py-3 text-right"><?php echo number_format(getConfig('fees.ss2')); ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3">SS 3</td>
                            <td class="px-6 py-3 text-right"><?php echo number_format(getConfig('fees.ss3')); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-6 bg-gray-50 rounded-lg p-6">
                <h3 class="font-bold text-lg mb-3">Fee Breakdown</h3>
                <div class="grid md:grid-cols-2 gap-3">
                    <?php foreach(getConfig('fees.breakdown') as $item => $amount): ?>
                        <div class="flex justify-between">
                            <span class="text-gray-600"><?php echo ucfirst($item); ?>:</span>
                            <span class="font-semibold"><?php echo formatCurrency($amount); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <!-- Important Dates -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-primary mb-6">Important Dates</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Application Opens:</span>
                        <span class="text-primary"><?php echo getConfig('dates.application_opens'); ?></span>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Application Closes:</span>
                        <span class="text-primary"><?php echo getConfig('dates.application_closes'); ?></span>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Entrance Examination:</span>
                        <span class="text-primary"><?php echo getConfig('dates.entrance_exam'); ?></span>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Interview Date:</span>
                        <span class="text-primary"><?php echo getConfig('dates.interview_date'); ?></span>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Admission List:</span>
                        <span class="text-primary"><?php echo getConfig('dates.admission_list'); ?></span>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Resumption Date:</span>
                        <span class="text-primary"><?php echo getConfig('dates.resumption_date'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CTA -->
        <div class="bg-primary text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Ready to Apply?</h2>
            <p class="mb-6">Start your application process today</p>
            <a href="/apply.php" class="bg-secondary text-white px-8 py-3 rounded-lg font-semibold hover:bg-secondary-dark transition inline-block">
                Apply Online Now
            </a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>