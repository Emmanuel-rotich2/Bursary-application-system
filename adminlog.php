<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "bursary_application";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE full_name='$full_name' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        echo "<script>alert('login successfully !!');</script>";
        header("Location: admin.php");
        exit();
    } else {
        $error_message = "Invalid national ID or password. Please try again.";
    }
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
         background-image:url(images/images (11).jpg);
         background-size:cover;
         background-position:center;
         height:90vh;
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
        <h1 style="text-align: center;color: green;">ADMIN LOGIN</h1>
        <nav>
            <form method="post">
                <label>USER NAME:</label><br>
                <input type="text" name="full_name" required><br><br>
                <label>PASSWORD</label><br>
                <input type="password" name="password" required><br><br>
                <input type="checkbox" name="remember_me">Remember me<br><br>
                <button type="submit" name="submit" style="display: block; margin: 0 auto;background-color: green;color: #fff;">LOGIN</button><br>
            </form>
           
            <a href="forgotadmin.php">Forget password</a><br>
            <h1>Do not have an account?<a href="adminreg.php">register</a></h1>
        </nav>
    </section>
</body>

</html>