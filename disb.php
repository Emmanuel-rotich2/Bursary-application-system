<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bursary_application";

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the allocation records
$sql = "SELECT name, amount FROM allocations"; // Adjust as necessary
$result = $conn->query($sql);

$records = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the records as a JSON response
header('Content-Type: application/json');
echo json_encode($records);
?>
