<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register Page - Welcome to Flyzona</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <?php include 'nav.php'; ?>  
        <div class="register-body">
            <div class="register-content">
                <?php
                    // if the button is pressed...
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $errors = array(); //initialize error array
                        //may laman ba ang first name?
                        if(empty($_POST['fname'])){
                            $errors[] = 'Please enter your first name.';
                        } else{
                            $fn = trim($_POST['fname']);
                        }

                        //may laman ba ang lastname at email
                        if(empty($_POST['lname'])){
                            $errors[] = 'Please enter your last name.';
                        } else{
                            $ln = trim($_POST['lname']);
                        }

                        if(empty($_POST['email'])){
                            $errors[] = 'Please enter your email.';
                        } else{
                            $e = trim($_POST['email']);
                        }

                        //parehas ba ang dalawang password?
                        if(!empty($_POST['psword1'])) {
                            if($_POST['psword1'] != $_POST['psword2']){
                                $errors[] = 'Your passwords do not match.';
                            } else{
                                $p = password_hash(trim($_POST['psword1']), PASSWORD_DEFAULT);
                            }
                        }else{
                            $errors[] = 'Please enter your password.';
                        }      

                        require ('mysqli_connect.php'); // Connect to the db.

                        // check for duplicate email
                        $sql = "SELECT * FROM users WHERE email ='".$_POST['email']. "'";
                        $result = @mysqli_query($dbcon, $sql);
                        $row = mysqli_fetch_row($result);

                        if(!empty($row)) {
                            $errors[] = 'Email already exist, Please try a different email.';
                        }

                        //walang errors. yey.
                        if(empty($errors)){ // walang errors. yey
                            // Register the user in the database...
                                
                                // Make the query:
                                $q = "INSERT INTO users (fname, lname, email, psword, registration_date) 
                                VALUES ('$fn', '$ln', '$e', '$p', NOW())";	
                                $result = @mysqli_query ($dbcon, $q); // Run the query.
                                if ($result) { // If it ran OK.
                                header ("location: register-thanks.php"); 
                                exit();	
                                } else { // If it did not run OK.
                                    //Public message:
                                    echo '<h2>System Error</h2>
                                    <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
                                    // Debugging message:
                                    echo '<p>' . mysqli_error($dbcon) . '</p>';
                                }
                                mysqli_close($dbcon); // Close the database connection.
                                // Include the footer and quit the script:
                                include ('footer.php');
                                exit();
                                
                            
                        }else{  //may error. sad.
                            echo '<div class="error-container">';
                            echo '<h3>The following errors occurred:</h3>';
                            echo '<ul>';
                            foreach($errors as $msg){
                                echo "<li>😢 $msg</li>";
                            }
                            echo '</ul>';
                            echo '</div>';
                        }
                    }
                ?>


                <h2>Register</h2>
                <form action="register-page.php" method="post">
                    <div class="form-group">
                        <label class="label" for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']?>">
                    </div>

                    <div class="form-group">
                        <label class="label" for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']?>">
                    </div>

                    <div class="form-group">
                        <label class="label" for="email">Email Address:</label>
                        <input type="email" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']?>">
                    </div>

                    <div class="form-group">
                        <label class="label" for="psword1">Password:</label>
                        <input type="password" id="psword1" name="psword1" value="<?php if(isset($_POST['psword1'])) echo $_POST['psword1']?>">
                    </div>

                    <div class="form-group">
                        <label class="label" for="psword2">Confirm Password:</label>
                        <input type="password" id="psword2" name="psword2" value="<?php if(isset($_POST['psword2'])) echo $_POST['psword2']?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" id="submit" name="submit" value="Register">
                    </div>
                </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>