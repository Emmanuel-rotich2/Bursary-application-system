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
    </style>
</head>

<body>
    <header>
        <img src="images/gok.png" alt="Logo">
        <h1>BURSARY APPLICATION SYSTEM</h1>
    </header><br>
    <form method="post" action="applic.php" enctype="multipart/form-data">
        <fieldset style="background-color:aqua; width:800px;">
            
            <p style="color: black; font-weight: bold;">Family Background</p><br><br>
            <label>Family Status</label>
            <select name="status">
                <option></option>
                <option>Both parents Alive</option>
                <option>Single Parent</option>
                <option>One parent Dead</option>
                <option>Both parents Dead</option>
            </select>
            <label>Number Of Siblings [Alive]</label>
            <input type="number" name="sib"><br><br>
            <label>Estimated Family Income [Annual kshs]</label>
            <input type="number" name="income"><br><br>
            <p style="color: black; font-weight: bold;">Documents Upload</p>
            <label>Fees Structure</label>
            <input type="file" name="fee" required>
            <label>Death Certificate [if Deceased]</label>
            <input type="file" name="cert"><br><br>
            <label>Transcript / Report Form</label>
            <input type="file" name="trans"><br><br><br><br>
            <div style="text-align: center;">
                <input type="submit" value="Submit" style="background-color: green; color: #fff;">
            </div>
        </fieldset>
    </form>
    </div>
</body>

</html>