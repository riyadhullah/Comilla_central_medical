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


        .prescription {
            border: 2px solid #e6e6e6;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
            transition: box-shadow 0.3s ease, transform 0.2s ease;
        }

        .prescription:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
        }

        .prescription h2 {
            margin: 0 0 10px;
            font-size: 20px;
            color: #333;
        }

        .prescription p {
            margin: 5px 0;
            font-size: 15px;
            color: #555;
        }

        .medications ul {
            margin: 10px 0 0;
            padding-left: 20px;
            list-style-type: disc;
            color: #444;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }

        footer a {
            color: #0056b3;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
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
                <li><a href="/Comilla_central_medical/billing.php">Billing</a></li>
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

            <div class="content">
                <header>
                    <h1>Your Prescriptions</h1>
                    <p>Welcome, <?php echo htmlspecialchars($_SESSION['patient_name']); ?>!</p>
                </header>

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
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Footer Section -->
            <footer>
                <p>Need help? <a href="/Comilla_central_medical/contact_us.php">Contact Us</a></p>
            </footer>
        </div>
    </div>
</body>

</html>
