<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $national_id = $_POST["national_id"];
    $full_name = $_POST["full_name"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];

    if (!preg_match('/^[0-9]{1,9}$/', $national_id)) {
        echo "<script>alert('Please enter a valid national id !!');</script>";
        echo "<script>window.location = 'adminreg.php';</script>";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match !!');</script>";
        echo "<script>window.location = 'adminreg.php';</script>";
        exit;
    } else {
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "bursary_application";

        $conn = new mysqli($servername, $username, $password_db, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $check_query = "SELECT * FROM admin WHERE national_id = '$national_id'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "<script>alert('Admin with the same national ID already exists !!');</script>";
            echo "<script>window.location = 'adminlog.php';</script>";
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO admin ( full_name, national_id,password, phone_number, email) VALUES ( ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",  $full_name,$national_id, $password, $phone_number, $email);

        if ($stmt->execute() === TRUE) {
            echo "<script>alert('Registration successful !!');</script>";
            echo "<script>window.location = 'adminlog.php';</script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            background-color: antiquewhite;
            text-align: center;
        }

        div {
            background-color: red;
            text-align: center;
            padding: 10px;
            overflow: hidden;
        }

        div img {
            float: left;
            margin-right: 10px;
            height: 100px;
            margin-top: 2px;
        }

        div h1 {
            margin: 0;
            line-height: 50px;
            color: #fff;
            font-size: 50px;
        }

        nav {
            text-align: center; 
        }

        section {
            background-color: cornsilk;
            width: 340px;
            margin: auto; 
            padding: 20px; 
        }
    </style>
</head>

<body>
    <div>
    <h2> <img src="images/gok.png"></h2><br>
        <h1>BURSARY ALLOCATION SYSTEM</h1>
    </div><br><br>
    <section>
        <h1 style="text-align: center;color: green;">REGISTER</h1>
        <nav>
            <form method="post" >
                <label>FULL NAME:</label><br>
                <input type="text" name="full_name" required style="width: 300px;"><br><br>
                <label>NATIONAL ID:</label><br>
                <input type="text" name="national_id" required style="width: 300px;"><br><br>
                <label>PASSWORD:</label><br>
                <input type="password" name="password" placeholder="password" required style="width: 300px;"><br><br>
                <label>RE-ENTER THE PASSWORD</label><br>
                <input type="password" name="confirm_password" required style="width: 300px;" min="4"><br><br>
                <label>PHONE NUMBER</label><br>
                <input type="text" name="phone_number" placeholder="07........" required style="width: 300px;"><br><br>
                <label>EMAIL</label><br>
                <input type="email" name="email" placeholder="eg: bursaryapplic@gmail.co.ke" required style="width: 300px;"><br><br>
                <button type="submit" name="submit" style="display: block; margin: 0 auto; background-color: green;color: #fff;"  >REGISTER</button><br>
            </form>
            <h1>Have an account?<a href="adminlog.php">login</a></h1>
        </nav>
    </section>
</body>

</html>


