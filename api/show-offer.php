<?php
    require_once '../core/init.php';
    
    $fID = $_GET["f_ID"];
    $sql = "UPDATE feedback SET choose = 1 where f_ID = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param("s", $FID);
    
    $FID = $fID;
    $stmt->execute();
    
    $stmt->close();
    $database->close();
?>