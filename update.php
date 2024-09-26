<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword']; // Corrected the variable name

    // Validate data (you might want to add more validation)
    if (!empty($name) && !empty($email) && !empty($password) && !empty($confirmpassword)) {
        // Connect to MySQL database
        $servername = "localhost"; // Change this to your database server
        $username = "root"; // Change this to your database username
        $password = "Ved@2020"; // Change this to your database password
        $dbname = "mysql"; // Change this to your database name

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $sql = "INSERT INTO login (username, email, password , confirmpassword) VALUES ('$name', '$email', '$password','$confirmpassword')"; // Corrected the SQL statement

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
    } else {
        echo "All fields are required";
    }
}

