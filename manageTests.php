<?php
session_start();
include 'db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entity = $_POST['entity'] ?? '';
    $action = $_POST['action'] ?? '';

    if ($entity === 'test' && $action === 'create') {
        $testName = $_POST['test_name'];
        $price = $_POST['price'];

        if (!empty($testName) && !empty($price)) {
            $stmt = $conn->prepare("INSERT INTO Tests (TestName, Price) VALUES (?, ?)");
            $stmt->bind_param("sd", $testName, $price);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($entity === 'test' && $action === 'delete') {
        $testId = $_POST['test_id'];
        if (!empty($testId)) {
            $stmt = $conn->prepare("DELETE FROM Tests WHERE TestID = ?");
            $stmt->bind_param("i", $testId);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Fetch data for display
$tests = $conn->query("SELECT * FROM Tests");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tests</title>
    <link rel="stylesheet" href="css/manageTests.css">
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
                <h1>Manage Tests</h1>
                <button class="logout-button">Logout</button>
            </header>

            <div class="content">
                <h2>Register New Test</h2>
                <div class="input-container">
                    <form method="POST">
                        <input type="hidden" name="entity" value="test">
                        <input type="hidden" name="action" value="create">
                        <input type="text" name="test_name" placeholder="Test Name" required>
                        <input type="number" name="price" placeholder="Price" step="0.01" required>
                        <button type="submit" class="add-test-button">Add Test</button>
                    </form>
                </div>

                <table>
                    <tr>
                        <th>Test ID</th>
                        <th>Test Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = $tests->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['TestID'] ?></td>
                            <td><?= $row['TestName'] ?></td>
                            <td><?= $row['Price'] ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="entity" value="test">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="test_id" value="<?= $row['TestID'] ?>">
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
