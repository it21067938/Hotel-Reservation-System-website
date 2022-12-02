<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/header.php';
?>
<div class="background_CPage">
    <h1 class="contact_us_CPage"><center>CONTACT US</center><hr class="hr_CPage"></h1>
    <div class="boxdetail_CPage">
        <div class="boxborder_CPage">
            <h3 class="box_hotelname_CPage">THE RANDENI GRAND HOTEL</h3>
            <p class="contact_detail_CPage">No. 223, Wattala Road, Negombo,<br>Sri Lanaka<br><br>randenigrandhotel@gmail.com
            <br><br> T:(+94)11585452</p>

            <p class="contact_detail_topics_CPage"><u>For F&B & food promotions Contact us on</u></p>
            <p class="contact_detail_CPage">011-2116523 ext 521<br>f&b@randenihotel.lk<br></p>

            <p class="contact_detail_topics_CPage"><u>For Banquets & inquiries, please contact our Banquet Team</u><br><br> Dinushika Withana :</p> 
            <p class="BanquetTeam_detail_CPage">(+94)765492148<br>withana@randenihotel.lk</p>
            <p class="contact_detail_topics_CPage">Dinuth Fernando :</p> 
            <p class="BanquetTeam_detail_CPage">(+94)701238547<br>dinuth@randenihotel.lk</p>
            <p class="contact_detail_topics_CPage">Isuru Madushan :</p> 
            <p class="BanquetTeam_detail_CPage">(+94)775632781<br>isuru@randenihotel.lk</p>
            <p class="contact_detail_topics_CPage">Sajana Lakshan :</p> 
            <p class="BanquetTeam_detail_CPage">(+94)775627410<br>Sajana@randenihotel.lk</p>
            <p class="contact_detail_topics_CPage">Avishka Herath :</p> 
            <p class="BanquetTeam_detail_CPage">(+94)709124520<br>avishka@randenihotel.lk</p>
            
            <p class="contact_detail_topics_CPage"><u>For Salesinquiries, please contact our Sales Team</u><br><br>Dinushan Pathirana :</p> 
            <p class="BanquetTeam_detail_CPage">(+94)767854614<br>dinushan@randenihotel.lk</p>
            <p class="contact_detail_topics_CPage">Nilan Thushara :</p> 
            <p class="BanquetTeam_detail_CPage">(+94)725427333<br>nilan@randenihotel.lk</p>
            <p class="contact_detail_topics_CPage">Rasanjana Herath :</p> 
            <p class="BanquetTeam_detail_CPage">(+94)764625489<br>rasanjana@randenihotel.lk</p><br>

            <h3 class="box_hotelname_CPage">Contact Us</h3>
            <img class="CPage_link_contactlogo" src="images/facebooklogo.png" alt="Facebooklogo">
            <img class="CPage_link_contactlogo" src="images/Instalogo.png" alt="instalogologo">
            <img class="CPage_link_contactlogo" src="images/twitterlogo.png" alt="twitterlogo">
            <img class="CPage_link_contactlogo" src="images/booking-icon.png" alt="bookinglogo">
        </div>
    </div>

    
    <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    ?>

            <div class="c_feedback">
                <h2 class="C_h2_paraTopic">FeedBack</h2><hr class="C_feed_hr">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <textarea placeholder="YOUR MESSAGE:" name="message" rows="10" cols="97" ></textarea>
                        <br><br><br>
                        <input type="submit" value="submit" name="Fsubmit" class="C_submit">
                    </form>
            </div>


            <?php
                if(isset($_POST["Fsubmit"])){
                    
                    $Message = $_POST["message"];

                    $email = $_SESSION["email"];
                    $checked = $database->query("SELECT* FROM user_ WHERE u_email= '$email' " );
                    while($xxx=$checked->fetch_assoc()):
                        $uid= $xxx['u_ID'];
                        $name= $xxx['u_f_name'].' '. $xxx['u_l_name'];
                    endwhile; 
                                
                    $sql = "INSERT INTO feedback(f_ID, s_ID, u_ID, email, c_mnt, u_name, cmnt_reply) VALUES ('', NULL, '$uid', '$email', '$Message', '$name', '')";

                    if($database->query($sql)){
                        echo "<script> alert('Thank You !!')</script>";
                    }
                    else{
                        echo "<script> alert('Error')</script>";
                        echo "Error: ".$database->error;
                    } 
                }
            ?>
    <?php
        }
    ?>



    <!-- <?php
        $sql = $database ->query("SELECT* FROM event");
        
        $sql_arr = array();
        while($row=$sql->fetch_assoc()){
            $sql_arr[$row['e_ID']] = $row;
        }
    ?> -->



    <!-- display feedback -->
    <h2 class="C_h2_paraTopic">What our guests say...</h2><hr class="C_feed_hr">
    <div class = "col-md-1 table">
        <div class="table_feedback table-bordered">               
                <?php
                    $display = $database->query("SELECT u_name, c_mnt, cmnt_reply FROM feedback WHERE choose=1" );
                    //print_r($database);

                    while($row=$display->fetch_assoc()):
                ?>
            <div class="feedback_list">                                        
                <div class="feedback_list_cmnt_user" >
                    <h5><?php echo $row ['u_name'] ?></h5>
                    <div class="feedback_list_cmnt"><?php echo $row ['c_mnt'] ?></div>
                </div>
                <div class="feedback_list_reply"><h6>Reply : </h6><?php echo $row ['cmnt_reply'] ?></div>
            </div>                                     
            <?php endwhile; ?>
        </div> 
    </div>  
    
    
</div>  

                    

<?php
    include 'includes/footer.php';
?>


