<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/header.php';
?>
 <?php
        if(isset($_POST["submit"])){
            
            $chksql = $database->prepare("select u_ID from user_ where u_email = ?");
            $chksql ->bind_param('s' , $chkEmail);
            
            $chkEmail = $_POST ["email"];
            $chksql->execute();
            $result = $chksql->get_result()->fetch_assoc();
            $uID = null;
            if(isset($result)) {
                $uID = $result['u_ID'];
            }
            $chksql->close();

            if(!isset($uID)){
                $sqlm = $database->prepare("INSERT INTO user_ (u_ID, u_NIC, u_f_name, u_l_name, u_email, u_address, u_dob, u_role, u_psw) VALUES('', ?, ?, ?, ?, ?, ?, ?, ?)");
                //print_r($database);
                $sqlm->bind_param('ssssssss', $NIC, $Fname, $Lname, $Email, $Address, $DOB, $role, $pass);

                $Fname = $_POST["fname"];
                $Lname= $_POST["lname"];
                $Email = $_POST["email"];
                $NIC= $_POST["nic"];
                $Address= $_POST["address"];
                $DOB = $_POST["dob"];
                $role = "Customer";
                $pass = generatePassword();
                $sqlm->execute();
                
                $last_user_id = $database->insert_id;
                //echo $last_user_id;
                $sqln = $database->prepare("INSERT INTO user_u_contact (u_ID, u_contact) VALUES( ?, ?)");
                
                $sqln->bind_param('ss', $last_id, $con);
                
                $last_id = $last_user_id;
                $con = $_POST["con1"];
                $sqln->execute();

                if(isset($_POST["con2"])){
                    $last_id = $last_user_id;
                    $con = $_POST["con2"];
                    $sqln->execute();
                }
                
                $sqlm->close();
                $sqln->close();
                
                $uID = $last_id;
            }
            
            $chkeventsql = $database->prepare("select e_ID from event where e_type = ?");
            $chkeventsql ->bind_param('s' , $chktype);
            $chktype = $_POST ["event"];
            $chkeventsql->execute();
            $resulteid = $chkeventsql->get_result();
            $eID = $resulteid->fetch_assoc()['e_ID'];
            $chkeventsql->close();
            
            $chkhallsql = $database->prepare("select h_no from hall where e_ID = ? AND h_size = ?");
            
            $chkhallsql ->bind_param('ss' , $Eid, $Hsize);
            $Eid = $eID;
            $Hsize = $_POST ["size"];
            $chkhallsql->execute();
            $resulthno = $chkhallsql->get_result()->fetch_assoc();
            //print_r($database);
            $hNo = null;
            //print_r($_POST ["size"]);
            if (isset($resulthno)) {
                $hNo = $resulthno['h_no'];
            }
            $chkhallsql->close();
            
            $sqlr = $database->prepare("INSERT INTO reservation (reserv_ID, reserv_date, reserv_time, reserv_details, e_Sdate, e_Edate, no_guests, s_ID, e_ID, h_No, u_ID, status)
             VALUES('', ?, ?, ?, ?, ?, ?, NULL, ?, ?, ?, '')");
            $sqlr->bind_param('sssssiiii', $reservDate, $reservTime, $resDetails, $Sdate, $Edate, $NoGuests, $e_ID, $h_No, $u_ID);
            $reservDate = date('Y-m-d');
            date_default_timezone_set("Asia/colombo");
            $reservTime = date('H:i:s');
            $resDetails = $_POST["requirements"];
            $Sdate = $_POST["sdate"];
            $Edate = $_POST["edate"];
            $NoGuests = $_POST["guest"];
            $e_ID = $eID;
            $h_No = $hNo;
            $u_ID = $uID;
            $sqlr->execute();
            $last_reserv_id = $database->insert_id;
            
            $sqlr->close();
            
        }
        
        
        
        
        function generatePassword ( $length = 8 ) {
            $password = "";
            $possible = "0123456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ!@$%^&*";
            $i = 0; 
            while ($i < $length)
            {
                $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
                if (!strstr($password, $char))
                {
                    $password .= $char;	$i++;
                }
            }
        return $password;
    }
    
    //print_r($last_reserv_id);
    ?>

<div class="A_background">

    <div class="p_container">
        <form method="post" action="paymentchk.php">
            <h2>Payment</h2>
            <input type="text" class="hidetextfield" name="reservID" value="<?php echo $last_reserv_id ?>">
            
            <label for="fname">Accepted Cards</label>
            <div class="p_icon-container">
                <input type ="radio" name="card" value="visa"><img class="p_card" src="images/visa_c.png">
                <input type ="radio" name="card" value="amex"><img class="p_card" src="images/amex_c.png">
                <input type ="radio" name="card" value="paypal"><img class="p_card" src="images/paypal.png">
                <input type ="radio" name="card" value="discover"><img class="p_card " src="images/discover_c.png">
                <input type ="radio" name="card" value="master"><img class="p_card" src="images/master_c.png">
            </div>
            <div class="payment-price-show">
                
                <?php
                    $chkamounts = $database->prepare("select E.e_price ,R.reserv_ID from reservation R, event E where R.e_ID = E.e_ID AND R.reserv_ID = ?;");
                    $chkamounts ->bind_param('i' , $reservID);
                    
                    $reservID = $last_reserv_id;
                    $chkamounts->execute();
                    $resultprice = $chkamounts->get_result()->fetch_assoc();
                    $price = $resultprice['e_price'];
                    $chkamounts->close();

                        $advance = $price*30/100;

                    //echo $advance;
                ?>
                <b>
                    Total Ammount -: Rs. <?= $price?>.00</br>
                    30% Advanced Amount -: Rs. <?=$advance?>.00</br>
                    <div class="hidetextfield"><input type="text" name="advance" value="<?= $advance ?>"></div>
               </b> 
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber">
            <label for="exp-M-Y">Expiration</label>
            <input type="text" id="exp-M-Y" name="exp-M-Y" style="width: 100px;" placeholder="MM/YY">
            <div style="float: right;">
                <label for="cvv" style=";" >CVV</label>
                <input type="text" id="cvv" name="cvv" style="width: 100px;" placeholder="xxx">
            </div>
            <input type="submit" value="Continue to checkout" class="btn" name="paysubmit">
        </form>
    </div>

</div>

<?php
    $database->close();
    include 'includes/footer.php';
?>