<?php
// Database configuration (for production use)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'seminary_system');

// For demo purposes - create connection function
function getDBConnection() {
    // Return null for demo - this will be implemented when client signs
    return null;
}

// Create tables SQL (for reference)
$create_tables_sql = "
CREATE TABLE IF NOT EXISTS applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    application_no VARCHAR(50) UNIQUE,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    other_names VARCHAR(100),
    date_of_birth DATE,
    gender ENUM('Male', 'Female'),
    applying_class VARCHAR(50),
    parent_name VARCHAR(200),
    parent_phone VARCHAR(20),
    parent_email VARCHAR(100),
    address TEXT,
    parish VARCHAR(100),
    parish_priest VARCHAR(100),
    last_school VARCHAR(200),
    last_class VARCHAR(50),
    motivation TEXT,
    status ENUM('pending', 'reviewed', 'shortlisted', 'accepted', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    email VARCHAR(100) UNIQUE,
    password_hash VARCHAR(255),
    role ENUM('admin', 'staff', 'parent', 'student') DEFAULT 'staff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password_hash, role) 
VALUES ('admin', 'admin@seminary.edu', '" . password_hash('admin123', PASSWORD_DEFAULT) . "', 'admin')
ON DUPLICATE KEY UPDATE id=id;
";
?>