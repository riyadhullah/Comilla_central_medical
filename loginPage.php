<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login_style.css">

</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form id="login-form" action="loginValidation.php" method="POST">
            <div class="form-group1">
                <label for="user-type">User Type:</label>
                <select id="user-type" name="user_type" required>
                    <option value="" disabled selected>Select User Type</option>
                    <option value="manager">Manager</option>
                    <option value="receptionist">Receptionist</option>
                    <option value="patient">Patient</option>
                </select>
            </div>
            <!-- Username Field -->
            <div class="form-group" id="username-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
            </div>
            <!-- Contact Number Field for Patient -->
            <div class="form-group" id="contact-group" style="display: none;">
                <label for="contact-number">Contact Number:</label>
                <input type="text" id="contact-number" name="contact_number" placeholder="Enter your contact number" >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
        <!-- Signup link for patients only -->
        <p id="signup-link" style="display: none;">No account? <a href="p_signup.php">Please Signup</a></p>
    </div>
    <script src="login.js"></script>
</body>
</html>
