<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database host
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "bhub_website"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve login details
$emailOrNic = $_POST["emailOrNic"];
$password = $_POST["password"];

$sql = "SELECT `Name`, `NIC`, `Email`, `Password` FROM `user` WHERE (`Email` = '$emailOrNic' OR `NIC` = '$emailOrNic') AND `Password` = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email/NIC found
    $row = $result->fetch_assoc();
    if ($row["Password"] === $password) {
        // Authentication successful
        // Redirect the user to boardinghub.html
        header("Location: ../index.php");
    exit(); // Stop further execution
    } else {
        // Password incorrect
        // Redirect back to the login page with an error message
        header("Location: login_form.html?error=passwordMismatch&emailOrNic=$emailOrNic");
        exit;
    }
} else {
    // Email/NIC not found
    // Redirect back to the login page with an error message
    header("Location: login_form.html?error=emailOrNic");
    exit;
}

// Close connection
$conn->close();
?>


// Close connection
$conn->close();
?>
