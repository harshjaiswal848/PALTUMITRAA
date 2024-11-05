<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default password for XAMPP (empty)
$dbname = "paltumitra_donations";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donor_name = $_POST['donor_name'];
    $email = $_POST['email'];
    $donation_type = $_POST['donation_type'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO donations (donor_name, email, donation_type, amount)
            VALUES ('$donor_name', '$email', '$donation_type', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for your donation! Your support means a lot.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
