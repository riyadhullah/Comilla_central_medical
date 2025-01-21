<?php
include 'db.php';

$sql = "SELECT *FROM patient";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$countPatient = mysqli_num_rows($result);

$sql = "SELECT * FROM `admission` WHERE `AdmissionStatus` LIKE 'Admitted'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$countAdmittedPatient = mysqli_num_rows($result);

$sql = "SELECT * FROM `doctor`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$countDoctor = mysqli_num_rows($result);

$sql = "SELECT * FROM `room`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$countRoom = mysqli_num_rows($result);



$sql = "SELECT 
            a.AppointmentID, 
            p.PatientName, 
            p.ContactNumber, 
            d.DoctorName, 
            d.Specialization, 
            a.AppointmentDate
        FROM `appointment` a
        INNER JOIN `patient` p ON a.PatientID = p.PatientID
        INNER JOIN `doctor` d ON a.DoctorID = d.DoctorID
        WHERE a.Status = 'Pending'";

$result11 = mysqli_query($conn, $sql);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionist Dashboard - Comilla Central Medical</title>
    <link rel="stylesheet" href="css/r_dashboard.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Menu -->
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="/Comilla_central_medical/r_dashboard.php">Dashboard</a></li>
                <li><a href="/Comilla_central_medical/Admission/admission.php">Admission</a></li>
                <li><a href="/Comilla_central_medical/appointment.php">Appointments</a></li>
                <li><a href="/Comilla_central_medical/Patient/patient.php">Patients</a></li>
                <li><a href="#doctors">Doctors</a></li>
                <li><a href="#settings">Settings</a></li>
                <li><a href="#help">Help</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Receptionist Dashboard</h1>
                <button class="logout-button">Logout</button>
            </header>
            <div class="content">
        <!-- Overview Section -->
        <section class="overview">
            <div class="card">
                <h4>Total Patients</h4>
                <p><?php echo $countPatient ?></p>
            </div>
            <div class="card">
                <h4>Admitted Patients</h4>
                <p><?php echo $countAdmittedPatient ?></p>
            </div>
            <div class="card">
                <h4>Total Doctors</h4>
                <p><?php echo $countDoctor ?></p>
            </div>
            <div class="card">
                <h4>Available Rooms</h4>
                <p><?php echo $countRoom ?></p>
            </div>

            
        </section>

        <!-- Appointments Section -->
        <section class="appointments">
                <h3>Patient Appointments</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Appointment Id</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Date for Appointment</th>
                            <th>Specialty for Consultation</th>
                            <th>Doctor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while ($row = mysqli_fetch_array($result11, MYSQLI_ASSOC)) {
                            echo "
                            <tr>
                                <td>{$row['AppointmentID']}</td>
                                <td>{$row['PatientName']}</td>
                                <td>{$row['ContactNumber']}</td>
                                <td>{$row['AppointmentDate']}</td>
                                <td>{$row['Specialization']}</td>
                                <td>{$row['DoctorName']}</td>
                                <td>
                                    <form method='POST' action='update_appointment_status.php' class='appointment-form'>
                                        <input type='hidden' name='appointmentId' value='{$row['AppointmentID']}'>
                                        <input type='hidden' name='status' value='Accepted'>
                                        <button type='submit' class='accept-btn'>Accept</button>
                                    </form>
                                    <form method='POST' action='update_appointment_status.php' class='appointment-form'>
                                        <input type='hidden' name='appointmentId' value='{$row['AppointmentID']}'>
                                        <input type='hidden' name='status' value='Rejected'>
                                        <button type='submit' class='reject-btn'>Reject</button>
                                    </form>

                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>


        <!-- Patient Search Section -->
        <section class="patient-search">
            <h3>Search for Patients</h3>
            <form action="#" method="GET" onsubmit="showPatientDetails(event)">
                <input type="text" name="patient_name" placeholder="Enter patient name or ID" required>
                <button type="submit">Search</button>
            </form>
            <div class="patient-details" id="patient-details">
                <h4>Patient Details</h4>
                <table>
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Room</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>John Doe</td>
                            <td>45</td>
                            <td>102</td>
                            <td>Admitted</td>
                        </tr>
                        <tr>
                            <td>103</td>
                            <td>Jane Smith</td>
                            <td>30</td>
                            <td>103</td>
                            <td>Discharged</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <script>
            function showPatientDetails(event) {
                event.preventDefault();
                document.getElementById('patient-details').style.display = 'block';
            }
        </script>
    </div>

        </div>
    </div>
</body>
</html>
