document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    Login();
});

function Login(){
    var email = document.querySelector('#email').value;
    var password = document.querySelector('#password').value;

    var userData = {
        email: email,
        password: password
    };

    fetch('login.php', {
        method: 'POST',
        body: JSON.stringify(userData)
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        } else {
            throw new Error('Network response was not ok');
        }
    })
    .then(data => {
        alert(data); // Display success message or handle response
        // Optionally, redirect user after successful login
        window.location.href = 'bot.html';
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to login. Please try again later.');
    });
}
