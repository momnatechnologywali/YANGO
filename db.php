<?php
$host = 'localhost';
$dbname = 'dbggdo3dvhbj2s';
$username = 'um4u5gpwc3dwc';
$password = 'neqhgxo10ioe';
 
try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}
?>
