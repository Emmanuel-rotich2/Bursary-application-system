<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bursary Application System</title>
    <style>
        label {
            font-size: 14px;
            font-weight: bold;
        }

        p {
            font-weight: bold;
            font-size: 20px;
        }

        header {
            background-color: red;
            text-align: center;
            padding: 20px;
            color: white;
        }

        header img {
            float: left;
            height: 100px;
            margin-top: 2px;
        }

        header h1 {
            margin: 0;
            font-size: 50px;
            line-height: 100px;
        }
        body{
            background-image: url(images/download (8).jpg);
            background-position:center;
            background-size:cover;
            height:100vh

       }
    </style>
</head>

<body  style="background-image: url(images/download (11).jpg);
            background-position:center;
            background-size:cover;
            height:100vh" >
    <header>
        <img src="images/gok.png" alt="Logo">
        <h1>BURSARY APPLICATION SYSTEM</h1>
    </header><br>
    <form method="post" action="applic.php" enctype="multipart/form-data">
        <fieldset style="background-color:aqua; width:800px;">
            <h1 style="text-align: center;">To be Filled By The Applicant</h1>
            <p style="color: black; font-weight: bold;">Personal / Institution / Other Details</p><br>
            <label>The Type Of Bursary</label>
            <select name="type">
                <option></option>
                <option>Mastercard Bursary</option>
                <option>County Bursary</option>
                <option>Presidential Bursary</option>
                <option>Safaricom Foundation</option>
            </select><br><br>
            <label>Date of Application</label>
            <input type="date" name="date_of_application" required>
            <label>Full Names [As per the official documents]</label>
            <input type="text" name="name" required><br><br>
            <label>Gender</label>
            <input type="radio" name="male" id="radio" value="Male"> Male
            <input type="radio" name="female" id="radio" value="Female"> Female
            <label>Date Of Birth</label>
            <input type="date" name="date_of_birth" required><br><br>
            <label>Location</label>
            <input type="text" name="loc" required>
            <label>Sub-Location</label>
            <input type="text" name="subloc" required><br><br>
            <label>Name Of The Institution</label>
            <input type="text" name="school" required><br><br>
            <label>Institution Postal Address</label>
            <input type="text" name="post" required>
            <label>Admission Number</label>
            <input type="text" name="admin"><br><br>
            <label>Campus / Branch [for Tertiary inst]</label>
            <input type="text" name="campus"><br><br>
            <label>Faculty / Department [for Tertiary inst]</label>
            <input type="text" name="dep"><br><br>
            <label>Course Of Study [for Tertiary inst]</label>
            <input type="text" name="course">
            <label>Mode Of Study</label>
            <input type="radio" name="mode" value="Regular"> Regular
            <input type="radio" name="mode" value="Parallel"> Parallel
            <input type="radio" name="mode" value="Boarding"> Boarding
            <input type="radio" name="mode" value="Day"> Day<br><br>
            <label>Class/Grade/Year of study</label>
            <input type="text" name="year" required>
            <label>Course Duration [in years]</label>
            <input type="text" name="dur"><br><br>
            <label>Expected Year and Month of Completion [MMYY]</label>
            <input type="date" name="compl" required>
            <label>Mobile / Telephone Number</label>
            <input type="number" name="num" required><br><br>
            <a href="next.php" style="float:right; text-decoration:none;font-size:20px;">next</a><br><br>
            
        </fieldset>
    </form>
    </div>
</body>

</html>