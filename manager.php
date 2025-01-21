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
            $stmt = $conn->prepare("INSERT INTO Rooms (RoomNumber, Type, PricePerDay) VALUES (?, ?, ?)");
            $stmt->bind_param("ssd", $roomNumber, $roomType, $pricePerDay);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($entity === 'room' && $action === 'delete') {
        $roomId = $_POST['room_id'];
        if (!empty($roomId)) {
            $stmt = $conn->prepare("DELETE FROM Rooms WHERE RoomID = ?");
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
                <h1>Manage Rooms</h1>
                <button class="logout-button">Logout</button>
            </header>

            <!-- Manager Sections -->
            <div class="content">
            <h2>Modify Rooms</h2>
            <div class="input-container">
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
                    <button type="submit" class="add-room-button">Add Room</button>
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
                            <td><?= $row['roomType'] ?></td>
                            <td><?= $row['PricePerDay'] ?></td>
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
