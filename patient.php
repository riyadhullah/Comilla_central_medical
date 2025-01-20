<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospitalmanagementsystem";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM patients";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comilla Central Medical</title>
    <link rel="stylesheet" href="css//patient.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Menu -->
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="/Comilla_central_medical/appointment.php">Appointments</a></li>
                <li><a href="#patients">Patients</a></li>
                <li><a href="#doctors">Doctors</a></li>
                <li><a href="#departments">Departments</a></li>
                <li><a href="#billing">Billing</a></li>
                <li><a href="#pharmacy">Pharmacy</a></li>
                <li><a href="#reports">Reports</a></li>
                <li><a href="#settings">Settings</a></li>
                <li><a href="#help">Help</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Comilla Central Medical</h1>
                <button class="logout-button">Logout</button>
            </header>
            <div class="content">
                <h2>Patient Management</h2>
                <div class="patient-management">
                    <h3>Search Patient</h3>
                    <form class="search-form">
                        <label for="patient-id">Patient ID</label>
                        <input type="text" id="patient-id" placeholder="Enter Patient ID" onkeyup="fetchPatientData()">

                        <label for="patient-name">Patient Name</label>
                        <input type="text" id="patient-name" placeholder="Enter Patient Name" onkeyup="fetchPatientData()">

                        <label for="patient-mobile">Mobile Number</label>
                        <input type="text" id="patient-mobile" placeholder="Enter Mobile Number" onkeyup="fetchPatientData()">
                    </form>
                </div>

                <div class="patient-table">
                    <h3>Patient List</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Blood Group</th>
                                <th>Admission Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="patient-data">
                            <?php
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>
                <td>{$row['PatientID']}</td>
                <td>{$row['PatientName']}</td>
                <td>riyadh</td>
                <td>riyadh</td>
                <td>{$row['ContactNumber']}</td>
                <td>{$row['Email']}</td>
                <td>riyadh</td>
                <td>{$row['AdmissionDate']}</td>
                <td>
                    <button class='discharge-btn' onclick='dischargePatient({$row['PatientID']})'>Discharge</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='9'>No patients found</td></tr>";
}
                            ?>
                            <!-- Patient details will be populated here by AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>
    function fetchPatientData() {
        // Get the search inputs
        const patientId = document.getElementById('patient-id').value;
        const patientName = document.getElementById('patient-name').value;
        const patientMobile = document.getElementById('patient-mobile').value;

        // Prepare the AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/Comilla_central_medical/fetch_patient.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update the table body with the response
                document.getElementById('patient-data').innerHTML = xhr.responseText;
            }
        };

        // Send the request with search parameters
        const params = `patientId=${encodeURIComponent(patientId)}&patientName=${encodeURIComponent(patientName)}&patientMobile=${encodeURIComponent(patientMobile)}`;
        xhr.send(params);
    }
</script>

</body>
</html>
