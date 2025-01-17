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

        .appointment {
            border: 2px solid #e6e6e6;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
            transition: box-shadow 0.3s ease, transform 0.2s ease;
        }

        .appointment:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
        }

        .status {
            font-weight: bold;
            margin-top: 10px;
        }

        .status.Confirmed {
            color: green;
        }

        .status.Pending {
            color: orange;
        }

        .status.Completed {
            color: gray;
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
</body>
</html>
