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
        <h2>Editing User</h2>
            <?php
                if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
                    $id = $_GET['id'];
                }elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
                    $id = $_POST['id'];
                }else{ //no valid id number. stop script
                    //redirect to homepage !!!!!!
                    echo '
                    <div class="edit-delete-content">
                        <h3>Go back. You are not supposed to be here.</h3>
                        <img src="css/img-delete/invalidID.gif" class="delete-image">
                        <a href="register-view-users.php" class="delete-link">View Users</a>
                    </div>';
                    exit();
                }
                
                require('mysqli_connect.php');
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        if(isset($_POST['submit'])){ // user pressed Update
                            $fname = mysqli_real_escape_string($dbcon, trim($_POST['fname']));
                            $lname = mysqli_real_escape_string($dbcon, trim($_POST['lname']));
                            
                            // update user information
                            $q = "UPDATE users SET fname='$fname', lname='$lname' WHERE user_id=$id";
                            $result = @mysqli_query($dbcon, $q);
                            if (mysqli_affected_rows($dbcon) == 1){
                                // updated successfully
                                echo '
                                <div class="edit-delete-content">
                                    <h3>Successfully Updated!</h3>
                                    <img src="css/img-delete/successfullydeleted.gif" class="delete-image">
                                    <a href="register-view-users.php" class="edit-link">View Users</a>  
                                </div>';
                            } else {
                                // update failed
                                echo '
                                <div class="edit-delete-content">
                                    <h3>ERROR: Update failed. Please try again or contact Administrator.</h3>
                                    <a href="register-view-users.php" class="edit-link">View Users</a>
                                    </div>';  
                            }
                        }
                    }else{//user pressed No
                        // msg record was not deleted !!!!!!!!!!!!
                        // link going back to view-users.page !!!!!!!!!
                        echo '
                        <div class="edit-delete-content">
                            <h3>User not edited.</h3>
                            <img src="css/img-delete/notdeleted.gif" class="delete-image">
                            <a href="register-view-users.php" class="delete-link">View Users</a>
                        </div>';
                    }
                }else{
                    // display form to confirm deletion !!!!!!!!!!
                    $q = "SELECT fname, lname FROM users WHERE user_id = '$id'";
                    $result = @mysqli_query($dbcon, $q);
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        echo '<h3>Edit User '.$row['fname'].' '.$row['lname'].'</h3>';
                        echo '
                        <form class="edit-form" action="edit_user.php" method="post">
                            <div class="form-group">
                                <label class="label" for="fname">First Name:</label>
                                <input type="text" id="fname" name="fname" value="'.$row['fname'].'" required>
                            </div>
                            <div class="form-group">
                                <label class="label" for="lname">Last Name:</label>
                                <input type="text" id="lname" name="lname" value="'.$row['lname'].'" required>
                            </div>
                            <input type="submit" name="submit" value="Update">
                            <input type="hidden" name="id" value="'.$id.'">
                            <a href="register-view-users.php" class="edit-link">Back</a> 
                        </form>
                        ';
                    } else{ //not valid id. no members found
                        // link going back to register-page.php !!!!!!!!!
                        echo '
                        <div class="edit-delete-content">
                            <h3>We do not know who you are</h3>
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