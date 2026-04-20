# School/Seminary Management System - Demo Blueprint

A fully customizable, professional online application system for schools, seminaries, and educational institutions.

## Quick Setup

1. **Edit Configuration** - Open `config/site-config.php`
2. **Change Basic Info** - Update site name, contact details, colors
3. **Select Institution Type** - Change `institution_type` to 'seminary', 'school', or 'college'
4. **Customize Content** - Edit the `content` array for text changes
5. **Deploy** - Upload to any PHP-enabled web server

## Customization Guide

### For Different Institution Types

```php
// For a regular school
'institution_type' => 'school',
'programs' => [
    'school' => [
        'GRADE1' => 'Grade 1',
        'GRADE2' => 'Grade 2',
        // ...
    ]
]

// For a college/university
'institution_type' => 'college',
'programs' => [
    'college' => [
        'FRESHMAN' => 'Freshman Year',
        'SOPHOMORE' => 'Sophomore Year',
        // ...
    ]
]