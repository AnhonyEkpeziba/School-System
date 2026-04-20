<?php
// Helper functions
function getConfig($key = null) {
    $config = require 'site-config.php';
    if ($key === null) return $config;
    
    $keys = explode('.', $key);
    $value = $config;
    foreach ($keys as $k) {
        if (!isset($value[$k])) return null;
        $value = $value[$k];
    }
    return $value;
}

function getSetting($key, $default = null) {
    return getConfig($key) ?? $default;
}

function formatCurrency($amount) {
    return getConfig('application.currency') . number_format($amount, 2);
}

function isDemoMode() {
    return getConfig('demo_mode') === true;
}

function getDemoBadge() {
    if (isDemoMode()) {
        return '<div class="bg-yellow-500 text-black text-center py-2 px-4 fixed top-0 left-0 right-0 z-50">
                    <i class="fas fa-info-circle"></i> ' . getConfig('demo_message') . '
                    <button onclick="this.parentElement.style.display=\'none\'" class="ml-4 underline">Hide</button>
                </div>';
    }
    return '';
}

function getCurrentYear() {
    return date('Y');
}

function getAcademicYear() {
    return getConfig('application.academic_year');
}
?>