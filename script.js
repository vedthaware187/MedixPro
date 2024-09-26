function SignIn(){
    var name = document.querySelector('#name').value;
    var email = document.querySelector('#email').value;
    var password = document.querySelector('#message').value;
    var confirmpassword = document.querySelector('#confirmpassword').value;


    
    var userData = {
        name : name,
        mail:email,
        pas : password,
        bot : confirmpassword
    }
    fetch('update.php',{
        method: 'POST',
        body:userData
    }).then(response);
}