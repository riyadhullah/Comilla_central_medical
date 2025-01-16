<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointment</title>
    <link rel="stylesheet" href="css\\styles.css">
</head>
<body>
    <form class="appointment-form" action="submit.php" method="post">
        <h1>Make Appointment</h1>
        
        <div class="form-group">
            <label for="fullname">Patient's Full Name *</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        
        <div class="form-group">
            <label for="dob">Date of Birth *</label>
            <select id="dob-month" name="dob-month" required>
                <option value="">Month</option>
                <!-- Populate months dynamically -->
            </select>
            <select id="dob-day" name="dob-day" required>
                <option value="">Day</option>
                <!-- Populate days dynamically -->
            </select>
            <select id="dob-year" name="dob-year" required>
                <option value="">Year</option>
                <!-- Populate years dynamically -->
            </select>
        </div>
        
        <div class="form-group">
            <label>Sex *</label>
            <input type="radio" id="male" name="sex" value="Male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="sex" value="Female">
            <label for="female">Female</label>
        </div>
        
        <div class="form-group">
            <label for="mobile">Mobile *</label>
            <input type="tel" id="mobile" name="mobile" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="request">Request for *</label>
            <select id="request" name="request" required>
                <option value="">Choose One</option>
                <option value="Consultation">Consultation</option>
                <option value="Follow-up">Follow-up</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="specialty">Specialty for Consultation *</label>
            <select id="specialty" name="specialty" required>
                <option value="Dermatology">Dermatology & Venereology</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Pediatrics">Pediatrics</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="doctor">Doctor *</label>
            <select id="doctor" name="doctor" required>
                <option value="">Select Consultant</option>
                <option value="Dr. Smith">Dr. Smith</option>
                <option value="Dr. Johnson">Dr. Johnson</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Preferred Date and Time for Appointment *</label>
            <select id="appointment-date" name="appointment-date" required>
                <option value="">Date</option>
            </select>
            <select id="appointment-time" name="appointment-time" required>
                <option value="">Time</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="uhid">UHID (if any)</label>
            <input type="text" id="uhid" name="uhid">
        </div>
        
        <div class="recaptcha">
            <label>I’m not a robot</label>
            <div class="g-recaptcha" data-sitekey="your_site_key"></div>
        </div>
        
        <div class="btn-group">
            <button type="submit" class="btn-request">Request</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
