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
    <title>Delete User - Flyzona</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <?php include 'admin_nav.php'; ?>
    <div class="register-body">
    <div class="edit-delete-container">    
        <h2>Deleting Record</h2>
            <?php
                if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
                    $id = $_GET['id'];
                } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
                    $id = $_POST['id'];
                } else { //no valid id number. stop script
                    //redirect to homepage !!!!!!
                    echo '
                    <div class="delete-content">
                        <h3>Go back. You are not supposed to be here.</h3>
                        <img src="css/img-delete/invalidID.gif" class="delete-image">
                        <a href="register-view-users.php" class="delete-link">View Users</a>
                    </div>';
                    exit();
                }
                
                require('mysqli_connect.php');
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if($_POST['sure'] == 'Yes'){ //user pressed Yes
                        // delete specific user !!!!!!!!!
                        $q = "DELETE FROM users WHERE user_id = $id"; 
                        $result = @mysqli_query($dbcon, $q);
                        if (mysqli_affected_rows($dbcon) == 1){
                            // deleted succesfully !!!!!
                            echo '
                            <div class="delete-content">
                                <h3>Successfully Deleted!</h3>
                                <img src="css/img-delete/successfullydeleted.gif" class="delete-image">
                                <a href="register-view-users.php" class="delete-link">View Users</a>
                            </div>';
                        }else{
                            // hindi deleted succesfully
                            echo '
                            <div class="delete-content">
                                <h3>ERROR 201: Contact Administrator</h3>
                                <img src="css/img-delete/error201.gif" class="delete-image">
                                <a href="register-view-users.php" class="delete-link">View Users</a>
                            </div>';  
                        }
                    }else{//user pressed No
                        // msg record was not deleted !!!!!!!!!!!!
                        // link going back to view-users.page !!!!!!!!!
                        echo '
                        <div class="delete-content">
                            <h3>User not deleted.</h3>
                            <img src="css/img-delete/notdeleted.gif" class="delete-image">
                            <a href="register-view-users.php" class="delete-link">View Users</a>
                        </div>';
                    }
                }else{
                    // display form to confirm deletion !!!!!!!!!!
                    $q = "SELECT CONCAT (fname, ' ', lname) FROM users WHERE user_id = '$id'";
                    $result = @mysqli_query($dbcon, $q);
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result, MYSQLI_NUM);
                        echo '<h3>Are you sure you want to delete '.$row[0].'?</h3>';
                        echo '
                        <form action= "delete_user.php" method="post">
                        <input id="submit-yes" type="submit" name="sure" value="Yes">
                        <input id="submit-no" type="submit" name="sure" value="No">
                        <input type="hidden" name="id" value="'.$id.'">
                        </form>
                        ';
                    } else{ //not valid id. no members found
                        // link going back to register-page.php !!!!!!!!!
                        echo '
                        <div class="delete-content">
                            <h3>We have no idea who that is.</h3>
                            <img src="css/img-delete/whoyou.gif" class="delete-image">
                            <a href="register-page.php" class="delete-link">Register Now</a>
                        </div>';
                    }
                }
                mysqli_close($dbcon);
            ?>
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>