<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST['item-name'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    if (!empty($itemName) && !empty($quantity) && !empty($category) && !empty($description)) {
        $servername = "localhost";
        $username = "root";
        $password = "Ved@2020";
        $dbname = "mysql";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO inventory (item_name, quantity, category, description) VALUES ('$itemName', '$quantity', '$category', '$description')";

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

