<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Change as per your database credentials
$password = "";     // Change as per your database credentials
$dbname = "hospitalmanagementsystem"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Secure password storage
    $address = $_POST['address'];
    $blood_group = $_POST['blood_group'];

   // Check for duplicate entries
   $duplicateCheck = "SELECT * FROM patientinformation WHERE ContactNumber='$contact_number'";
   $result = $conn->query($duplicateCheck);

    if ($result->num_rows > 0) {
        echo "
        <script>
            window.history.back();
            alert('This contact number ($contact_number) is already registered. Please use a different number.'); 
        </script>
        ";
    } else {
        // Insert data using prepared statement
        // SQL query to insert data
        $sql = "INSERT INTO patientinformation (PatientName, DateOfBirth, Gender, ContactNumber, Email, Password, Address, BloodGroup) 
                VALUES ('$full_name', '$dob', '$gender', '$contact_number', '$email', '$password', '$address', '$blood_group')";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script>
                window.location.href = '/Comilla_central_medical/p_dashboard.php'; // Redirect to dashboard
                alert('Signup successful! You can now log in.');
            </script>
            ";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Signup</title>
    <link rel="stylesheet" href="css/p_signup.css">
    <script>
        // Client-side validation
        function validateForm() {
            const contactNumber = document.getElementById("contact_number").value;
            const password = document.getElementById("password").value;

            if (!/^\d{11}$/.test(contactNumber)) { // Example: 11-digit validation
                alert("Please enter a valid 11-digit contact number.");
                return false;
            }

            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <!-- Sidebar Menu -->
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="/Comilla_central_medical/p_dashboard.php">Dashboard</a></li>
                <li><a href="/Comilla_central_medical/p_profile.php">Profile</a></li>
                <li><a href="/Comilla_central_medical/appointment.php">Make Appointment</a></li>
                <li><a href="/Comilla_central_medical/p_prescription.php">Prescription</a></li>
                <li><a href="/Comilla_central_medical/p_view_appointment.php">View Appointment</a></li>
                <li><a href="/Comilla_central_medical/p_profile.php">Billing</a></li>
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

            <!-- Signup Form -->
            <form class="appointment-form" action="" method="post" onsubmit="return validateForm()">
                <h1>Patient Signup</h1>
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" name="contact_number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="blood_group">Blood Group</label>
                    <select id="blood_group" name="blood_group">
                        <option value="">Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
                <div class="btn-group">
                    <button type="submit">Signup</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
