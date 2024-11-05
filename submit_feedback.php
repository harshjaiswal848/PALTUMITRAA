<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default password for XAMPP (empty)
$dbname = "paltumitra_feedback_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    $sql = "INSERT INTO feedbacks (name, email, feedback)
            VALUES ('$name', '$email', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for your feedback! We appreciate your input.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
