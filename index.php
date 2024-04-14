<html>
<head>
<title>Home - BoardingHub</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="stylesAdd.css">
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
        /* .owner-column {
            border-left: 1px solid #ccc;
            border-radius: 5px; 
        } 
        .owner-header {
            font-weight: bold;
            margin-bottom: 10px;
        } */
		
    .image {
    background-image: url('dp1.jpeg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
.welcome-hero-txt{text-align: center;padding: 0px 160px;}
.welcome-hero-txt h1 {
    font-size: 52px;
    color: #000000;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 15px;
}
.welcome-hero-txt p {
    font-size: 25px;
    text-transform: initial;
    color: #000000;
    font-weight: 500;
    max-width: 900px;
    margin: 45 auto;
}
.search-container{
    padding-top: 30px;
    padding-bottom: 250px;
}


</style>


</head>
<body>
<div class="image">
    <header>
<a href="index.php" class="Home"><img src="image/logo_final.png" alt="logo" srcset="" width="450px" height="80px"></a>
        
            <button class="Hlbutton"><a href="login/login_form.html" class="Logging">Sign In</a></button>
            <button class="Hbutton"><a href="Add_New_Property/annex_adds.html"class="Ads">Post Your Ads</a></button>
        
    </header>
    <div class="container1">
		<div class="welcome-hero-txt">
					<h1>Welcome to BoardingHub!</h1>
					<p>
						Step into a world of comfort with our premier boarding and annex rentals 
		</div>
        <div class="btn-container">
            <a href="Display_BHouse_adds/fetch_ads.php" class="BHA">BoardingHUB</a>
            <a href="Display_Annex_adds/fetch_ads.php" class="BHA">Annex</a>
        </div>
    
<div class="search-container">
        <form action="search.php" method="GET">
            <input type="text" placeholder="Search..." name="query">
            <input type="submit" value="Search">
        </form>
    </div>
</div>
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
        echo "<table align =right >";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            
            // Left column for images and slide buttons
            echo '<td class="image-column">';
            echo '<div class="ad-image-container">';
            echo '<img class="ad-image" src="Add_New_Property/' . $row["image1"] . '" style="display: block; width: 500px; height: 300px;">'; // Display image1 by default
            if ($row["image2"] != "") {
                echo '<img class="ad-image" src="Add_New_Property/' . $row["image2"] . '" style="display: none; width: 500px; height: 300px;">'; // Display image2 initially hidden if not empty
            }
            if ($row["image3"] != "") {
                echo '<img class="ad-image" src="Add_New_Property/' . $row["image3"] . '" style="display: none; width: 500px; height: 300px;">'; // Display image3 initially hidden if not empty
            }
            if ($row["image4"] != "") {
                echo '<img class="ad-image" src="Add_New_Property/' . $row["image4"] . '" style="display: none; width: 500px; height: 300px;">'; // Display image4 initially hidden if not empty
            }
            echo '<div class="image-slider">';
            echo '<button class="slider-button prev" onclick="prevImage(this)"><i class="fas fa-chevron-left"></i></button>'; // Icon for previous image
            echo '<button class="slider-button next" onclick="nextImage(this)"><i class="fas fa-chevron-right"></i></button>'; // Icon for next image
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
            echo "<br><h2 class='ad-details' style='color:#1E90FF;'>&ensp;&ensp;<b>RS:</b> " . $row["Price_Range"] . "</h2>"; // Icon for price range
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
        echo "0 results";
        }
                
        $conn->close();
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
<div class="footer">
<footer class="bg-dark text-center text-white">
  <div class="container p-4 pb-0">
    <section class="mb-4">
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
  </div>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="#">DSML SOLUTIONS</a>
  </div>
  <!-- Copyright -->
</footer>
</div>  
</div>
</footer>
</body>
</html>
