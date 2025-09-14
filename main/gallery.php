<?php
    session_start();
    if(!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0)) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Flyzona</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <?php include 'member_nav.php'; ?>
    
    <section class="gallery-showcase">
        <h2>Our Feathered Friends</h2>
        <p class="gallery-description">Discover the magnificent birds that call Flyzona home</p>
        
        <div class="gallery-categories">
            <button class="gallery-category-btn active" data-category="all">All Birds</button>
            <button class="gallery-category-btn" data-category="tropical">Tropical</button>
            <button class="gallery-category-btn" data-category="predator">Predators</button>
            <button class="gallery-category-btn" data-category="exotic">Exotic</button>
        </div>

        <div class="gallery-grid">
            <div class="gallery-item tropical">
                <img src="css/gallery/scarlet-macaw.png" alt="Scarlet Macaw">
                <div class="gallery-info">
                    <h3>Scarlet Macaw</h3>
                    <p>Tropical Paradise</p>
                </div>
            </div>

            <div class="gallery-item predator">
                <img src="css/gallery/golden-eagle.png" alt="Golden Eagle">
                <div class="gallery-info">
                    <h3>Golden Eagle</h3>
                    <p>Birds of Prey Zone</p>
                </div>
            </div>

            <div class="gallery-item exotic">
                <img src="css/gallery/indian-peacock.png" alt="Indian Peacock">
                <div class="gallery-info">
                    <h3>Indian Peacock</h3>
                    <p>Exotic Garden</p>
                </div>
            </div>

            <div class="gallery-item tropical">
                <img src="css/gallery/toco-toucan.png" alt="Toco Toucan">
                <div class="gallery-info">
                    <h3>Toco Toucan</h3>
                    <p>Tropical Paradise</p>
                </div>
            </div>

            <div class="gallery-item predator">
                <img src="css/gallery/snowy-owl.png" alt="Snowy Owl">
                <div class="gallery-info">
                    <h3>Snowy Owl</h3>
                    <p>Night Hunters</p>
                </div>
            </div>

            <div class="gallery-item exotic">
                <img src="css/gallery/pink-flamingo.png" alt="Pink Flamingo">
                <div class="gallery-info">
                    <h3>Pink Flamingo</h3>
                    <p>Wetland Area</p>
                </div>
            </div>

            <div class="gallery-item tropical">
                <img src="css/gallery/ruby-humingbird.png" alt="Ruby Hummingbird">
                <div class="gallery-info">
                    <h3>Ruby Hummingbird</h3>
                    <p>Flower Garden</p>
                </div>
            </div>

            <div class="gallery-item predator">
                <img src="css/gallery/peregrine-falcon.png" alt="Peregrine Falcon">
                <div class="gallery-info">
                    <h3>Peregrine Falcon</h3>
                    <p>Birds of Prey Zone</p>
                </div>
            </div>

            <div class="gallery-item tropical">
                <img src="css/img-slider/cockatiel.jpg" alt="Cockatiel">
                <div class="gallery-info">
                    <h3>Cockatiel</h3>
                    <p>Native to Australia, these friendly parrots are known for their distinctive yellow crest and orange cheek patches</p>
                </div>
            </div>

            <div class="gallery-item tropical">
                <img src="css/img-slider/cockatoo.jpg" alt="Cockatoo">
                <div class="gallery-info">
                    <h3>Cockatoo</h3>
                    <p>Native to Australia, these friendly parrots are known for their distinctive yellow crest and orange cheek patches</p>
                </div>
            </div>

            <div class="gallery-item tropical">
                <img src="css/img-slider/ficher.jpg" alt="Fischer's Lovebird">
                <div class="gallery-info">
                    <h3>Fischer's Lovebird</h3>
                    <p>A small, colorful parrot native to Tanzania, known for their strong pair bonds and social behavior</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
</body>
</html>