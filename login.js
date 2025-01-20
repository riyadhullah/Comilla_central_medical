 // Handle User Type selection for login form
 document.addEventListener("DOMContentLoaded", function() {
    const userTypeSelect = document.getElementById('user-type');
    const usernameGroup = document.getElementById('username-group');
    const contactNumberGroup = document.getElementById('contact-group');
    const signupLink = document.getElementById('signup-link');
    
    userTypeSelect.addEventListener('change', function() {
        if (userTypeSelect.value === 'patient') {
            usernameGroup.style.display = 'none'; // Hide Username field
            contactNumberGroup.style.display = 'block'; // Show Contact Number field
            signupLink.style.display = 'block'; // Show signup link for patients only
        } else {
            usernameGroup.style.display = 'block'; // Show Username field
            contactNumberGroup.style.display = 'none'; // Hide Contact Number field
            signupLink.style.display = 'none'; // Hide signup link for non-patients
        }
    });
});

// Check if the message parameter is set in the URL (for success message)
const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('message');

// If the message is 'login_success', show the success message
if (message === 'login_success') {
    // Create a div element to display the message
    const successMessage = document.createElement('div');
    successMessage.style.backgroundColor = '#4CAF50';
    successMessage.style.color = 'white';
    successMessage.style.padding = '15px';
    successMessage.style.margin = '10px 0';
    successMessage.style.borderRadius = '5px';
    successMessage.textContent = 'Successfully logged in!';

    // Append the message to the body or any other container
    document.body.prepend(successMessage); // or append to any specific element
}