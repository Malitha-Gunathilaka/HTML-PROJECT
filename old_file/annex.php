<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annex - BoardingHub</title>
    <link rel="stylesheet" href="style_annex.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<header>
    <h1><a href="index.html" class="Home">BoardingHub</a></h1>
    <button class="Hlbutton"><a href="#" class="Logging">Logging</a></button>
    <button class="Hbutton"><a href="#"class="Ads">Post Your Ads</a></button>
    <nav>
        <a href="boardinghouse.html">BoardingHouse</a>
        <a href="#" class="selected">Annex</a>
    </nav>
</header>
<div class="container">
    <h2>Ads for Boarding House</h2>
    <table class="ads-table" align="right">
        <tr>
            <td>
                <div class="ad">
                    <div class="slideshow-container" id="slideshow1">
                        <div class="mySlides fade">
                            <img src="BHouse_image/boarding_house_ad1.png" alt="Boarding House Ad 1" width="400" height="240">
                        </div>
                        <div class="mySlides fade">
                            <img src="BHouse_image/boarding_house_ad2.jpg" alt="Boarding House Ad 1 Slide" width="400" height="240">
                        </div>
                        <a class="prev" onclick="plusSlides(-1, 'slideshow1')">&#10094;</a>
                        <a class="next" onclick="plusSlides(1, 'slideshow1')">&#10095;</a>
                    </div>
                    <h3>Spacious Rooms Available</h3>
                    <p>Property Type: Apartment</p>
                    <p>Address: 123 Main Street</p>
                    <p>Features: Spacious rooms, furnished</p>
                    <p>Beds: 2</p>
                    <p>Baths: 1</p>
                    <p>Description: Enjoy comfortable living with our spacious rooms. Perfect for students or working professionals.</p>
                    <p>Rent: $500/month</p>
                </div>
            </td>
            <td>
                <div class="ad">
                    <div class="slideshow-container" id="slideshow2">
                        <div class="mySlides fade">
                            <img src="BHouse_image/boarding_house_ad4.png" alt="Boarding House Ad 1" width="400" height="240">
                        </div>
                        <div class="mySlides fade">
                            <img src="BHouse_image/boarding_house_ad3.jpg" alt="Boarding House Ad 1 Slide" width="400" height="240">
                        </div>
                        <a class="prev" onclick="plusSlides(-1, 'slideshow2')">&#10094;</a>
                        <a class="next" onclick="plusSlides(1, 'slideshow2')">&#10095;</a>
                    </div>
                    <h3>Spacious Rooms Available</h3>
                    <p>Property Type: Apartment</p>
                    <p>Address: 123 Main Street</p>
                    <p>Features: Spacious rooms, furnished</p>
                    <p>Beds: 2</p>
                    <p>Baths: 1</p>
                    <p>Description: Enjoy comfortable living with our spacious rooms. Perfect for students or working professionals.</p>
                    <p>Rent: $500/month</p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="ad">
                    <div class="slideshow-container" id="slideshow3">
                        <div class="mySlides fade">
                            <img src="BHouse_image/boarding_house_ad4.png" alt="Boarding House Ad 1" width="400" height="240">
                        </div>
                        <div class="mySlides fade">
                            <img src="BHouse_image/boarding_house_ad2.jpg" alt="Boarding House Ad 1 Slide" width="400" height="240">
                        </div>
                        <a class="prev" onclick="plusSlides(-1, 'slideshow3')">&#10094;</a>
                        <a class="next" onclick="plusSlides(1, 'slideshow3')">&#10095;</a>
                    </div>
                    <h3>Spacious Rooms Available</h3>
                    <p>Property Type: Apartment</p>
                    <p>Address: 123 Main Street</p>
                    <p>Features: Spacious rooms, furnished</p>
                    <p>Beds: 2</p>
                    <p>Baths: 1</p>
                    <p>Description: Enjoy comfortable living with our spacious rooms. Perfect for students or working professionals.</p>
                    <p>Rent: $500/month</p>
                </div>
            </td>
            <td>
                <div class="ad">
                    <div class="slideshow-container" id="slideshow4">
                        <div class="mySlides fade">
                            <img src="BHouse_image/boarding_house_ad1.png" alt="Boarding House Ad 1" width="400" height="240">
                        </div>
                        <div class="mySlides fade">
                            <img src="BHouse_image/boarding_house_ad3.jpg" alt="Boarding House Ad 1 Slide" width="400" height="240">
                        </div>
                        <a class="prev" onclick="plusSlides(-1, 'slideshow4')">&#10094;</a>
                        <a class="next" onclick="plusSlides(1, 'slideshow4')">&#10095;</a>
                    </div>
                    <h3>Spacious Rooms Available</h3>
                    <p>Property Type: Apartment</p>
                    <p>Address: 123 Main Street</p>
                    <p>Features: Spacious rooms, furnished</p>
                    <p>Beds: 2</p>
                    <p>Baths: 1</p>
                    <p>Description: Enjoy comfortable living with our spacious rooms. Perfect for students or working professionals.</p>
                    <p>Rent: $500/month</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<footer>
    ⭕⭕⭕   DSML SOLUTIONS   ⭕⭕⭕
</footer>

<script>
    function plusSlides(n, slideshowId) {
        var slides = document.getElementById(slideshowId).getElementsByClassName("mySlides");
        var slideIndex = 0;
        for (var i = 0; i < slides.length; i++) {
            if (slides[i].style.display === "block") {
                slideIndex = i;
                break;
            }
        }
        slideIndex += n;
        if (slideIndex >= slides.length) {
            slideIndex = 0;
        } else if (slideIndex < 0) {
            slideIndex = slides.length - 1;
        }
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex].style.display = "block";
    }

    // Set default display for the first slide in each slideshow
    document.querySelectorAll('.slideshow-container').forEach(function(container) {
        container.querySelector('.mySlides').style.display = 'block';
    });
</script>
</body>
</html>
