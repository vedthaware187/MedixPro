<?php
$servername = "localhost";
$username = "root";
$password = "Ved@2020";
$dbname = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select all inventory items
$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

$inventory = [];
if ($result->num_rows > 0) {
    // Fetch associative array
    while ($row = $result->fetch_assoc()) {
        $inventory[] = $row;
    }
}

// Output inventory data as JSON
header('Content-Type: application/json');
echo json_encode($inventory);

$conn->close();

