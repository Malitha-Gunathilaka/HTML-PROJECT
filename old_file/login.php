<?php
// Database connection
$servername = "localhost"; // Assuming your MySQL server is hosted locally
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "bhub_website"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
// $nic = $_POST['nic'];
// $name = $_POST['name'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $password = $_POST['password'];

// Validate name
if (empty($_POST['name'])) {
    $errors[] = "Name is required";
} else {
    $name = $_POST['name'];
}

// Validate NIC number
if (empty($_POST['nic'])) {
    $errors[] = "NIC number is required";
} else {
    $nic = $_POST['nic'];
    // Custom validation for NIC format (adjust as needed)
    if (!preg_match("/^\d{12}$/", $nic)) {
        $errors[] = "Invalid NIC format";
    }
}

// Validate email
if (empty($_POST['email'])) {
    $errors[] = "Email is required";
} else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
}

// Validate phone number
if (empty($_POST['phone'])) {
    $errors[] = "Phone number is required";
} else {
    $phone = $_POST['phone'];
    if (!preg_match("/^\d{10}$/", $phone)) {
        $errors[] = "Phone number must be 10 digits";
    }
}

// Validate password
if (empty($_POST['password'])) {
    $errors[] = "Password is required";
} elseif (strlen($_POST['password']) < 7) {
    $errors[] = "Password must be at least 7 characters long";
} else {
    $password = $_POST['password'];
}


// SQL query to insert data into database
$sql = "INSERT INTO register (nic, name, email, phone, password) VALUES ('$nic', '$name', '$email', '$phone', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    // Redirect to index.html after 1 seconds
    header("refresh:1;url=index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
