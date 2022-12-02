<?php
    require_once 'core/init.php';

    if(isset($_POST["paysubmit"])){
        $chksql = $database -> prepare("select u_ID from reservation where reserv_ID = ?");
        $chksql -> bind_param('i', $rID);
        $rID = $_POST['reservID'];
        $chksql->execute();
        $result = $chksql->get_result();
        $uid = $result->fetch_assoc()['u_ID'];
        $chksql->close();
        
        $sql = $database -> prepare("insert into payment(p_ID, reserv_ID, p_type, p_amount, s_ID, u_ID ) values('', ?, ?, ?, NULL, ?)");
        $sql -> bind_param('issi', $reserveID, $pType, $pAmount, $uID);
        
        $reserveID = $_POST['reservID'];
        $pType = $_POST['card'];
        $pAmount = $_POST['advance'];
        $uID = $uid;
        $sql->execute();
        //print_r($sql);
        $sql->close();

        echo "payment Successfull";
        header('Refresh:1; URL=index.php');
    }
    $database->close();
?>