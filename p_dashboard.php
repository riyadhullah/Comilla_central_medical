<?php
// Start the session to simulate a logged-in patient and some prescription data
session_start();
$_SESSION['patient_name'] = "John Doe"; // Example patient name

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="css\p_dashboard.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Menu -->
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="/Comilla_central_medical/p_dashboard.php">Dashboard</a></li>
                <li><a href="/Comilla_central_medical/p_profile.php">Profile</a></li>
                <li><a href="/Comilla_central_medical/appointment.php">Make Appointment</a></li>
                <li><a href="/Comilla_central_medical/p_prescription.php">Prescription</a></li>
                <li><a href="/Comilla_central_medical/p_view_appointment.php">View Appointment</a></li>
                <li><a href="/Comilla_central_medical/p_profile.php">Billing</a></li>
                <li><a href="/Comilla_central_medical/p_setting.php">Settings</a></li>
                <li><a href="#help">Help</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                 <h1>Comilla Central Medical</h1>
                <button class="logout-button">Logout</button>
            </header>
            <header>
                    <h1>Your Dashboard</h1>
                    <p>Welcome, <?php echo htmlspecialchars($_SESSION['patient_name']); ?>!</p>
                </header>
               
            <!-- Stats Section -->
            <div class="stats">
                <div class="stat-card">Upcoming Appointments: 2</div>
                <div class="stat-card">Last Appointment: 15 Jan 2025</div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <button onclick="location.href='/Comilla_central_medical/appointment.php'">Make Appointment</button>
                <button onclick="location.href='/Comilla_central_medical/p_prescription.php'">View prescription</button>
                <button onclick="location.href='/Comilla_central_medical/p_view_appointment.php'">View Appointment</button>
            </div>

            <!-- Health Records -->
            <div class="health-records">
                <h3>Recent Health Records</h3>
                <div class="record-card">Blood Test Report: Normal (12 Jan 2025)</div>
                <div class="record-card">Prescription: Amoxicillin 500mg (15 Jan 2025)</div>
            </div>

            <!-- Announcements -->
            <div class="announcements">
                <h3>Announcements</h3>
                <div class="announcement-card">Clinic will remain closed on 20 Jan 2025 for maintenance.</div>
                <div class="announcement-card">New Vaccination Program starts from 1 Feb 2025.</div>
            </div>

            <!-- Feedback Section -->
            <div class="feedback-section">
                <h3>Share Your Feedback</h3>
                <textarea placeholder="Write your feedback here..."></textarea>
                <button>Submit Feedback</button>
            </div>
        </div>
    </div>
</body>
</html>
