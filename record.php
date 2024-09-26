<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['patient-name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $disease = $_POST['disease'];

    if (!empty($name) && !empty($age) && !empty($gender) && !empty($disease)) {
        $servername = "localhost";
        $username = "root";
        $password = "Ved@2020";
        $dbname = "mysql";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO patient_records (name, age, gender, disease) VALUES ('$name', '$age', '$gender', '$disease')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "All fields are required";
    }
}

