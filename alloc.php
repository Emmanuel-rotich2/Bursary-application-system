<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "bursary_application"; 

$conn = new mysqli("localhost", "username", "password", "database_name");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT date, name, institution, 'N/A' AS amount FROM applications ORDER BY date DESC";
$result = $conn->query($sql);

$records = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

$conn->close();
echo json_encode($records);
?>
