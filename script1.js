// Form validation
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var username = document.querySelector('username').value;
    var email = document.querySelector('email').value;
    var password = document.querySelector('password').value;
    var confirmPassword = document.querySelector('confirmPassword').value;
    
    //if (username === 'devchhabada' || email === 'chhabadadev@gmail.com' || password === '1234' || confirmPassword === '1234') {
      //alert('Please fill in all fields');
      //return;
    //}
    
   // if (password !== confirmPassword) {
   //   alert('Passwords do not match');
   //   return;
   // }
    
    // If all validations pass, you can proceed with registration
    // For demonstration purposes, we'll just log the user details
    console.log('Registration successful!');
    console.log('Username:', username);
    console.log('Email:', email);

    
    fetch('update.php',{
      method: 'POST',
      body:userData
  }).then(response);
  });
  

