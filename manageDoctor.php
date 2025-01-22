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
        $doctorId = $_POST['doctor_id'];

        if (!empty($doctorName) && !empty($specialization) && !empty($fee) && !empty($contactNumber) && !empty($email)) {
            $stmt = $conn->prepare("UPDATE Doctors SET DoctorName=?, Specialization=?, Fees=?, ContactNumber=?, DoctorEmail=?, DoctorPassword=?, DoctorAvailable=? WHERE DoctorID=?");
            $stmt->bind_param("ssdssssi", $doctorName, $specialization, $fee, $contactNumber, $email, $password, $daysAvailable, $doctorId);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($entity === 'doctor' && $action === 'delete') {
        $doctorId = $_POST['doctor_id'];
        if (!empty($doctorId)) {
            $stmt = $conn->prepare("DELETE FROM Doctor WHERE DoctorID = ?");
            $stmt->bind_param("i", $doctorId);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Fetch data for display
$doctor = $conn->query("SELECT * FROM Doctor");
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
                <li><a href="/Comilla_central_medical/managerDashboard.php">Dashboard</a></li>
                <li><a href="/Comilla_central_medical/manager.php">Manage Rooms</a></li>
                <li><a href="/Comilla_central_medical/manageDoctor.php">Manage Doctors</a></li>
                <li><a href="/Comilla_central_medical/manageTests.php">Manage Tests</a></li>
                <li><a href="/Comilla_central_medical/manageReceptionist.php">Manage Receptionist</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
        <form action="logout.php">
            <header>
                <h1>Comilla Central Medical - Dashboard</h1>
                <button class="logout-button">Logout</button>
            </header>
            </form>

            <div class="content">
                <h2>Update Doctor Information</h2>
                <div class="input-container">
                    <form method="POST">
                        <input type="hidden" name="entity" value="doctor">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="doctor_id" value="<?= $doctorId ?? '' ?>"> <!-- for update -->
                        <input type="text" name="doctor_name" placeholder="Doctor Name" value="<?= $doctorName ?? '' ?>" required>
                        <input type="text" name="specialization" placeholder="Specialization" value="<?= $specialization ?? '' ?>" required>
                        <input type="number" name="fee" placeholder="Visit Fee" step="0.01" value="<?= $fee ?? '' ?>" required>
                        <input type="text" name="contact_number" placeholder="Contact Number" value="<?= $contactNumber ?? '' ?>" required>
                        <input type="email" name="email" placeholder="Email Address" value="<?= $email ?? '' ?>" required>
                       
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
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = $doctor->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['DoctorID'] ?></td>
                            <td><?= $row['DoctorName'] ?></td>
                            <td><?= $row['Specialization'] ?></td>
                            <td><?= $row['Fees'] ?></td>
                            <td><?= $row['ContactNumber'] ?></td>
                            <td><?= $row['DoctorEmail'] ?></td>
                            <td><?= $row['DoctorPassword'] ?></td>
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
