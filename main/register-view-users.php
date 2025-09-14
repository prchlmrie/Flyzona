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
    <title>Welcome to Flyzona</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'admin_nav.php'; ?>
    <div class="register-body">
        <div class="view-users-table">
            <h2>Registered Users</h2>
            <p>
                <?php
                    // require db connection
                    require("mysqli_connect.php");
                    //query to get data from db
                    $q = "SELECT fname, lname, email, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat, user_id FROM users ORDER BY user_id ASC";
                    $result = @mysqli_query($dbcon, $q);
                    if($result) { // if query is succcessful
                        echo '<table> 
                            <tr>
                                <th>👥Name</th>
                                <th>📧Email</th>
                                <th>📅Registered Date</th>
                                <th>💡Actions</th>
                            </tr>';
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo '<tr>
                                    <td>'.$row['fname'] . " " . $row['lname'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['regdat'].'</td>
                                    <td><a href="edit_user.php?id='.$row['user_id'].'">🖊️</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="delete_user.php?id='.$row['user_id'].'">🗑️</a></td>
                            
                                    </tr>';
                            }
                            echo '</table>';
                            mysqli_free_result($result);
                    } else{ // if query not successful
                        echo '<p class="error"> The current registered users could not be retrieve. Contact the system administrator</p>';
                    }
                    mysqli_close($dbcon);
                ?>
            </p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
