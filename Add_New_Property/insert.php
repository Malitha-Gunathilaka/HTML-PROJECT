<?php
// Establish database connection
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "bhub_website";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO Annx (Property_Type, title, Address, Beds, Baths, Price_Range, image1, image2, image3, image4, Description, name, phone, email ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiissssssss", $propertyType, $title, $address, $beds, $baths, $Price_Range, $image1, $image2, $image3, $image4, $description, $name, $phone, $email);

// Set parameters and execute
$propertyType = $_POST['propertyType'];
$title = $_POST['title'];
$address = $_POST['address'];
// $features = $_POST['features'];
$beds = $_POST['beds'];
$baths = $_POST['baths'];
$Price_Range =$_POST['Price_Range'];
$description = $_POST['description'];

$name = $_POST['name'];
$phone =$_POST['phone'];
$email = $_POST['email'];

// Validate image1 and image2
if (empty($_FILES["image1"]["name"]) || empty($_FILES["image2"]["name"])) {
    echo "Please provide both Image 1 and Image 2.";
    exit();
}

// Handle image uploads
$targetDir = "uploads/";

// Image 1
$image1 = $targetDir . basename($_FILES["image1"]["name"]);
uploadImage("image1", $image1);

// Image 2
$image2 = "";
if ($_FILES["image2"]["size"] > 0) {
    $image2 = $targetDir . basename($_FILES["image2"]["name"]);
    uploadImage("image2", $image2);
}

// Image 3
$image3 = "";
if ($_FILES["image3"]["size"] > 0) {
    $image3 = $targetDir . basename($_FILES["image3"]["name"]);
    uploadImage("image3", $image3);
}

// Image 4
$image4 = "";
if ($_FILES["image4"]["size"] > 0) {
    $image4 = $targetDir . basename($_FILES["image4"]["name"]);
    uploadImage("image4", $image4);
}
// Execute SQL statement
if ($stmt->execute()) {
    header("Location: ../index.php");
    exit(); // Stop further execution
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Function to upload image
function uploadImage($inputName, $targetFilePath) {
    global $targetDir;
    if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFilePath)) {
        // Image uploaded successfully
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }
}
?>
