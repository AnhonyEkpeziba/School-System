<?php
// Complete Site Configuration - Edit this for each client
return [
    // Basic Information
    'site_name' => 'St. Charles Borromeo Minor Seminary',
    'site_tagline' => 'Forming Future Priests in Knowledge and Virtue',
    'site_description' => 'A premier institution dedicated to academic excellence and spiritual formation',
    'site_keywords' => 'seminary, catholic school, priestly formation, boarding school, nigeria',
    'site_author' => 'Diocese of Bomadi',
    'site_logo' => '/assets/images/logo.png',
    'site_favicon' => '/assets/images/favicon.ico',
    'copyright' => 'Diocese of Bomadi',
    
    // Institution Type
    'institution_type' => 'seminary', // seminary, school, college, academy
    'institution_category' => 'catholic', // catholic, protestant, islamic, secular
    
    // Contact Information
    'contact' => [
        'address' => 'KM 32 East-West Road, Opp. Police Station, Bomadi, Delta State',
        'phone' => '+234 803 456 7890',
        'phone_alt' => '+234 802 345 6789',
        'email' => 'info@stcharlesseminary.edu.ng',
        'email_admissions' => 'admissions@stcharlesseminary.edu.ng',
        'email_admin' => 'admin@stcharlesseminary.edu.ng',
        'website' => 'www.stcharlesseminary.edu.ng',
        'hours' => 'Monday - Friday: 8:00 AM - 5:00 PM',
        'sat_hours' => 'Saturday: 9:00 AM - 1:00 PM'
    ],
    
    // Social Media
    'social' => [
        'facebook' => 'https://facebook.com/stcharlesseminary',
        'twitter' => 'https://twitter.com/stcharlesseminary',
        'instagram' => 'https://instagram.com/stcharlesseminary',
        'youtube' => 'https://youtube.com/stcharlesseminary',
        'linkedin' => 'https://linkedin.com/school/stcharlesseminary',
        'whatsapp' => 'https://wa.me/2348034567890'
    ],
    
    // Application Settings
    'application' => [
        'fee' => 5000,
        'currency' => '₦',
        'currency_code' => 'NGN',
        'start_date' => '2025-01-01',
        'end_date' => '2025-06-30',
        'academic_year' => '2025/2026',
        'max_applications' => 500,
        'early_bird_discount' => 10, // percentage
        'early_bird_deadline' => '2025-03-31'
    ],
    
    // Academic Programs
    'programs' => [
        'junior_seminary' => [
            'JSS1' => [
                'name' => 'Junior Secondary School 1',
                'duration' => '3 years',
                'description' => 'Foundation year for junior seminary formation',
                'requirements' => ['Completed Primary 6', 'Entrance Examination', 'Interview']
            ],
            'JSS2' => [
                'name' => 'Junior Secondary School 2',
                'duration' => '1 year',
                'description' => 'Second year of junior seminary',
                'requirements' => ['Completed JSS1', 'Good academic standing']
            ],
            'JSS3' => [
                'name' => 'Junior Secondary School 3',
                'duration' => '1 year',
                'description' => 'Final year of junior seminary',
                'requirements' => ['Completed JSS2', 'BECE Preparation']
            ]
        ],
        'senior_seminary' => [
            'SS1' => [
                'name' => 'Senior Secondary School 1',
                'duration' => '1 year',
                'description' => 'First year of senior seminary',
                'requirements' => ['BECE Certificate', 'Entrance Examination']
            ],
            'SS2' => [
                'name' => 'Senior Secondary School 2',
                'duration' => '1 year',
                'description' => 'Second year of senior seminary',
                'requirements' => ['Completed SS1']
            ],
            'SS3' => [
                'name' => 'Senior Secondary School 3',
                'duration' => '1 year',
                'description' => 'Final year - WAEC/NECO preparation',
                'requirements' => ['Completed SS2']
            ]
        ]
    ],
    
    // Fee Structure
    'fees' => [
        'jss1' => 150000,
        'jss2' => 145000,
        'jss3' => 145000,
        'ss1' => 160000,
        'ss2' => 155000,
        'ss3' => 155000,
        'breakdown' => [
            'tuition' => 60000,
            'boarding' => 50000,
            'uniforms' => 15000,
            'books' => 10000,
            'sports' => 5000,
            'medical' => 5000,
            'development' => 5000
        ]
    ],
    
    // Important Dates
    'dates' => [
        'application_opens' => 'January 15, 2025',
        'application_closes' => 'June 30, 2025',
        'entrance_exam' => 'July 15, 2025',
        'interview_date' => 'July 20-25, 2025',
        'admission_list' => 'August 1, 2025',
        'resumption_date' => 'September 15, 2025'
    ],
    
    // Color Scheme
    'colors' => [
        'primary' => '#065f46',     // Emerald green
        'primary_dark' => '#064e3b',
        'primary_light' => '#10b981',
        'secondary' => '#f59e0b',   // Gold
        'secondary_dark' => '#d97706',
        'accent' => '#3b82f6',       // Blue
        'success' => '#10b981',
        'danger' => '#ef4444',
        'warning' => '#f59e0b',
        'info' => '#3b82f6',
        'dark' => '#1f2937',
        'light' => '#f3f4f6'
    ],
    
    // Typography
    'fonts' => [
        'heading' => 'Playfair Display, serif',
        'body' => 'Inter, sans-serif'
    ],
    
    // Content Sections
    'content' => [
        'hero' => [
            'title' => 'Excellence in Priestly Formation',
            'subtitle' => 'Nurturing Vocations, Building the Church of Tomorrow',
            'button_text' => 'Apply for Admission',
            'button_link' => '/apply.php',
            'button_secondary_text' => 'Learn More',
            'button_secondary_link' => '/pages/about.php',
            'background_image' => '/assets/images/hero-bg.jpg'
        ],
        'about' => [
            'title' => 'About Our Seminary',
            'content' => 'St. Charles Borromeo Minor Seminary is a Catholic institution dedicated to the formation of young men who aspire to the priesthood. Founded in 1985 by the Catholic Diocese of Bomadi, we have consistently provided excellent academic and spiritual formation.',
            'mission' => 'To form authentic priests who are intellectually competent, spiritually mature, and pastorally sensitive.',
            'vision' => 'To be a center of excellence in priestly formation, producing priests who will transform society.',
            'core_values' => [
                'Spiritual Excellence',
                'Academic Rigor',
                'Moral Integrity',
                'Community Service',
                'Cultural Sensitivity'
            ],
            'stats' => [
                ['number' => '38', 'label' => 'Years of Excellence'],
                ['number' => '500+', 'label' => 'Alumni Priests'],
                ['number' => '250', 'label' => 'Current Students'],
                ['number' => '45', 'label' => 'Dedicated Staff']
            ]
        ],
        'academics' => [
            'title' => 'Academic Programs',
            'subtitle' => 'Comprehensive formation for future priests',
            'features' => [
                'WAEC/NECO Preparation',
                'Spiritual Direction',
                'Leadership Training',
                'Sports & Recreation',
                'Community Service',
                'Retreats & Seminars'
            ]
        ],
        'admissions' => [
            'title' => 'Admissions Process',
            'subtitle' => 'Your journey to priestly formation begins here',
            'steps' => [
                ['step' => 1, 'title' => 'Online Application', 'description' => 'Fill out the online application form and pay the application fee'],
                ['step' => 2, 'title' => 'Entrance Examination', 'description' => 'Take the entrance examination at our campus'],
                ['step' => 3, 'title' => 'Interview', 'description' => 'Attend an interview with the admissions committee'],
                ['step' => 4, 'title' => 'Acceptance', 'description' => 'Receive admission letter and complete registration']
            ],
            'requirements' => [
                'Birth certificate (age 10-17 for JSS, 14-20 for SS)',
                'Baptismal certificate',
                'Last school report',
                'Recommendation letter from parish priest',
                'Medical certificate',
                'Passport photographs (6 copies)'
            ]
        ],
        'gallery' => [
            'title' => 'Our Campus Life',
            'subtitle' => 'Experience the vibrant community of our seminary',
            'categories' => ['Campus', 'Academics', 'Spiritual Life', 'Sports', 'Events', 'Graduation']
        ],
        'contact' => [
            'title' => 'Get in Touch',
            'subtitle' => 'We\'d love to hear from you',
            'form_title' => 'Send us a message',
            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.123456789!2d5.123456!3d6.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDcnMjYuMyJOIDXCsDA3JzI2LjMiRQ!5e0!3m2!1sen!2sng!4v1234567890!5m2!1sen!2sng'
        ]
    ],
    
    // Feature Toggles
    'features' => [
        'online_payment' => true,
        'email_notifications' => true,
        'sms_notifications' => false,
        'document_upload' => true,
        'student_portal' => true,
        'parent_portal' => true,
        'online_exam' => false,
        'newsletter' => true,
        'blog' => true,
        'gallery' => true
    ],
    
    // SEO Settings
    'seo' => [
        'google_analytics' => 'UA-XXXXX-X',
        'google_site_verification' => 'your-verification-code',
        'bing_site_verification' => 'your-verification-code'
    ],
    
    // Demo Mode
    'demo_mode' => true,
    'demo_message' => 'DEMO VERSION - Full system demonstration for proposal purposes'
];
?>