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
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#admission">Admission</a></li>
                <li><a href="/Comilla_central_medical/appointment.php">Appointments</a></li>
                <li><a href="#patients">Patients</a></li>
                <li><a href="#doctors">Doctors</a></li>
                <li><a href="#billing">Billing</a></li>
                <li><a href="#reports">Reports</a></li>
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
                <p>125</p>
            </div>
            <div class="card">
                <h4>Admitted Patients</h4>
                <p>45</p>
            </div>
            <div class="card">
                <h4>Total Doctors</h4>
                <p>20</p>
            </div>
            <div class="card">
                <h4>Total Nurses</h4>
                <p>35</p>
            </div>
            <div class="card">
                <h4>Available Rooms</h4>
                <p>10</p>
            </div>

            
        </section>

        <!-- Appointments Section -->
        <section class="appointments">
                <h3>Patient Appointments</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Mobile Number</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Sex</th>
                            <th>Email</th>
                            <th>Specialty for Consultation</th>
                            <th>Doctor</th>
                            <th>Preferred Day</th>
                            <th>Date for Appointment</th>
                            <th>Submission Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1234567890</td>
                            <td>John Doe</td>
                            <td>1990-05-15</td>
                            <td>Male</td>
                            <td>johndoe@example.com</td>
                            <td>Cardiology</td>
                            <td>Dr. Smith</td>
                            <td>Monday</td>
                            <td>2025-01-25</td>
                            <td>2025-01-19</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="accept">Accept</button>
                                    <button class="reject">Reject</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>0987654321</td>
                            <td>Jane Roe</td>
                            <td>1985-09-25</td>
                            <td>Female</td>
                            <td>janeroe@example.com</td>
                            <td>Dermatology</td>
                            <td>Dr. Adams</td>
                            <td>Wednesday</td>
                            <td>2025-01-27</td>
                            <td>2025-01-18</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="accept">Accept</button>
                                    <button class="reject">Reject</button>
                                </div>
                            </td>
                        </tr>
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

        <!-- Quick Actions Section -->
        <section class="quick-actions">
            <h3>Quick Actions</h3>
            <ul>
                <li><a href="#">Admit New Patient</a></li>
                <li><a href="#">Schedule Appointments</a></li>
                <li><a href="#">Generate Billing</a></li>
                <li><a href="#">Update Room Availability</a></li>
            </ul>
        </section>

        <!-- Notifications Section -->
        <section class="notifications">
            <h3>Notifications</h3>
            <ul>
                <li>John Doe has been admitted to Room 101.</li>
                <li>Dr. Smith has updated his schedule.</li>
                <li>5 new patients have been registered today.</li>
                <li>Room 202 is now available.</li>
            </ul>
        </section>
    </div>

        </div>
    </div>
</body>
</html>
