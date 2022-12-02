<?php
    require_once '../core/init.php';
    
    $offerID = $_GET["oid"];
    $sql = "delete from offer where o_ID = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param("s", $oID);
    
    $oID = $offerID;
    $stmt->execute();
    
    $stmt->close();
    $database->close();
?>