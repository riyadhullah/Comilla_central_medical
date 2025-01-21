<?php
session_start();
include 'db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entity = $_POST['entity'] ?? '';
    $action = $_POST['action'] ?? '';

    if ($entity === 'doctor' && $action === 'update') {
        $doctorName = $_POST['doctor_name'];
        $specialization = $_POST['specialization'];
        $fee = $_POST['fee'];
        $contactNumber = $_POST['contact_number'];
        $email = $_POST['email'];
        $daysAvailable = implode(", ", $_POST['days_available'] ?? []);

        if (!empty($doctorName) && !empty($specialization) && !empty($fee) && !empty($contactNumber) && !empty($email)) {
            $stmt = $conn->prepare("INSERT INTO Doctors (DoctorID, DoctorName, Specialization, Fees, ContactNumber, DoctorEmail,DoctorPassword, DoctorAvailable) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdsss", $doctorName, $specialization, $fee, $contactNumber, $email, $daysAvailable);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($entity === 'doctor' && $action === 'delete') {
        $doctorId = $_POST['doctor_id'];
        if (!empty($doctorId)) {
            $stmt = $conn->prepare("DELETE FROM Doctors WHERE DoctorID = ?");
            $stmt->bind_param("i", $doctorId);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Fetch data for display
$doctors = $conn->query("SELECT * FROM Doctor");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors</title>
    <link rel="stylesheet" href="css/manageDoctor.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="/Comilla_central_medical/manager.php">Manage Rooms</a></li>
                <li><a href="/Comilla_central_medical/manageDoctor.php">Manage Doctors</a></li>
                <li><a href="/Comilla_central_medical/manageTests.php">Manage Tests</a></li>
                <li><a href="#settings">Settings</a></li>
                <li><a href="#help">Help</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Manage Doctors</h1>
                <button class="logout-button">Logout</button>
            </header>

            <div class="content">
                <h2>Update Doctor Information</h2>
                <div class="input-container">
                    <form method="POST">
                        <input type="hidden" name="entity" value="doctor">
                        <input type="hidden" name="action" value="update">
                        <input type="text" name="doctor_name" placeholder="Doctor Name" required>
                        <input type="text" name="specialization" placeholder="Specialization" required>
                        <input type="number" name="fee" placeholder="Visit Fee" step="0.01" required>
                        <input type="text" name="contact_number" placeholder="Contact Number" required>
                        <input type="email" name="email" placeholder="Email Address" required>
                        <div class="days-available">
                            <label>Days Available:</label>
                            <label><input type="checkbox" name="days_available[]" value="Monday"> Monday</label>
                            <label><input type="checkbox" name="days_available[]" value="Tuesday"> Tuesday</label>
                            <label><input type="checkbox" name="days_available[]" value="Wednesday"> Wednesday</label>
                            <label><input type="checkbox" name="days_available[]" value="Thursday"> Thursday</label>
                            <label><input type="checkbox" name="days_available[]" value="Friday"> Friday</label>
                            <label><input type="checkbox" name="days_available[]" value="Saturday"> Saturday</label>
                            <label><input type="checkbox" name="days_available[]" value="Sunday"> Sunday</label>
                        </div>
                        <button type="submit" class="update-doctor-button">Update Doctor</button>
                    </form>
                </div>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Specialization</th>
                        <th>Fee</th>
                        <th>Contact</th>
                        <th>Email</th>

                        <th>Password</th>
                        <th>Days Available</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = $doctors->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['DoctorID'] ?></td>
                            <td><?= $row['DoctorName'] ?></td>
                            <td><?= $row['Specialization'] ?></td>
                            <td><?= $row['Fees'] ?></td>
                            <td><?= $row['ContactNumber'] ?></td>
                            <td><?= $row['DoctorEmail'] ?></td>

                            <td><?= $row['DoctorPassword'] ?></td>
                            <td><?= $row['DoctorAvailable'] ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="entity" value="doctor">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="doctor_id" value="<?= $row['DoctorID'] ?>">
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
