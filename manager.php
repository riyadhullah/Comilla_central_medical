<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Page</title>
    <link rel="stylesheet" href="css\\appointment_style.css"> <!-- -----------------change href ---------------- -->
    
</head>
<body>
    <form class="appointment-form" action="submit.php" method="post">
        <h1>Details</h1>
        
        <div class="form-group">
            <label for="fullname">Patient's Full Name : </label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        
        <div class="form-group">
            <label for="dob">Date of Birth :</label>
            <input type="date" name="dob" id="dob" required>
        </div>
        
        <div class="form-group">
            <label>Sex :</label>
            <div class="radio-group">
                 <label>
                     <input type="radio" name="sex" value="Male" required>
                      Male
                 </label>
                 <label>
                     <input type="radio" name="sex" value="Female">
                     Female
                 </label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="mobile">Mobile : </label>
            <input type="tel" id="mobile" name="mobile" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        
        <div class="form-group">
            <label for="specialty">Specialty for Consultation :</label>
            <select id="specialty" name="specialty" required>
                <option value="">Choose specialty</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Pediatrics">Pediatrics</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="doctor">Doctor :</label>
            <select id="doctor" name="doctor" required>
                <option value="">Select Consultant</option>
                <option value="Dr. Smith">Dr. Smith</option>
                <option value="Dr. Johnson">Dr. Johnson</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Preferred Date and Time for Appointment :</label>
            <select id="appointment-date" name="appointment-date" required>
                <option value="">Day</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
            </select>
        </div>
        
        <div class="btn-group">
            <button type="submit" class="btn-request">Request</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</body>
</html>
