<?php
    require_once '../core/init.php';
    
    $userID = $_GET["uid"];
    $sql = "update user_ set u_role ='Customer' where u_ID = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param("s", $uID);
    
    $uID = $userID;
    $stmt->execute();
    
    $stmt->close();
    $database->close();
?>