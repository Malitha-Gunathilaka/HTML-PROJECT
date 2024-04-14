<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style> table {
    width: 80%;
    border-collapse: collapse;
    margin-right: 150px;
    border-spacing: 5px; /* Remove space between table cells */
}
.details-column, .owner-column {
            width: 50%;
        }
</style>
</head>
<body>
<header>
<a href="../index.php" class="Home"><img src="../image/logo_final.png" alt="logo" srcset="" width="450px" height="80px"></a>   
            <button class="Hbutton"><a href="../Display_BHouse_adds/fetch_ads.php"class="Ads">Boarding House</a></button> 
    </header>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the query parameter is set
    if (isset($_GET["query"])) {
        // Sanitize the search query to prevent SQL injection
        $search_query = $_GET["query"];

        // Perform database query to search for records matching the search query
        // Replace "your_table_name" with the name of your table and "your_column_name" with the name of the column you want to search in
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bhub_website";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $sql = "SELECT * FROM annx WHERE Property_Type = 'Annex' AND Address LIKE ?"; // Replace "your_table_name" and "your_column_name" with actual table and column names

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $search_param = "%" . $search_query . "%";
        $stmt->bind_param("s", $search_param);

        // Execute query
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table align=right>";
            while ($row = $result->fetch_assoc()) {
                // Output the data as needed
                echo "<tr>";
            
            // Left column for images and slide buttons
            echo '<td class="image-column">';
            echo '<div class="ad-image-container">';
            echo '<img class="ad-image" src="../Add_New_Property/' . $row["image1"] . '" style="display: block; width: 500px; height: 300px;">'; // Display image1 by default
            if ($row["image2"] != "") {
                echo '<img class="ad-image" src="../Add_New_Property/' . $row["image2"] . '" style="display: none; width: 500px; height: 300px;">'; // Display image2 initially hidden if not empty
            }
            if ($row["image3"] != "") {
                echo '<img class="ad-image" src="../Add_New_Property/' . $row["image3"] . '" style="display: none; width: 500px; height: 300px;">'; // Display image3 initially hidden if not empty
            }
            if ($row["image4"] != "") {
                echo '<img class="ad-image" src="../Add_New_Property/' . $row["image4"] . '" style="display: none; width: 500px; height: 300px;">'; // Display image4 initially hidden if not empty
            }
            echo '<div class="image-slider">';
            echo '<button class="slider-button prev" onclick="prevImage(this)">&lt;</button>';
            echo '<button class="slider-button next" onclick="nextImage(this)">&gt;</button>';
            echo '</div>';
            echo '</div>';
            echo '</td>';
            
            // Right column for details
echo '<td class="details-column">';
echo "<p class='ad-details'><i class='fas fa-home'></i> <b>Title: </b>" . $row["Title"] . "</p>"; // Icon for title
echo "<p class='ad-details'><i class='fas fa-map-marker-alt'></i> <b></b>&ensp; " . $row["Address"] . "</p>"; // Icon for address
//echo "<p class='ad-details'><i class='fas fa-check'></i> <b>Features:</b> " . $row["Features"] . "</p>"; // Icon for features
echo "<p class='ad-details'><i class='fas fa-bed'></i> &ensp; " . $row["Beds"] ."&ensp;&ensp;&ensp; <i class='fas fa-bath'></i> &ensp; " . $row["Baths"] . "</p>"; // Icons for beds and baths
echo "<p class='ad-details'><i class='fas fa-align-left'></i> <b>Description:</b> <br>" . $row["Description"] . "</p>"; // Icon for description
echo "<br><h2 class='ad-details' style='color:#1E90FF;'>&ensp;&ensp; <b>RS:</b> " . $row["Price_Range"] . "</h2>"; // Icon for price range
echo '</td>';

            // Right column for owner details
echo '<td class="owner-column">';
echo "<p class='ad-owner'> <b>Owner Details</b>";
echo "<p class='ad-details'><i class='fas fa-user'></i> <b>Name:</b> " . $row["name"] . "</p>"; // Icon for owner name
echo "<p class='ad-details'><i class='fas fa-phone'></i> <b>Phone:</b> " . $row["phone"] . "</p>"; // Icon for owner phone
echo "<p class='ad-details'><i class='fas fa-envelope'></i> <b>Email:</b> " . $row["email"] . "</p>"; // Icon for owner email
echo '</td>';
echo "</tr>";
echo "<tr><td colspan='3'><hr style='border-top: 1px solid gray;'></td></tr>"; // Horizontal line
            }
            echo "</table>";
        } else {
            echo "No results found";
        }

        // Close connection
        $conn->close();
    } else {
        echo "No search query provided";
    }
} else {
    echo "Invalid request method";
}
?>

<script>
    function nextImage(button) {
        var row = button.parentNode.parentNode.parentNode;
        var images = row.querySelectorAll('.ad-image');
        var currentImageIndex;

        for (var i = 0; i < images.length; i++) {
            if (images[i].style.display === 'block') {
                currentImageIndex = i;
                break;
            }
        }

        images[currentImageIndex].style.display = 'none'; // Hide current image
        currentImageIndex = (currentImageIndex + 1) % images.length; // Get next image index
        images[currentImageIndex].style.display = 'block'; // Show next image
    }

    function prevImage(button) {
        var row = button.parentNode.parentNode.parentNode;
        var images = row.querySelectorAll('.ad-image');
        var currentImageIndex;

        for (var i = 0; i < images.length; i++) {
            if (images[i].style.display === 'block') {
                currentImageIndex = i;
                break;
            }
        }

        images[currentImageIndex].style.display = 'none'; // Hide current image
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length; // Get previous image index
        images[currentImageIndex].style.display = 'block'; // Show previous image
    }
</script>

</body>
</html>