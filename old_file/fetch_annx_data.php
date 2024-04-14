<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bhub_website";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data from the database
$sql = "SELECT * FROM annx";
$result = $conn->query($sql);

// Displaying data in HTML table format
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo "<div class='ad'>";
        echo "<div class='slideshow-container' id='slideshow" . $row['id'] . "'>";
        echo "<div class='mySlides fade'>";
        echo "<img src='" . $row['image1'] . "' alt='" . $row['property_type'] . "' width='400' height='240'>";
        echo "</div>";
        echo "<div class='mySlides fade'>";
        echo "<img src='" . $row['image2'] . "' alt='" . $row['property_type'] . " Slide' width='400' height='240'>";
        echo "</div>";
        echo "<a class='prev' onclick=\"plusSlides(-1, 'slideshow" . $row['id'] . "')\">❮</a>";
        echo "<a class='next' onclick=\"plusSlides(1, 'slideshow" . $row['id'] . "')\">❯</a>";
        echo "</div>";
        echo "<h3>" . $row['property_type'] . "</h3>";
        echo "<p>Address: " . $row['address'] . "</p>";
        echo "<p>Features: " . $row['features'] . "</p>";
        echo "<p>Beds: " . $row['beds'] . "</p>";
        echo "<p>Baths: " . $row['baths'] . "</p>";
        echo "<p>Description: " . $row['description'] . "</p>";
        echo "<p>Rent: $" . $row['rent'] . "/month</p>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
