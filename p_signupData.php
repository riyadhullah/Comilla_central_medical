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
    // Retrieve form data and sanitize inputs
    // Retrieve form data
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
        // Duplicate contact number exists
        echo "
        <script>
            alert('This contact number ($contact_number) is already registered. Please use a different number.');
            window.history.back();
        </script>
        ";
    } else {
        // SQL query to insert data
        $sql = "INSERT INTO patientinformation (PatientName, DateOfBirth, Gender, ContactNumber, Email, Password, Address, BloodGroup) 
                VALUES ('$full_name', '$dob', '$gender', '$contact_number', '$email', '$password', '$address', '$blood_group')";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script>
                alert('Signup successful! You can now log in.');
                window.location.href = '/Comilla_central_medical/p_dashboard.php'; // Redirect to login page
            </script>
            ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
