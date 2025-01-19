<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comilla Central Medical - Patient Admission</title>
    <link rel="stylesheet" href="css/admission.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Menu -->
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="/Comilla_central_medical/appointment.php">Appointments</a></li>
                <li><a href="#patients">Patients</a></li>
                <li><a href="#doctors">Doctors</a></li>
                <li><a href="#departments">Departments</a></li>
                <li><a href="#billing">Billing</a></li>
                <li><a href="#pharmacy">Pharmacy</a></li>
                <li><a href="#reports">Reports</a></li>
                <li><a href="#settings">Settings</a></li>
                <li><a href="#help">Help</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Comilla Central Medical - Patient Admission</h1>
                <button class="logout-button">Logout</button>
            </header>
            <div class="content">
                <h2>Patient Admission</h2>
                <form class="admission-form">
                    <label for="name">Patient Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="3" required></textarea>

                    <label for="department">Department:</label>
                    <select id="department" name="department" required>
                        <option value="">Select</option>
                        <option value="Cardiology">Cardiology</option>
                        <option value="Neurology">Neurology</option>
                        <option value="Orthopedics">Orthopedics</option>
                        <option value="Pediatrics">Pediatrics</option>
                    </select>

                    <label for="doctor">Doctor:</label>
                    <select id="doctor" name="doctor" required>
                        <option value="">Select</option>
                        <option value="Dr. A">Dr. A</option>
                        <option value="Dr. B">Dr. B</option>
                        <option value="Dr. C">Dr. C</option>
                    </select>

                    <label for="admission-date">Admission Date:</label>
                    <input type="date" id="admission-date" name="admission-date" required>

                    <button type="submit" class="submit-button">Admit Patient</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>