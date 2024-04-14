<?php
    // Connect to MySQL database
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "bhub_website";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from database
    $sql = "SELECT * FROM annx WHERE Property_Type='Annex'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table align =right >";
        while ($row = $result->fetch_assoc()) {
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
            //echo "<p class='ad-details'> <b>Property Type: </b>" . $row["Property_Type"] . "</p>";
            echo "<p class='ad-details'><b>Address:</b>" . $row["Address"] . "</p>";
            echo "<p class='ad-details'><b>Features:</b>" . $row["Features"] . "</p>";
            echo "<p class='ad-details'><b>Beds:</b>" . $row["Beds"] ."&nbsp <b>Baths:</b>" . $row["Baths"] . "</p>";
            echo "<p class='ad-details'><b>Description: <br></b>" . $row["Description"] . "</p>";
            echo '</td>';
            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>