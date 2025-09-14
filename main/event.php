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

    <div class="event-container">
        <h1>JOIN THE FUN</h1>
        <div class="event-slides-container">
            <div class="event-slides-wrapper">
                <div class="event-slide">
                    <div class="event-content-wrapper">
                        <div class="event-image-container">
                            <img src="css/event/BirdShow.jpg" alt="Bird show">
                        </div>
                        <div class="event-text-content">
                            <h2>Free Flight Bird Show</h2>
                                <p><i class="fas fa-map-marker-alt"></i> Nyungwe Forest Heart of Africa</p>
                                <p><i class="far fa-calendar"></i> Daily</p>
                                <p><i class="far fa-clock"></i> 9:30am & 2:00pm</p>

                            <p>Witness the breathtaking beauty and agility of our feathered friends as they soar through the air in our exhilarating free flight bird show! Watch in awe as they perform daring maneuvers and showcase their incredible flying skills.</p>
                        </div>
                    </div>
                </div>
                <div class="event-slide">
                    <div class="event-content-wrapper">
                        <div class="event-image-container">
                            <img src="css/event/photographycontest.jpg" alt="Photography Contest">
                        </div>
                        <div class="event-text-content">
                                <h2>Photography Contest</h2>
                                <p>Capture the beauty of our birds in stunning photos! Share your best shots with us and have a chance to win amazing prizes.</p>
                        </div>
                    </div>
                </div>
                <div class="event-slide">
                    <div class="event-content-wrapper">
                        <div class="event-image-container">
                            <img src="css/event/talkingparrot.png" alt="Talking Parrot">
                        </div>
                        <div class="event-text-content">
                            <h2>Scarf, the talking parrot</h2>
                            <p>Meet Scarf, our talking parrot! He's a smart bird who can talk and answer questions about our feathered friends.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="event-navigation-buttons">
            <button class="event-nav-btn prev-btn">&lt; Prev</button>
            <button class="event-nav-btn next-btn">Next &gt;</button>
        </div>

    </div>

    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
</body>
</html>
