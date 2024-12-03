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


    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $type = trim($_POST['type'] ?? '');
    $date_of_application = trim($_POST['date_of_application'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $gender = isset($_POST['male']) ? 'Male' : (isset($_POST['female']) ? 'Female' : '');
    $date_of_birth = trim($_POST['date_of_birth'] ?? '');
    $location = trim($_POST['loc'] ?? '');
    $sub_location = trim($_POST['subloc'] ?? '');
    $institution_name = trim($_POST['school'] ?? '');
    $postal_address = trim($_POST['post'] ?? '');
    $admission_number = trim($_POST['admin'] ?? '');
    $campus_branch = trim($_POST['campus'] ?? '');
    $faculty_department = trim($_POST['dep'] ?? '');
    $course_of_study = trim($_POST['course'] ?? '');
    $mode_of_study = trim($_POST['mode'] ?? '');
    $year_of_study = trim($_POST['year'] ?? '');
    $course_duration = trim($_POST['dur'] ?? '');
    $expected_completion_date = trim($_POST['compl'] ?? '');
    $mobile_number = trim($_POST['num'] ?? '');
    $status = trim($_POST['status'] ?? '');
    $number_of_siblings = trim($_POST['sib'] ?? '');
    $estimated_family_income = trim($_POST['income'] ?? '');
    $fees_structure = $_FILES['fee']['name'] ?? '';
    $death_certificate = $_FILES['cert']['name'] ?? '';
    $transcript = $_FILES['trans']['name'] ?? '';

    if (strtotime($date_of_application) <= strtotime($date_of_birth)) {
        echo "<script>alert('Date of application must be after the date of birth.');</script>";
        echo "<script>window.location = 'apply.php';</script>";
    }

    $checkDuplicate = $conn->prepare(
        "SELECT * FROM applications WHERE name = ? AND date_of_birth = ? AND mobile_number = ?"
    );
    $checkDuplicate->bind_param("sss", $name, $date_of_birth, $mobile_number);
    $checkDuplicate->execute();
    $result = $checkDuplicate->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Application already exists.');</script>";
        echo "<script>window.location = 'apply.php';</script>";
    
    }


    if (!empty($_FILES['fee']['name'])) {
        move_uploaded_file($_FILES['fee']['tmp_name'], "uploads/" . basename($fees_structure));
    }
    if (!empty($_FILES['cert']['name'])) {
        move_uploaded_file($_FILES['cert']['tmp_name'], "uploads/" . basename($death_certificate));
    }
    if (!empty($_FILES['trans']['name'])) {
        move_uploaded_file($_FILES['trans']['tmp_name'], "uploads/" . basename($transcript));
    }

    $stmt = $conn->prepare(
        "INSERT INTO applications 
        (type, date_of_application, name, gender, date_of_birth, location, sub_location, 
        institution_name, postal_address, admission_number, campus_branch, faculty_department, 
        course_of_study, mode_of_study, year_of_study, course_duration, 
        expected_completion_date, mobile_number,status,number_of_siblings, 
        estimated_family_income, fees_structure, death_certificate, transcript) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Preparation failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssssssssssssssssisssss",
        $type,$date_of_application, $name, $gender, $date_of_birth, $location, 
        $sub_location, $institution_name, $postal_address, $admission_number, 
        $campus_branch, $faculty_department, $course_of_study, $mode_of_study, 
        $year_of_study, $course_duration, $expected_completion_date, 
        $mobile_number,$status, $number_of_siblings, 
        $estimated_family_income, $fees_structure, $death_certificate, $transcript
    );

    if ($stmt->execute()) {
        echo "<script>alert('Application submitted successfully.');</script>";
        echo "<script>window.location = 'index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>