<?php
$con = mysqli_connect("localhost", "root", "Ved@2020", "mysql");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$data = json_decode(file_get_contents("php://input"), true);

$patientName = $data['patientName'];
$doctor = $data['doctor'];
$appointmentDate = $data['appointmentDate'];
$appointmentTime = $data['appointmentTime'];
$reason = $data['reason'];

$sql = "INSERT INTO appointments (patient_name, doctor, appointment_date, appointment_time, reason) VALUES ('$patientName', '$doctor', '$appointmentDate', '$appointmentTime', '$reason')";

if (mysqli_query($con, $sql)) {
    echo "Appointment scheduled successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);

