<?php
    if(isset($_COOKIE['email'])){
        $_SESSION['email'] = $_COOKIE['email'];
        $_SESSION['auth_level'] = $_COOKIE['auth_level'];
        goto welcome;
    }
    else{
        if(isset($_SESSION['email']))
        goto welcome;
        else
        {
            header('Refresh:0; URL=login.php');
            die();
        }
    }
    welcome:
?>