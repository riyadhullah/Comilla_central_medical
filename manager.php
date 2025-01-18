<?php
session_start();
include 'db.php';

// if ($_SESSION['Role'] != 'Manager') {
//     header("Location: login.php");
//     exit();
// }

// Handle CRUD Operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $entity = $_POST['entity'];

    if ($entity == 'room') {
        if ($action == 'create') {
            $roomNumber = $_POST['room_number'];
            $roomType = $_POST['room_type'];
            $pricePerDay = $_POST['price_per_day'];
            $conn->query("INSERT INTO Rooms (RoomNumber, Type, PricePerDay) VALUES ('$roomNumber', '$roomType', '$pricePerDay')");
        } elseif ($action == 'update') {
            $roomID = $_POST['room_id'];
            $roomNumber = $_POST['room_number'];
            $roomType = $_POST['room_type'];
            $pricePerDay = $_POST['price_per_day'];
            $conn->query("UPDATE Rooms SET RoomNumber='$roomNumber', Type='$roomType', PricePerDay='$pricePerDay' WHERE RoomID='$roomID'");
        } elseif ($action == 'delete') {
            $roomID = $_POST['room_id'];
            $conn->query("DELETE FROM Rooms WHERE RoomID='$roomID'");
        }
    }

    if ($entity == 'doctor') {
        if ($action == 'create') {
            $doctorName = $_POST['doctor_name'];
            $specialization = $_POST['specialization'];
            $fee = $_POST['fee'];
            $conn->query("INSERT INTO Doctors (DoctorName, Specialization, Fee) VALUES ('$doctorName', '$specialization', '$fee')");
        } elseif ($action == 'update') {
            $doctorID = $_POST['doctor_id'];
            $doctorName = $_POST['doctor_name'];
            $specialization = $_POST['specialization'];
            $fee = $_POST['fee'];
            $conn->query("UPDATE Doctors SET DoctorName='$doctorName', Specialization='$specialization', Fee='$fee' WHERE DoctorID='$doctorID'");
        } elseif ($action == 'delete') {
            $doctorID = $_POST['doctor_id'];
            $conn->query("DELETE FROM Doctors WHERE DoctorID='$doctorID'");
        }
    }

    if ($entity == 'test') {
        if ($action == 'create') {
            $testName = $_POST['test_name'];
            $price = $_POST['price'];
            $conn->query("INSERT INTO Tests (TestName, Price) VALUES ('$testName', '$price')");
        } elseif ($action == 'update') {
            $testID = $_POST['test_id'];
            $testName = $_POST['test_name'];
            $price = $_POST['price'];
            $conn->query("UPDATE Tests SET TestName='$testName', Price='$price' WHERE TestID='$testID'");
        } elseif ($action == 'delete') {
            $testID = $_POST['test_id'];
            $conn->query("DELETE FROM Tests WHERE TestID='$testID'");
        }
    }
}

// Fetch data for display
$rooms = $conn->query("SELECT * FROM Rooms");
$doctors = $conn->query("SELECT * FROM Doctors");
$tests = $conn->query("SELECT * FROM Tests");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/manager.css">
    <title>Manager Dashboard</title>
</head>
<body>
    <h1>Manager Dashboard</h1>

    <h2>Manage Rooms</h2>
    <form method="POST">
        <input type="hidden" name="entity" value="room">
        <input type="hidden" name="action" value="create">
        <input type="text" name="room_number" placeholder="Room Number" required>
        <select name="room_type" required>
            <option value="General">General</option>
            <option value="Semi-Private">Semi-Private</option>
            <option value="Private">Private</option>
        </select>
        <input type="number" name="price_per_day" placeholder="Price Per Day" required>
        <button type="submit">Add Room</button>
    </form>
    <table>
        <tr>
            <th>Room ID</th>
            <th>Room Number</th>
            <th>Type</th>
            <th>Price Per Day</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $rooms->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['RoomID'] ?></td>
                <td><?= $row['RoomNumber'] ?></td>
                <td><?= $row['Type'] ?></td>
                <td><?= $row['PricePerDay'] ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="entity" value="room">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="room_id" value="<?= $row['RoomID'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2>Manage Doctors</h2>
    <!-- Similar to Room Management -->
    <h2>Manage Tests</h2>
    <!-- Similar to Room Management -->

</body>
</html>
