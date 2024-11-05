<?php

$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "volunteer_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['volunteer-name']);
    $email = $conn->real_escape_string($_POST['volunteer-email']);
    $phone = $conn->real_escape_string($_POST['volunteer-phone']);
    $message = $conn->real_escape_string($_POST['volunteer-message']);

    // Insert data into the table
    $sql = "INSERT INTO volunteers (name, email, phone_number, message) VALUES ('$name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for signing up!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
