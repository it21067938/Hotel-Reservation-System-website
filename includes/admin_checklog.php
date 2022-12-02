<?php
    if(isset($_COOKIE['username'])){
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['auth_level'] = $_COOKIE['auth_level'];
        goto welcome;
    }
    else{
        if(isset($_SESSION['username']))
        goto welcome;
        else
        {
            header('Refresh:0; URL=admin_login.php');
            die();
        }
    }
    welcome:
?>