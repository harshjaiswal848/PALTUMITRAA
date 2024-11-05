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
$reason = $_POST['reason'];

// Insert data into `applications` table
$sql = "INSERT INTO applications (name, email, reason) VALUES ('$name', '$email', '$reason')";

if ($conn->query($sql) === TRUE) {
    echo "Application submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
