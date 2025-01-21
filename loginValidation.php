<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "Comilla_central_medical"; // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die(json_encode([
        "success" => false,
        "message" => "Database connection failed: " . mysqli_connect_error()
    ]));
}

// Set the response type to JSON
header('Content-Type: application/json');

// Get form data
$user_type = $_POST['user_type'];
$user_password = trim($_POST['password']);

// Initialize query variables
$contact_number = "";
$user_username = "";

if ($user_type == 'patient') {
    // For patient, we use contact number
    $contact_number = $_POST['contact_number'];
} else {
    // For manager and receptionist, we use username
    $user_username = $_POST['username'];
}

// Check if user exists in the database based on user type
if ($user_type == 'patient') {
    // Patient login
    $sql = "SELECT * FROM Patient WHERE ContactNumber = '$contact_number' LIMIT 1";
} else {
    // Manager or Receptionist login
    $sql = "SELECT * FROM Users WHERE Username = '$user_username' LIMIT 1";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User found, now check the password
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['Password']; // Database stored password
    if ($user_password === $stored_password) {
        // Password is correct, login successful
        session_start();
        $_SESSION['user_id'] = $user_type == 'patient' ? $row['PatientID'] : $row['UserID'];
        $_SESSION['user_name'] = $user_type == 'patient' ? $row['PatientName'] : $row['Username'];

        // Determine the redirect URL
        $redirect_url = ($user_type == 'patient') ? "p_dashboard.php" : "dashboard.php";

        // Send success response as JSON
        echo json_encode([
            "success" => true,
            "message" => "Login successful!",
            "redirect_url" => $redirect_url
        ]);
    } else {
        // Invalid password
        echo json_encode([
            "success" => false,
            "message" => "Invalid password."
        ]);
    }
} else {
    // User not found
    echo json_encode([
        "success" => false,
        "message" => "User not found."
    ]);
}

mysqli_close($conn);
?>
