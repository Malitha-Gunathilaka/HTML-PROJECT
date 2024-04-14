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