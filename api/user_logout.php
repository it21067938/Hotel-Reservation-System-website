<?php
   session_start();
   session_destroy();
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = ../index.php');
?>