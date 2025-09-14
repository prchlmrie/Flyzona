<div class="image-slider">
    <i id="prevBtn" class="fa-solid fa-angle-left"></i>
    <div class="carousel">
        <img src="css/img-slider/eagle.jpg" alt="Eagle">
        <img src="css/img-slider/cockatiel.jpg" alt="Cockatiel">
        <img src="css/img-slider/ficher.jpg" alt="Ficher">
        <img src="css/img-slider/cockatoo.jpg" alt="Cockatoo">
        <img src="css/img-slider/macaw.jpg" alt="Macaw">
    </div>
    <i id="nextBtn" class="fa-solid fa-angle-right"></i>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const images = carousel.querySelectorAll('img');
    const imageWidth = images[0].offsetWidth;
    const gap = 16; // 1rem = 16px
    let currentIndex = 0;

    // Set the width of the carousel to show exactly 3 images
    carousel.style.width = `${3 * imageWidth + 2 * gap}px`;

    function updateCarousel() {
        carousel.style.transform = `translateX(-${currentIndex * (imageWidth + gap)}px)`;
        
        // Disable prev button if at the start
        prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
        prevBtn.style.pointerEvents = currentIndex === 0 ? 'none' : 'auto';
        
        // Disable next button if at the end
        nextBtn.style.opacity = currentIndex === images.length - 3 ? '0.5' : '1';
        nextBtn.style.pointerEvents = currentIndex === images.length - 3 ? 'none' : 'auto';
    }

    prevBtn.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    nextBtn.addEventListener('click', function() {
        if (currentIndex < images.length - 3) {
            currentIndex++;
            updateCarousel();
        }
    });

    // Initialize carousel
    updateCarousel();

    // Adjust carousel width on window resize
    window.addEventListener('resize', function() {
        const newImageWidth = images[0].offsetWidth;
        carousel.style.width = `${3 * newImageWidth + 2 * gap}px`;
        updateCarousel();
    });
});
</script>