$(document).ready(function() {
  // Form submission
  $('#registrationForm').submit(function(event) {
      event.preventDefault();
      
      var username = $('#username').val().trim();
      var email = $('#email').val().trim();
      var password = $('#password').val();
      var confirmPassword = $('#confirmPassword').val();
      
      // Password validation regex pattern
      var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
      
      if (username === '' || email === '' || password === '' || confirmPassword === '') {
          alert('Please fill in all fields');
          return;
      }
      
      if (!passwordPattern.test(password)) {
          alert('Password must contain at least 8 characters including at least one uppercase letter, one lowercase letter, and one number');
          return;
      }
      
      if (password !== confirmPassword) {
          alert('Passwords do not match');
          return;
      }
      
      // If all validations pass, you can proceed with registration
      // For demonstration purposes, we'll just log the user details
      console.log('Registration successful!');
      console.log('Username:', username);
      console.log('Email:', email);
  });
  
  // Password strength feedback
  $('#password').on('input', function() {
      var password = $(this).val();
      var passwordStrength = $('#password-strength');
      
      // Apply different styles based on password strength
      if (password.length >= 8 && passwordPattern.test(password)) {
          passwordStrength.text('Strong').css('color', 'green');
      } else if (password.length >= 8) {
          passwordStrength.text('Weak').css('color', 'orange');
      } else {
          passwordStrength.text('Too Short').css('color', 'red');
      }

      // Check if the password contains at least one uppercase letter, one lowercase letter, and one number
      if (!passwordPattern.test(password)) {
          alert('Password must contain at least 8 characters including at least one uppercase letter, one lowercase letter, and one number');
      }
  });
});
