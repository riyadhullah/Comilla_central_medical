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

// Get the search parameters
$patientId = isset($_POST['patientId']) ? $_POST['patientId'] : '';
$patientName = isset($_POST['patientName']) ? $_POST['patientName'] : '';
$patientMobile = isset($_POST['patientMobile']) ? $_POST['patientMobile'] : '';

// Build the query
$sql = "SELECT * FROM patients WHERE 1=1";

if (!empty($patientId)) {
    $sql .= " AND PatientID LIKE '%" . $conn->real_escape_string($patientId) . "%'";
}
if (!empty($patientName)) {
    $sql .= " AND PatientName LIKE '%" . $conn->real_escape_string($patientName) . "%'";
}
if (!empty($patientMobile)) {
    $sql .= " AND ContactNumber LIKE '%" . $conn->real_escape_string($patientMobile) . "%'";
}

$result = mysqli_query($conn,$sql);

// Generate the HTML for the table rows
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

$conn->close();
?>
