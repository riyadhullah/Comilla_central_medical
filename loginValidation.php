<?php
// Database connection
$servername = "localhost";
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "Comilla_central_medical"; // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

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
        echo "Password is correct, login successful";
        session_start();
        $_SESSION['user_id'] = $row['ID'];
        $_SESSION['user_name'] = $row['Name'];
        
        // Redirect to respective dashboard
        if ($user_type == 'patient') {
            header("Location: p_dashboard.php"); // Patient Dashboard
        } else {
            header("Location: dashboard.php"); // Manager/Receptionist Dashboard
        }
        exit(); // Ensure the script stops executing after redirect
    } else {
        // Invalid password
        echo "Invalid password.";
    }
} else {
    // User not found
    echo "User not found.";
}

mysqli_close($conn);
?>
