<?php
    session_start();
    
    $database = new mysqli("localhost","root","","hotel_reservation_system");

    //check Connection
    if(mysqli_connect_errno()){
        echo "The MySQL SERVER is down. Please try again later!".mysql_connect_error();
        die();
    }

    define('BASEURL','/hotelresevation/');


?>