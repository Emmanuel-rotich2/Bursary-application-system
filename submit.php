<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bursary_application";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $name = trim($_POST['appname']);
    $institution = trim($_POST['inst']);
    $amount = trim($_POST['amount']);
    $stmt = $conn->prepare("INSERT INTO allocations (name, institution, amount) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $institution, $amount);

    if ($stmt->execute()) {
        echo "<script>alert('Allocated successfully.'); window.location = 'admin.php';</script>";

    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
