<?php


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$property_type = $_POST['property_type'];
$address = $_POST['address'];
$features = $_POST['features'];
$beds = $_POST['beds'];
$baths = $_POST['baths'];
$image1 = $_FILES['image1']['name'];
$image2 = $_FILES['image2']['name'];
$description = $_POST['description'];

// Define allowed file types
$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

// Get file extension
$file1_extension = strtolower(pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION));
$file2_extension = strtolower(pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION));

// Check if file extensions are valid
if (!in_array($file1_extension, $allowed_extensions) || !in_array($file2_extension, $allowed_extensions)) {
    die("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
}

// Move uploaded files to a folder
$target_dir = "uploads/";
$target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
$target_file2 = $target_dir . basename($_FILES["image2"]["name"]);

// Check if the uploaded files are images
if (getimagesize($_FILES["image1"]["tmp_name"]) === false || getimagesize($_FILES["image2"]["tmp_name"]) === false) {
    die("Error: Invalid image file.");
}

// Move the uploaded files to the target directory
if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file1) && move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2)) {
    echo "Files uploaded successfully.";
} else {
    echo "Error uploading files.";
}


// Prepare and bind SQL statement to insert data into database
$stmt = $conn->prepare("INSERT INTO annx (property_type, address, features, beds, baths, image1, image2, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $property_type, $address, $features, $beds, $baths, $target_file1, $target_file2, $description);

// Execute statement
if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
    // Redirect to index.html after 1 seconds
    header("refresh:1;url=index.html");
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
