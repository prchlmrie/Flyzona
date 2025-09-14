<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to Flyzona</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>

    <body>
        <?php include 'nav.php'; ?>

        <div class="section1">
            <!--just the photo of the bird!-->
        </div>
        <div class="section2">
            <?php include 'header.php'; ?>
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
        </div>
        <?php include 'footer.php'; ?>
    </body>

    <script src="script.js"></script>
</html>