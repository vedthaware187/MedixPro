<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; // Change this to your database server
    $username = "root"; // Change this to your database username
    $password = "Dev@2604"; // Change this to your database password
    $dbname = "mysql"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO login(username, email, password, confirmpassword) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $confirmpassword);

    // Set parameters and execute
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password before storing
    $confirmpassword = $_POST['confirmpassword']; // Assuming no hashing is required for confirmation

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
