<?php
$servername = "localhost";
$username = "root";
$password = "Ved@2020";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['patient-name'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$sql_patient = "SELECT * FROM patient_records WHERE name='$name' AND age='$age' AND gender='$gender'";
$result_patient = $conn->query($sql_patient);

if ($result_patient->num_rows > 0) {
    $row_patient = $result_patient->fetch_assoc();
    $disease = $row_patient['disease'];
    
    $sql_prescription = "SELECT * FROM prescriptions WHERE patient_name='$name'";
    $result_prescription = $conn->query($sql_prescription);
    
    if ($result_prescription->num_rows > 0) {
        $row_prescription = $result_prescription->fetch_assoc();
        $medication = $row_prescription['medication'];
        $dosage = $row_prescription['dosage'];
        $frequency = $row_prescription['frequency'];
        $instructions = $row_prescription['instructions'];
        
        echo json_encode([
            'name' => $name,
            'age' => $age,
            'gender' => $gender,
            'disease' => $disease,
            'medication' => $medication,
            'dosage' => $dosage,
            'frequency' => $frequency,
            'instructions' => $instructions
        ]);
    } else {
        echo json_encode(['error' => 'Prescription not found']);
    }
} else {
    echo json_encode(['error' => 'Patient record not found']);
}

$conn->close();
