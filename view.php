<?php
if(isset($_POST['reserv_ID'])
{
     $id = $_POST['reserv_ID'];
     $query = "SELECT * FROM table reservation where reserv_ID=$id";
}
else
{
     $query = "SELECT * FROM table reservation ";
}
?>