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
    <style>
        /* General styles */
        body {
             font-family: Arial, sans-serif;
             margin: 0;
             padding: 0;
             display: flex;
             justify-content: center;
             align-items: center;
             min-height: 100vh;
             background-color: #eef2f7; /* Softer background */
        }

        .container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: #007BFF;
            color: white;
            padding: 20px 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            height: auto;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #0056b3;
        }

        .main-content {
             flex-grow: 1;
             padding: 20px;
             display: flex;
             flex-direction: column;
             position: relative;
             background: #fdfefe;
             overflow-y: auto;
        }

        header {
             display: flex;
             justify-content: space-between;
             align-items: center;
             border-bottom: 2px solid #ddd;
             padding-bottom: 10px;
             margin-top: 20px;
        }

         header h1 {
             margin: 0;
             font-size: 28px;
             color: #2c3e50;
             font-weight: bold;
             text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
             letter-spacing: 1px;
        }

        header p {
             font-size: 18px;
             color: #007BFF;
             margin: 0;
             font-style: italic;
        }
        .logout-button {
             background-color: #e67e22;
             color: white;
             border: none;
             border-radius: 30px;
             padding: 10px 20px;
             font-size: 14px;
             font-weight: bold;
             cursor: pointer;
             transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
             box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .logout-button:hover {
             background-color: #d35400;
             box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3);
             transform: translateY(-2px);
        }

        /* Content */
        .content {
             margin-top: 10px;
        }

        .stats, .quick-actions, .health-records, .announcements, .feedback-section {
            margin-top: 20px;
        }

        .stat-card, .record-card, .announcement-card, .feedback-card {
            background-color: white;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .quick-actions button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .quick-actions button:hover {
            background-color: #0056b3;
        }

        .feedback-section textarea {
            width: 100%;
            height: 100px;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .feedback-section button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .feedback-section button:hover {
            background-color: #218838;
        }
        .welcome-message {
            margin: 20px 0;
            font-size: 24px;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar Menu -->
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="/Comilla_central_medical/p_dashboard.php">Dashboard</a></li>
                <li><a href="/Comilla_central_medical/appointment.php">Make Appointment</a></li>
                <li><a href="/Comilla_central_medical/p_prescription.php">Prescription</a></li>
                <li><a href="/Comilla_central_medical/p_view_appointment.php">View Appointment</a></li>
                <li><a href="/Comilla_central_medical/settings.php">Billing</a></li>
                <li><a href="/Comilla_central_medical/settings.php">Settings</a></li>
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
