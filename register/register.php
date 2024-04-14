<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $upassword = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($upassword !== $confirmPassword) {
        echo "Passwords do not match";
        exit();
    }

    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bhub_website";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $sql = "INSERT INTO user (Name, NIC, Email, Password) VALUES ('$name', '$nic', '$email', '$upassword')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
