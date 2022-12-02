<?php
    require_once '../core/init.php';
    
    $userID = $_GET["uid"];
    $sql = "delete from user_u_contact where u_ID = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param("s", $uID);
    
    $uID = $userID;
    $stmt->execute();
    
    $stmt->close();
    
    $sql = "delete from user_ where u_ID = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param("s", $uID);
    
    $uID = $userID;
    $stmt->execute();

    $stmt->close();
    $database->close();
?>