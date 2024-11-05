<?php
$servername = "localhost";
$username = "root"; // Default for XAMPP
$password = ""; // Default for XAMPP
$dbname = "shelter_management"; // Ensure this matches the database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$shelterName = $_POST['shelter-name'];
$shelterEmail = $_POST['shelter-email'];
$shelterPassword = password_hash($_POST['shelter-password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO shelter_login (name, email, password) VALUES ('$shelterName', '$shelterEmail', '$shelterPassword')";

if ($conn->query($sql) === TRUE) {
    echo "Shelter registered successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
