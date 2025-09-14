// ===============================
// Fun Facts Section
// ===============================
const facts = [
    "The largest bird in the world is the ostrich.",
    "The smallest bird in the world is the bee hummingbird.",
    "There are over 10,000 different species of birds in the world!",
    "Flamingos are actually born grey. They become pink because of beta carotene in their food!",
    "The albatross has the largest wingspan of all living birds.",
    "Wisdom the Laysan albatross is the oldest known living bird in the world, at around 70 years old.",
    "Birds use their bodies, calls, songs or dances to communicate with each other.",
    "Only songbirds (passerine) can actually sing, with highly developed vocal organs.",
    "Large birds, like eagles, prey on bigger mammals like monkeys and sloths.",
    "The Arctic tern has the longest migration, with a round trip of 22,000 miles!",
    "A puffin's beak changes colour from grey in winter to vivid orange in spring.",
    "Birds have hollow bones, which makes it easier for them to fly.",
    "Scientists believe birds are descendants of theropod dinosaurs.",
    "A group of birds is called a flock.",
    "Some birds, like parrots, can mimic what people say.",
    "Many birds migrate due to weather or to find food.",
    "The most common species of bird in the world is chicken.",
    "Homing pigeons can find their way back home from long distances.",
    "The flamingo can only eat when its head is upside down!",
    "The Hooded Pitohui of Papua, New Guinea is the only poisonous bird in the world."
];

const factDisplay = document.getElementById('fact-display');
const factButton = document.getElementById('fact-button');

function showNewFact() {
    factDisplay.style.opacity = 0;
    setTimeout(() => {
        const randomFact = facts[Math.floor(Math.random() * facts.length)];
        factDisplay.textContent = randomFact;
        factDisplay.style.opacity = 1;
    }, 500);
}

if (factButton) {
    factButton.addEventListener('click', showNewFact);
}

// ===============================
// Gallery Section
// ===============================
document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.gallery-category-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    if (categoryButtons.length > 0) {
        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                const category = button.dataset.category;

                galleryItems.forEach(item => {
                    if (category === 'all' || item.classList.contains(category)) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });
    }
});

// ===============================
// Event Slider Section
// ===============================
const slides = document.querySelectorAll('.event-slide');
const dots = document.querySelectorAll('.dot');
const nextBtn = document.querySelector('.next-btn');
const prevBtn = document.querySelector('.prev-btn');

if (slides.length > 0) {  
    let currentIndex = 0;

    function updateSlides() {
        // Update slides
        slides.forEach((slide, index) => {
            slide.classList.remove('active');
            if (index === currentIndex) {
                slide.classList.add('active');
            }
        });

        if (dots.length > 0) {
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlides();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlides();
        });
    }

    updateSlides();
}

// ===============================
// Image Slider Section
// ===============================
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    if (carousel) {  
        const images = carousel.querySelectorAll('img');
        const imageWidth = images[0].offsetWidth;
        const gap = 16; // 1rem = 16px
        let currentIndex = 0;

        carousel.style.width = `${3 * imageWidth + 2 * gap}px`;

        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentIndex * (imageWidth + gap)}px)`;
            
            prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
            prevBtn.style.pointerEvents = currentIndex === 0 ? 'none' : 'auto';
            
            nextBtn.style.opacity = currentIndex === images.length - 3 ? '0.5' : '1';
            nextBtn.style.pointerEvents = currentIndex === images.length - 3 ? 'none' : 'auto';
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateCarousel();
                }
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                if (currentIndex < images.length - 3) {
                    currentIndex++;
                    updateCarousel();
                }
            });
        }

        updateCarousel();

        window.addEventListener('resize', function() {
            const newImageWidth = images[0].offsetWidth;
            carousel.style.width = `${3 * newImageWidth + 2 * gap}px`;
            updateCarousel();
        });
    }
});
