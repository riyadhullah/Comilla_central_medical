<?php
session_start();
$_SESSION['patient_name'] = "John Doe"; // Example patient name

// Example appointment data
$appointments = [
    [
        "date" => "2025-01-15",
        "doctor" => "Dr. Sarah Ahmed",
        "time" => "10:00 AM",
        "status" => "Confirmed"
    ],
    [
        "date" => "2025-01-20",
        "doctor" => "Dr. David Smith",
        "time" => "2:00 PM",
        "status" => "Pending"
    ],
    [
        "date" => "2025-01-25",
        "doctor" => "Dr. Emily Johnson",
        "time" => "11:30 AM",
        "status" => "Completed"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - Comilla Central Medical</title>
    <link rel="stylesheet" href="css\p_view_appointment.css">
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
                <li><div class="settings-menu">
                    <a href="#settings" id="settings-icon">Settings</a>
                    <div class="dropdown" id="settings-dropdown" style="display: none;">
                        <a href="/Comilla_central_medical/p_change_pass.php">Change Password</a>
                    </div>
                </div></li>
                <li><a href="#help">Help</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header with Logout button -->
            <header>
                <h1>Comilla Central Medical</h1>
                <button class="logout-button">Logout</button>
            </header>

            <!-- Second Header for the dashboard -->
            <header>
                <h1>Your Appointment</h1>
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['patient_name']); ?>!</p>
            </header>

            <!-- Appointments List -->
            <div class="content">
                <?php foreach ($appointments as $appointment): ?>
                    <div class="appointment">
                        <h2>Date: <?php echo htmlspecialchars($appointment['date']); ?></h2>
                        <p><strong>Doctor:</strong> <?php echo htmlspecialchars($appointment['doctor']); ?></p>
                        <p><strong>Time:</strong> <?php echo htmlspecialchars($appointment['time']); ?></p>
                        <div class="status <?php echo htmlspecialchars($appointment['status']); ?>">
                            Status: <?php echo htmlspecialchars($appointment['status']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="/Comilla_central_medical/p_setting.js"></script>
</body>
</html>
