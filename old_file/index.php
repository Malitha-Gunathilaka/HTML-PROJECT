<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annex - BoardingHub</title>
    <link rel="stylesheet" href="style_annex.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 25%;
        }

        .ad-cell {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            text-align: center;
            max-width: 800px; /* Adjust as needed */
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .ad-details {
            flex: 1;
            margin-left: 20px;
            text-align: left; /* Align details to the left */
        }

        .ad-image-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .ad-image {
            width: 500px;
            height: auto; /* Medium size */
            margin-bottom: 15px;
            display: none; /* Initially hide all images */
        }

        .image-slider {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .slider-button {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: gray;
        }
    </style>
</head>
<body>
<header>
    <h1><a href="index.html" class="Home">BoardingHub</a></h1>
    <button class="Hlbutton"><a href="#" class="Logging">Logging</a></button>
    <button class="Hbutton"><a href="#" class="Ads">Post Your Ads</a></button>
    <nav>
        <a href="boardinghouse.html">BoardingHouse</a>
        <a href="#" class="selected">Annex</a>
    </nav>
</header>
<div class="container">
    <h2>Ads for Boarding House</h2>
    <table>
        <tr>
        </tr>
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
        $sql = "SELECT * FROM annx";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo '<td class="ad-image-container">';
                echo '<img class="ad-image" src="' . $row["image1"] . '" style="display: block;">'; // Display image1 by default
                echo '<img class="ad-image" src="' . $row["image2"] . '" style="display: none;">'; // Display image2 initially hidden
                echo '<div class="image-slider">';
                echo '<button class="slider-button" onclick="prevImage(this)">&lt;</button>';
                echo '<button class="slider-button" onclick="nextImage(this)">&gt;</button>';
                echo '</div>';
                echo '</td>';

                echo "<td class='ad-details'>" ;
                echo "<p class='ad-details'> <b>Property Type:</b>" . $row["Property_Type"] . "</p>";
                echo "<p class='ad-details'><b>Address</b>:" . $row["Address"] . "</p>";
                echo "<p class='ad-details'><b>Features:</b>" . $row["Features"] . "</p>";
                echo "<p class='ad-details'><b>Beds:</b>" . $row["Beds"] ."&nbsp <b>Baths:</b>" . $row["Baths"] . "</p>";
                echo "<p class='ad-details'><b>Description:</b>" . $row["Description"] . "</p>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</div>
<footer>
    ⭕⭕⭕   DSML SOLUTIONS   ⭕⭕⭕
</footer>
<script>
    function nextImage(button) {
        var adCell = button.parentNode.parentNode;
        var images = adCell.querySelectorAll('.ad-image');
        var currentImageIndex = 0;

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
        var adCell = button.parentNode.parentNode;
        var images = adCell.querySelectorAll('.ad-image');
        var currentImageIndex = 0;

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
