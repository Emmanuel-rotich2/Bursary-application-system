
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bursary Application System</title>
    <link rel="stylesheet" href ="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <img src="images/gok.png" alt="Logo">
        <h1>BURSARY APPLICATION SYSTEM</h1>
        <a href="login.php" style="color: #000; float: right;" onclick="return confirmLogout();">
            <i class="fa fa-sign-out" aria-hidden="true">Logout</i>
        </a>
    </header>
    <ul>
        <li><a href="javascript:void(0)" class="active" onclick="showContent('home')">Home</a></li>
        <li><a href="javascript:void(0)" onclick="showContent('notification')">Bursary</a></li>
        <li><a href="javascript:void(0)" onclick="showContent('status')">View Status</a></li>
        <li><a href="javascript:void(0)" onclick="showContent('contact')">Contact Us</a></li>
    </ul>  
<div id="home" class="content-section active-section">
    <div id="home-content" style="position: relative; height: 90vh;">
        <img src="images/download (5).jpg" alt="Background Image" style="
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            position: absolute; 
            top: 0; 
            left: 0; 
            z-index: 1;">
        <div style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
            <h1 style="color:#000;font-style:italic;font0-size:25px;">WELCOME TO BURSARY APPLICATION SYSTEM</h1>
            <p style="color:#000;font-style:italic;font0-size:20px;">YOUR TRUSTED APPLICATION</p>
        </div>
    </div>
</div>
</div>
<div id="notification" class="content-section">
    <table>
        <style>
            table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
th {
    background-color: #f2f2f2;
    text-align: center;
}
.center {
    text-align: center;
}
        </style>
        <tr>
            <th>Bursary No:</th>
            <th>Bursary Title</th>
            <th>Description</th>
            <th>Open Date</th>
            <th>Closing Date</th>
            <th></th>
        </tr>
        <tr>
            <td>OO1/ONP/24</td>
            <td>Mastercard Foundation</td>
            <td>Mastercard foundation bursary is financial aid provided by nonprofit or private foundations to support students in
                 need, helping them access education by covering costs like tuition, books, and living expenses. 
                 Awarded based on specific criteria, such as financial need
                 or academic potential, these bursaries aim to empower students to pursue their studies.</td>
            <td>03/11/2024</td>
            <td>31/12/2024</td>
            <td><a href ="read.php"><button style="text-decoration:none; 
     background-color:green;color:#fff; width:60px; ">read more</button></a></td>
        </tr>
        <tr>
        <td>OO2/ONP/24</td>
            <td>County Bursary</td>
        <td>A county bursary is financial assistance provided by local government authorities to support students fr
            om low-income families in covering educational expenses. Aimed at promoting access to education, county bursaries typically prioritize financial need and target 
            residents within the county, helping them afford tuition, supplies, and related costs.</td>
            <td>30/11/2024</td>
            <td>31/12/2024</td>
            <td> <a href ="read.php"><button style="text-decoration:none; 
     background-color:green;color:#fff; width:60px; ">read more</button></a> </td>
        </tr>
        <tr>
        <td>OO3/ONP/24</td>
        <td>Presidential Bursary</td>
        <td>A presidential bursary is a form of financial aid funded or endorsed by a president,
             government, or top institutional authority to support students in pursuing higher education. Often awarded to students with stron
             g academic performance or significant financial need, this bursary aims to
             increase educational accessibility and national talent development.</td>
             <td>10/11/2024</td>
            <td>20/12/2024</td>
            <td><a href ="read.php"><button style="text-decoration:none; 
     background-color:green;color:#fff; width:60px; ">read more</button></a></td>
        </tr>
        <tr>
        <td>OO4/ONP/24</td>
        <td>Safaricom Foundation</td>
        <td>The Safaricom Foundation bursary provides financial assistance to Kenyan students from und
            erprivileged backgrounds, supporting their access to quality education. Targeting high school and university students, 
            the bursary covers essential costs like tuition, supplies, and other educationa
            l expenses, empowering recipients to pursue their academic and career aspirations.</td>
            <td>11/11/2024</td>
            <td>22/12/2024</td>
            <td><a href ="read.php"><button style="text-decoration:none; 
     background-color:green;color:#fff; width:60px; ">read more</button></a></td>
        </tr>
    </table>
        

       
    </div>
    <div id="status" class="content-section">
    <h2>View Status</h2>
    <p id="status-report">Click the button below to fetch your application status.</p>
    <button id="fetch-report-button" style="background-color: green; color: #fff;">Fetch Status Report</button>
</div>

<script>
    function fetchReportStatus() {

        const statuses = ["Allocated", "Disbursed", "In Progress"];
        const randomStatus = statuses[Math.floor(Math.random() * statuses.length)];
        const statusReport = document.getElementById("status-report");
        statusReport.textContent = `Application Status: ${randomStatus}`;
    }
    document.getElementById("fetch-report-button").addEventListener("click", fetchReportStatus);
</script>

    <div id="contact" class="content-section">
        <form id="contact-form" action="post" >
            <div style=" background-color: aquamarine; width: 340px; height: 340px;text-align: center;"><br>
                <h2>Contact Us</h2>
            <a href="mailto:zadokmutai@gmail.com">Click me to get assistance from our support team via email</a><br><br>
            <a href="tel:+254725084122">Call us on +254 725 084 122</a><br><br>
            <nav>
                <img src="images/images (3).jpg"style="background-position:center;backgrpound-size:cover; height:20vh " >
            </nav>
    </div>
        </div>
        </form>

        <p id="status-message"></p>
    </div>
    
</div>
</fieldset>
    </form>
    <script>
        function showContent(sectionId) {
            var sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].classList.remove('active-section');
            }
            document.getElementById(sectionId).classList.add('active-section');

            var menuItems = document.querySelectorAll('ul li a');
            for (var i = 0; i < menuItems.length; i++) {
                menuItems[i].classList.remove('active');
            }
            event.currentTarget.classList.add('active');
        }
    </script>
 <script>
     function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }
        </script>
</body>

</html>