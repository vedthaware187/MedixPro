<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patientName = $_POST['patient-name'];
    $medication = $_POST['medication'];
    $dosage = $_POST['dosage'];
    $frequency = $_POST['frequency'];
    $instructions = $_POST['instructions'];

    // Validate data (you might want to add more validation)
    if (!empty($patientName) && !empty($medication) && !empty($dosage) && !empty($frequency) && !empty($instructions)) {
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
        $sql = "INSERT INTO prescriptions (patient_name, medication, dosage, frequency, instructions) VALUES ('$patientName', '$medication', '$dosage', '$frequency', '$instructions')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Prescription added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
    } else {
        echo "All fields are required";
    }
}

