<?php
// Start the session to simulate a logged-in patient and some prescription data
session_start();
$_SESSION['patient_name'] = "John Doe"; // Example patient name

// Example prescription data
$prescriptions = [
    [
        "date" => "2025-01-10",
        "doctor" => "Dr. Sarah Ahmed",
        "medications" => [
            "Paracetamol 500mg - Twice daily after meals",
            "Amoxicillin 250mg - Three times daily for 7 days",
            "Vitamin C 500mg - Once daily"
        ],
        "notes" => "Drink plenty of water and rest."
    ],
    [
        "date" => "2025-01-03",
        "doctor" => "Dr. David Smith",
        "medications" => [
            "Ibuprofen 200mg - As needed for pain",
            "Omeprazole 20mg - Once daily before breakfast"
        ],
        "notes" => "Avoid spicy foods and monitor symptoms."
    ],
    [
        "date" => "2025-01-03",
        "doctor" => "Dr. David Smith",
        "medications" => [
            "Ibuprofen 200mg - As needed for pain",
            "Omeprazole 20mg - Once daily before breakfast"
        ],
        "notes" => "Avoid spicy foods and monitor symptoms."
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescriptions - Comilla Central Medical</title>
    <link rel="stylesheet" href="css\p_prescription.css">
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
            <header>
                <h1>Comilla Central Medical</h1>
                <button class="logout-button">Logout</button>
            </header>

            <!-- Second Header for the dashboard -->
            <header>
                <h1>Your Prescription</h1>
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['patient_name']); ?>!</p>
            </header>

            <div class="content">
            
                <!-- Prescriptions List -->
                <?php foreach ($prescriptions as $prescription): ?>
                    <div class="prescription">
                        <h2>Date: <?php echo htmlspecialchars($prescription['date']); ?></h2>
                        <p><strong>Prescribed by:</strong> <?php echo htmlspecialchars($prescription['doctor']); ?></p>
                        <div class="medications">
                            <strong>Medications:</strong>
                            <ul>
                                <?php foreach ($prescription['medications'] as $medication): ?>
                                    <li><?php echo htmlspecialchars($medication); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <p><strong>Additional Notes:</strong> <?php echo htmlspecialchars($prescription['notes']); ?></p>
                        <a href="pdf.php" class="download-button">Download PDF</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Footer Section -->
            <footer>
                <p>Need help? <a href="/Comilla_central_medical/contact_us.php">Contact Us</a></p>
            </footer>
        </div>
    </div>
    <script src="/Comilla_central_medical/p_setting.js"></script>
</body>

</html>
