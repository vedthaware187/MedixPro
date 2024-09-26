<?php
$servername = "localhost";
$username = "root";
$password = "Ved@2020"; // Replace with your actual password
$dbname = "mysql"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select all appointments
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

$appointments = [];
if ($result->num_rows > 0) {
    // Fetch associative array
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
}

// Output appointment data as JSON
header('Content-Type: application/json');
echo json_encode($appointments);

$conn->close();
