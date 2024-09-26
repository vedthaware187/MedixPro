<?php
$con = mysqli_connect("localhost", "root", "Ved@2020", "mysql");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];

$sql = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Login successful!";
    // Optionally, you can redirect the user to another page after successful login
    header("Location: bot.html");
} else {
    echo "Invalid email or password. Please register as a new user.";
}
