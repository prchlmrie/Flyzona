<?php
    session_start();
    if(!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1)) { //admin can only access
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Flyzona</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <?php include 'admin_nav.php'; ?>
    <div class="admin-title">
        <h1>Welcome, Admin!🫡</h1>
    </div>
    <img src="css/dashboard.jpg" alt="Dashboard" class="dashboard-image">

    <?php include 'footer.php'; ?>
</body>
</html>