<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bursary Allocation System</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <img src="images/gok.png" alt="Logo">
        <h1>BURSARY ALLOCATION SYSTEM</h1>
        <a href="adminlog.php" style="color: #000; float: right;" onclick="return confirmLogout();">
            <i class="fa fa-sign-out" aria-hidden="true">Logout</i>
        </a>
    </header>

    <section>
        <ul>
            <li><a href="javascript:void(0)" class="active" onclick="showContent('home')">Home</a></li>
            <li><a href="javascript:void(0)" onclick="showContent('allocate')">Bursary Allocation</a></li>
            <li><a href="javascript:void(0)" onclick="showContent('disburse')">Bursary Disbursement</a></li>

        </ul>
    </section>
    <div id="home" class="content-section active-section">
        <div id="home-content" style="position: relative; height: 90vh;">
            <img src="images/download (8).jpg" alt="Background Image" style="
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
                <h1 style="color:#000;font-style:italic;font0-size:25px;">AWAKENING POTENTIAL</h1>

            </div>
        </div>
    </div>

    </div>
    <div id="allocate" class="content-section active-section">
        <div style="text-align: center;">
            <input type="date" id="searchInput" placeholder="Search..." oninput="searchRecords()">
            <button type="button" id="resetButton" style="background-color:green;color:#fff;"
                onclick="fetchAllRecords()">Get</button>
        </div><br><br>
        <table id="recordTable">
        <tbody>
            <thead>
                <tr>
                    <th>TYPE</th>
                    <th>DATE</th>
                    <th>APPLICANT NAME</th>
                    <th>GENDER</th>
                    <th>DATE OF BIRTH</th>
                    <th>LOCATION</th>
                    <th>SUB-LOCATION</th>
                    <th>INSTITUTION</th>
                    <th>POSTAL ADDRESS</th>
                    <th>ADMISSION NUMBER</th>
                    <th>CAMPUS BRANCH</th>
                    <th>FACULTY DEPARTMENT</th>
                </tr>
            </thead>
           </tbody>
        </table><br><br>
        <table id="record">
            <thead>
                <tr>
                    <th>COURSE OF STUDY</th>
                    <th>MODE OF STUDY</th>
                    <th>YEAR OF STUDY</th>
                    <th>COURSE DURATION</th>
                    <th>COMPLETION</th>
                    <th>MOBILE NUMBER</th>
                    <th>FAMILY STATUS</th>
                    <th>NUMBER OF SIBLINGS</th>
                    <th>ESTIMATED FAMILY INCOME</th>
                    <th>FEES STRUCTURE</th>
                    <th>DEATH CERTIFICATE</th>
                    <th>TRANSCRIPT</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table><br><br>
        <form action="submit.php" method="POST"
            style="text-align: center; background-color: #dddddd; width: 300px; height: 250px;">
            <br><br>
            <label style="color: black; font-weight: bold;">Name</label><br>
            <input type="text" name="appname" id="appname" required><br>
            <label style="color: black; font-weight: bold;">Institution</label><br>
            <input type="text" name="inst" id="inst" required><br>
            <label style="color: black; font-weight: bold;">Allocate Amount</label><br>
            <input type="number" name="amount" id="amount" step="0.01" required><br><br>
            <input type="submit" name="submit" value="Allocate" style="background-color:green;color:#fff;">
        </form>

        <script>
        document.addEventListener("DOMContentLoaded", fetchAllRecords);

        function searchRecords() {
            var input = document.getElementById("searchInput").value;
            if (input) {
                var filter = input.toUpperCase();
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        var records = JSON.parse(this.responseText);
                        updateRecordTable(records);
                        updateAdditionalTable(records);
                    }
                };
                xhr.open("GET", "allocate.php?q=" + filter, true);
                xhr.send();
            } else {
                fetchAllRecords();
            }
        }

        function fetchAllRecords() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    var records = JSON.parse(this.responseText);
                    updateRecordTable(records);
                    updateAdditionalTable(records);
                }
            };
            xhr.open("GET", "allocate.php", true);
            xhr.send();
        }

        function updateRecordTable(records) {
            var tableBody = document.querySelector("#recordTable tbody");
            tableBody.innerHTML = "";
            records.forEach(function (record) {
                var row = document.createElement("tr");
                row.innerHTML = `
                    <td>${record.type || 'N/A'}</td>
                    <td>${record.date_of_application || 'N/A'}</td>
                    <td>${record.name || 'N/A'}</td>
                    <td>${record.gender || 'N/A'}</td>
                    <td>${record.date_of_birth || 'N/A'}</td>
                    <td>${record.location || 'N/A'}</td>
                    <td>${record.sub_location || 'N/A'}</td>
                    <td>${record.institution_name || 'N/A'}</td>
                    <td>${record.postal_address || 'N/A'}</td>
                    <td>${record.admission_number || 'N/A'}</td>
                    <td>${record.campus_branch || 'N/A'}</td>
                    <td>${record.faculty_department || 'N/A'}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        function updateAdditionalTable(records) {
            var tableBody = document.querySelector("#record tbody");
            tableBody.innerHTML = "";
            records.forEach(function (record) {
                var row = document.createElement("tr");
                row.innerHTML = `
                    <td>${record.course_of_study || 'N/A'}</td>
                    <td>${record.mode_of_study || 'N/A'}</td>
                    <td>${record.year_of_study || 'N/A'}</td>
                    <td>${record.course_duration || 'N/A'}</td>
                    <td>${record.expected_completion_date || 'N/A'}</td>
                    <td>${record.mobile_number || 'N/A'}</td>
                    <td>${record.family_status || 'N/A'}</td>
                    <td>${record.number_of_siblings || 'N/A'}</td>
                    <td>${record.estimated_family_income || 'N/A'}</td>
                    <td>${record.fees_structure || 'N/A'}</td>
                    <td>${record.death_certificate || 'N/A'}</td>
                    <td>${record.transcript || 'N/A'}</td>
                `;
                tableBody.appendChild(row);
            });
        }
        </script>

        </script>
    </div>

    </div>

    <script>
        document.getElementById("resetButton").addEventListener("click", function () {
            var searchTerm = document.getElementById("searchInput").value;
            searchRecords(searchTerm);
        });
    </script>
    </div>
    <div id="disburse" class="content-section active-section">
        <form action="disburse.php" method="POST"
            style="text-align: center; background-color: #dddddd; width: 300px; height: 250px;">
            <br><br>
            <label style="color: black; font-weight: bold;">Name</label><br>
            <input type="text" name="appname" id="appname" required><br>
            <label style="color: black; font-weight: bold;">Institution</label><br>
            <input type="text" name="inst" id="inst" required><br>
            <label style="color: black; font-weight: bold;"> Amount to disburse</label><br>
            <input type="number" name="amount" id="amount" step="0.01" required><br><br>
            <input type="submit" name="submit" value="Disburse" style="background-color:green;color:#fff;">
        </form>
        <script>
                function fetchData() {
                const xhr = new XMLHttpRequest();
                xhr.open("GET", "fetchdis.php", true);
                xhr.onload = function () {
                    if (this.status === 200) {
                        try {
                            const data = JSON.parse(this.responseText);
                const tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
                tableBody.innerHTML = "";

                            if (data.length > 0) {
                    data.forEach(record => {
                        const row = tableBody.insertRow();
                        const cellName = row.insertCell(0);
                        const cellAmount = row.insertCell(1);
                        cellName.innerHTML = record.name;
                        cellAmount.innerHTML = record.amount;
                    });
                            } else {
                    alert("No records found.");
                            }
                        } catch (error) {
                    console.error("Parsing error:", error);
                alert("Error parsing data: " + error.message);
                        }
                    } else {
                    alert("no data to be fetched: " + this.statusText);
                    }
                };
                xhr.onerror = function () {
                    alert("Request failed.");
                };
                xhr.send();
            }

                function submitData() {
                const tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
                const rows = tableBody.getElementsByTagName('tr');
                const records = [];

                for (let row of rows) {
                    const name = row.cells[0].innerHTML;
                const amount = row.cells[1].innerHTML;
                records.push({name, amount});
                }

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "submitdis.php", true);
                xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                xhr.onload = function () {
                    if (this.status === 200) {
                        const response = JSON.parse(this.responseText);
                alert(response.message);
                    } else {
                    alert("Error submitting data.");
                    }
                };
                xhr.send(JSON.stringify(records));
            }
        </script>
        <script>
                function showContent(sectionId) {
                const sections = document.querySelectorAll('.content-section');
                sections.forEach(section => section.style.display = 'none');
                document.getElementById(sectionId).style.display = 'block';
            }

        </script>
        <script>
                function confirmLogout() {
                return confirm("Are you sure you want to log out?");
            }
        </script>
        <script>
                xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    var records = JSON.parse(this.responseText);
                console.log(records);
                updateTable(records);
                }
            };

        </script>
</body>

</html>