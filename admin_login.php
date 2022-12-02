<?php
    require_once 'core/init.php';

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){     //cheking whether the user logged in or not
        header("location: admin_home.php");
        exit;   //if user alrady logged in it will exit
    }

    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) //cheaking whether email or password empty when clicking the submit button
    {
        $username = $_POST["username"];   //getting user typed email to a variable

        $sql = "SELECT * FROM login WHERE s_name = ?"; //this is the quarry
        $stmt = $database->prepare($sql);   //prepare the statement
        $stmt->bind_param("s", $username);     //bind the table
        $stmt->execute();   //ececuting the sql quarry
        $result = $stmt->get_result();  //getting results of sql
        $StaffObj = $result->fetch_assoc();

        if (isset($StaffObj["s_psw"])){
            if ($_POST["password"] == $StaffObj['s_psw']){
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["staff"] = $StaffObj;

                $_COOKIE['loggedin'] = $_SESSION['loggedin'];
                $_COOKIE['username'] = $_SESSION['username'];
                $_COOKIE['staff'] = $_SESSION['staff'];

                // print_r($_SESSION);
                // print_r($_COOKIE);
                echo ("You have entered valid use name and password");

                header('Refresh:0; URL=admin_home.php');
            }
            else {
                echo ("Invalide Password");
            }
        }
        else {
            echo ("username is invalid");
        }
    }
?>

<?php

    include 'includes/head.php';
?>

<div class="A_background">
    <div class="admin-login-wrapper">
        <div class = "admin-login">
            <h1>Login</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="login-form">
                <div class="admin-login-input">
                    <label> Username: </label>
                    <input type = "text" name = "username">
                </div>
                <div class="admin-login-input">
                    <label> Password: </label>
                    <input type = "password" name = "password">
                </div>
                <div class="admin-login-input">     
                    <input type = "submit" class="btn" name="login" value="Login">
                </div>
            </form>
            <a href="index.php">Go to home Page</a>
        </div>
    </div>
</div>

<?php
    include 'includes/admin_footer.php';
?>