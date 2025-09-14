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
    <title>Member - Flyzona</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <?php include 'member_nav.php'; ?>
    
    <section class="member-welcome">
        <div class="member-welcome-content">
            <div class="member-welcome-text">
                <h1>Welcome to Your Member Portal</h1>
                <p class="member-subtitle">Discover exclusive access to Flyzona's magical world of birds</p>
                <div class="member-features">
                    <div class="member-feature">
                        <i class="fas fa-feather"></i>
                        <h3>Exclusive Access</h3>
                        <p>Special feeding sessions and behind-the-scenes tours</p>
                    </div>
                    <div class="member-feature">
                        <i class="fas fa-camera"></i>
                        <h3>Photo Opportunities</h3>
                        <p>Perfect moments with our magnificent birds</p>
                    </div>
                    <div class="member-feature">
                        <i class="fas fa-calendar-alt"></i>
                        <h3>Special Events</h3>
                        <p>Priority booking for seasonal events</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bird-facts-container">
        <div class="bird-image">
            <img src="css/funfactbird.png" alt="Decorative bird">
        </div>
        <div class="facts-box">
            <h3>Bird Fun Facts</h3>
            <p id="fact-display">Click the button to learn a fun bird fact!</p>
                <button id="fact-button">Show New Fact</button>
        </div>
    </div>

    <section class="feeding-section">
        <h2>Feed the Animals</h2>
        <div class="feeding-container">
            <div class="feeding-card">
                <img src="css/starlings-feeding.jpg" alt="Starlings Feeding">
                <div class="feeding-info">
                    <h3>Starlings Feeding</h3>
                    <div class="feeding-details">
                        <p><i class="fas fa-map-marker-alt"></i> Nyungwe Forest Heart of Africa</p>
                        <p><i class="far fa-calendar"></i> Daily</p>
                        <p><i class="far fa-clock"></i> 9:30am & 2:00pm</p>
                    </div>
                    <p class="feeding-description">Get up close and hand-feed our collection of African birds that could include starlings and weavers.</p>
                </div>
            </div>

            <div class="feeding-card">
                <img src="css/parrot-feeding.jpg" alt="Parrot Feeding">
                <div class="feeding-info">
                    <h3>Parrot Paradise</h3>
                    <div class="feeding-details">
                        <p><i class="fas fa-map-marker-alt"></i> Tropical Aviary</p>
                        <p><i class="far fa-calendar"></i> Daily</p>
                        <p><i class="far fa-clock"></i> 11:00am & 3:30pm</p>
                    </div>
                    <p class="feeding-description">Experience the vibrant world of parrots as you feed these intelligent and colorful birds.</p>
                </div>
            </div>

            <div class="feeding-card">
                <img src="css/penguin-feeding.jpg" alt="Penguin Feeding">
                <div class="feeding-info">
                    <h3>Penguin Feeding</h3>
                    <div class="feeding-details">
                        <p><i class="fas fa-map-marker-alt"></i> Antarctic Zone</p>
                        <p><i class="far fa-calendar"></i> Daily</p>
                        <p><i class="far fa-clock"></i> 10:30am & 4:00pm</p>
                    </div>
                    <p class="feeding-description">Join our keepers in feeding our adorable penguin colony during their daily feeding sessions.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>