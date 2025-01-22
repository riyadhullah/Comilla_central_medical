<?php
session_start();
// Database configuration
$host = 'localhost'; // Replace with your host
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$dbname = 'comilla_central_medical'; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entity = $_POST['entity'] ?? '';
    $action = $_POST['action'] ?? '';

    if ($entity === 'room' && $action === 'create') {
        $roomNumber = $_POST['room_number'];
        $roomType = $_POST['room_type'];
        $pricePerDay = $_POST['price_per_day'];

        if (!empty($roomNumber) && !empty($roomType) && !empty($pricePerDay)) {
            $stmt = $conn->prepare("INSERT INTO room (RoomNumber, RoomType, RoomPrice) VALUES (?, ?, ?)");
            $stmt->bind_param("ssd", $roomNumber, $roomType, $pricePerDay);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($entity === 'room' && $action === 'delete') {
        $roomId = $_POST['room_id'];
        if (!empty($roomId)) {
            $stmt = $conn->prepare("DELETE FROM room WHERE RoomID = ?");
            $stmt->bind_param("i", $roomId);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Fetch data for display
$rooms = $conn->query("SELECT * FROM room");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Rooms</title>
    <link rel="stylesheet" href="sempleMenuBar/sempleMenuBar.css">
    <link rel="stylesheet" href="css/manager.css">
</head>
<body>
    <div class="container">
        <!-- Include Sidebar -->
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

            <!-- Manager Sections -->
            <div class="content">
            <h2>Modify Rooms</h2>
            <div class="input-container">
                <form method="POST">
                    <input type="hidden" name="entity" value="receptionist">
                    <input type="hidden" name="action" value="create">
                    <input type="text" name="rec_name" placeholder="Receptionist Name" required><br>
                    <input type="text" name="rec_address" placeholder="Receptionist Address" required><br>
                    <input type="text" name="rec_number" placeholder="Receptionist Contact Number" required><br>
                    <input type="password" name="rec_password" placeholder="Password" required><br>
                    <button type="submit" class="add-receptionist-button">Add Receptionist</button>
                </form>
            </div>


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
                        <td><?= $row['RoomType'] ?></td>
                        <td><?= $row['RoomPrice'] ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="entity" value="room">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="room_id" value="<?= $row['RoomID'] ?>">
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
