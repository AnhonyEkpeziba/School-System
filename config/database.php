<?php
// Database configuration (for production)
// For demo on Render, we'll keep it simple
$db_enabled = false; // Set to true when you add a database

function getDBConnection() {
    global $db_enabled;
    if (!$db_enabled) {
        return null;
    }
    
    $host = getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: '';
    $db = getenv('DB_NAME') ?: 'seminary_db';
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        return null;
    }
    
    return $conn;
}
?>