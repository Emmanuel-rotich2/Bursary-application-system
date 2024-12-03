<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "bursary_application"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['q'])) {
    $filter = $conn->real_escape_string($_GET['q']);
    $sql = "SELECT * FROM applications WHERE name LIKE '%$filter%' OR date_of_application LIKE '%$filter%'"; 
} else {
    $sql = "SELECT * FROM applications"; 
}

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
