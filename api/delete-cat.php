<?php
    require_once '../core/init.php';
    
    $eventID = $_GET["eid"];
    $sql = "delete from event where e_ID = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param("s", $eID);
    
    $eID = $eventID;
    $stmt->execute();
    
    $stmt->close();
    $database->close();
?>