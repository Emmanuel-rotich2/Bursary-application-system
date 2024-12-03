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

function searchRecords() {
    var input = document.getElementById("searchInput");
    var filter = input.value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var records = JSON.parse(this.responseText);
            updateTable(records);
        }
    };
    xhr.open("GET", "fetch.php?q=" + encodeURIComponent(filter), true);
    xhr.send();
}

function updateTable(records) {
    var tableBody = document.querySelector("#recordTable tbody");
    tableBody.innerHTML = "";

    records.forEach(function (record) {
        var newRow = document.createElement("tr");
        newRow.innerHTML = "<td>" + record.name + "</td>" +
            "<td>" + record.school + "</td>" +
            "<td>" + record.admin + "</td>" +
            "<td>" + record.year + "</td>" +
            "<td>" + record.course + "</td>" +
            "<td>" + record.num + "</td>" +
            "<td>" + record.fthr + "</td>" +
            "<td>" + record.src1 + "</td>" +
            "<td>" + record.mthr + "</td>" +
            "<td>" + record.src2 + "</td>";
        tableBody.appendChild(newRow);
    });
}





<form>
<div style="text-align: center; background-color: #dddddd; width: 300px; height: 250px;">
    <br><br>
    <label style="color: black; font-weight: bold;">Name</label><br>
    <input type="text" name="appname" id="appname"><br>
    <label style="color: black; font-weight: bold;">Institution</label><br>
    <input type="text" name="inst" id="inst"><br>
    <label style="color: black; font-weight: bold;">Allocate Amount</label><br>
    <input type="text" name="amount" id="amount"><br><br>
    <input type="submit" name="submit" value="Allocate">
</div>
</form>
</div>