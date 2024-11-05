<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoption_process_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['appointment_date'];
$time = $_POST['appointment_time'];

// Insert data into `appointments` table
$sql = "INSERT INTO appointments (name, email, appointment_date, appointment_time) VALUES ('$name', '$email', '$date', '$time')";

if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
