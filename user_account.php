<?php
    require_once 'core/init.php';
    require 'includes/user_checklog.php';
    include 'includes/head.php';
    include 'includes/header.php';
?>

    <?php
        $email = $_SESSION["email"];
        $checked = $database->query("SELECT* FROM user_ WHERE u_email= '$email' " );
        while($xxx=$checked->fetch_assoc()):
            $uid= $xxx['u_ID'];
            $name= $xxx['u_f_name'].' '. $xxx['u_l_name'];
        endwhile; 
        $sql = $database ->query("SELECT* FROM event");
        $sql_arr = array();
        
        while($row=$sql->fetch_assoc()):
            $sql_arr[$row['e_ID']] = $row;
        endwhile; 
    ?>


<div class="A_background">
    <div id="User_name">Hello <?= $name;   ?>....</div>
        <div class="U_div1">            
            <div class="U_div2">
                <div class="U_div3">
                        <h1 class="A_h2_paraTopic">Your Pervious Reservation<hr class="A_hr"></h1>
                        <?php 
                            $checked = $database->query("SELECT* FROM reservation WHERE status=1 and u_ID= '$uid' " );                                    
                            while($row=$checked->fetch_assoc()):
                                $chkreserv_ID = $row ['reserv_ID'];
                            endwhile;
                            if(isset($chkreserv_ID)){                        
                        ?>                                
                                <table class="table_feedback table-bordered">
                                                                    
                                    <tr>
                                        <th>#</th>
                                        <th>Event Type</th>
                                        <th>Reservation Date</th>
                                        <th>Reservation Time</th>
                                        <th>Reservation Details</th>
                                        <th>Event Start Date</th>
                                        <th>Event End Date</th>
                                    </tr>
                                    <tr>
                                        <?php
                                            $id = 1;
                                            $checked = $database->query("SELECT* FROM reservation WHERE status=1 and u_ID= '$uid' " );
                                            
                                        
                                            while($row=$checked->fetch_assoc()):
                                                
                                        ?>
                                        <tr><td><?php echo $id++ ?></td>
                                        <td><?php echo $sql_arr [$row ['e_ID']] ['e_type'] ?></td>
                                        <td><?php echo $row ['reserv_date'] ?></td>
                                        <td><?php echo $row ['reserv_time'] ?></td>
                                        <td><?php echo $row ['reserv_details'] ?></td>
                                        <td><?php echo $row ['e_Sdate'] ?></td>
                                        <td><?php echo $row ['e_Edate'] ?></td></tr>
                                                                
                                        <?php endwhile; ?>
                                    </tr>
                                </table>
                            <?php }
                            else{
                                ?>
                                <h4 class="reserv_on_goin">No Previous Reservation</h4>
                            <?php                         
                            } ?>                                                                                         
                </div>

                <div class="U_div4">
                        <h1 class="A_h2_paraTopic">Your Ongoing Reservation<hr class="A_hr"></h1>
                        <?php 
                            $checked = $database->query("SELECT* FROM reservation WHERE status=0 and u_ID= '$uid'" );                                    
                            while($row=$checked->fetch_assoc()):
                                $chkreserv_ID = $row ['reserv_ID'];
                            endwhile;
                            if(isset($chkreserv_ID)){               
                        ?> 
                                <table class="table_feedback table-bordered">                                
                                    <tr>
                                        <th>#</th>
                                        <th>Event Type</th>
                                        <th>Reservation Date</th>
                                        <th>Reservation Time</th>
                                        <th>Reservation Details</th>
                                        <th>Event Start Date</th>
                                        <th>Event End Date</th>
                                    </tr>
                                    <tr>
                                        <?php
                                            $id = 1;
                                            $checked = $database->query("SELECT* FROM reservation WHERE status=0 and u_ID= '$uid'" );
                                             
                                            while($row=$checked->fetch_assoc()):
                                        ?>
                                        <tr><td><?php echo $id++ ?></td>
                                        <td><?php echo $sql_arr [$row ['e_ID']] ['e_type'] ?></td>
                                        <td><?php echo $row ['reserv_date'] ?></td>
                                        <td><?php echo $row ['reserv_time'] ?></td>
                                        <td><?php echo $row ['reserv_details'] ?></td>
                                        <td><?php echo $row ['e_Sdate'] ?></td>
                                        <td><?php echo $row ['e_Edate'] ?></td></tr>
                                                                
                                        <?php endwhile; ?>
                                    </tr>
                                </table>
                            <?php }
                            else{
                                ?>
                                <h4 class="reserv_on_goin">No Ongoing Reservation</h4>
                            <?php                                
                            } ?> 
                </div>                               
            </div>


            <div class="U_div5">
                <div class="UA_form">
                    <h1 class="A_h2_paraTopic">Your Details<hr class="A_hr"></h1>
                        <?php  
                            $checked = $database->query("SELECT* FROM user_ WHERE u_email= '$email' " );
                                
                            while($row=$checked->fetch_assoc()):
                            $id=$row['u_ID'];
                        ?>
                                                            <label for="reserv_ID">
                                                                <strong>User ID : </strong>
                                                            </label>                                                            
                                                            <?php echo $row['u_ID'] ?>
                                        </br>
                                                            <label for="NIC no">
                                                                <strong> NIC No : </strong>
                                                            </label>
                                                            <?php echo $row['u_NIC'] ?>
                                        </br>
                                                            <label for="u_f_name">
                                                                <strong>First Name : </strong>
                                                            </label>
                                                            <?php echo $row['u_f_name'] ?>
                                        </br>
                                                            <label for="u_l_name">
                                                                <strong> Last Name : </strong>
                                                            </label>
                                                            <?php echo $row['u_l_name'] ?>
                                        </br>
                                                            <label for="u_email">
                                                                <strong>Mail : </strong>
                                                            </label>
                                                            <?php echo $row['u_email'] ?>
                                        </br>
                                                            <label for="u_address">
                                                                <strong>Address : </strong>
                                                            </label>
                                                            <?php echo $row['u_address'] ?>
                                        </br>
                                                            <label for="u_dob">
                                                                <strong>Date of Birth : </strong>
                                                            </label>
                                                            <?php echo $row['u_dob'] ?>
                                        </br>
                                                            <label for="u_role">
                                                                <strong>Role : </strong>
                                                            </label>
                                                            <?php echo $row['u_role'] ?>
                                        </br>
                                        </br>
                                        </br>

                                        <button class="btn" type="button" onclick="openForm(<?php echo $id?>)" >Edit</button>
                                        <div class="viewPopup">
                                        <div class="formPopup" id="<?php echo $id ?>">
                                        <form  method = "POST"class="formContainer" name ="reserv">
                                                        
                                                        <label for="U_ID" >
                                                            <strong>user ID : </strong>
                                                        </label>
                            </br>
                                                        <input type="label" id="fname" name="u_ID" value = "<?php echo $row['u_ID'] ?>">
                                    </br>
                                                        <label for="NICno">
                                                            <strong>NIC NO: </strong>
                                                        </label>
                                                        
                                                        <input type="text" id="fname" name="u_NIC" value = "<?php echo $row['u_NIC'] ?>">
                                    </br>
                                                        <label for="u_f_name">
                                                            <strong>User First Name : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="u_f_name" value = "<?php echo $row['u_f_name'] ?>">
                                    </br>
                                                        <label for="u_l_name">
                                                            <strong>User Last Name : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="u_l_name" value = "<?php echo $row['u_l_name'] ?>">
                                    </br>
                                                        <label for="u_email">
                                                            <strong>User Email : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="u_email" value = "<?php echo $row['u_email'] ?>">
                                    </br>
                                                        <label for="u_address">
                                                            <strong>Address : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="u_address" value = "<?php echo $row['u_address'] ?>">
                                    </br>
                                                        <label for="u_dob">
                                                            <strong>Date of Birth: </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="u_dob" value = "<?php echo $row['u_dob'] ?>">
                                    </br>

                                                        <button type="submit" name ="acceptbtn" class="btn" >Accept</button>
                                                       

                                                        <button type="button" class="btn cancel" onclick="closeForm(<?php echo $id?>)">Close</button>
                                                        </form>
                                                    </div>
                                    </div>
                                                
                                        </td>
                                    </tr>

                                    <?php
                if(isset($_POST["acceptbtn"])){
                    
                    $ufname = $_POST["u_f_name"];
                    $ulname = $_POST["u_l_name"]; 
                    $email = $_POST["u_email"];
                    $address = $_POST["u_address"];
                    $dob = $_POST["u_dob"];
                    $uid_ = $_POST["u_ID"];
                   
                                
                    $sql = "UPDATE user_ SET u_f_name = '$ufname', u_l_name = '$ulname', u_address =' $address',u_dob = '$dob' WHERE u_ID = '$uid_'";
                   
                    if($database->query($sql)){
                        echo "<script> alert('Thank You !!')</script>";
                    }
                    else{
                        echo "<script> alert('Error')</script>";
                        echo "Error: ".$database->error;
                    }
                    
            }
            ?>
                                    <?php endwhile; ?>    
                                    <?php $database -> close();?>  
                    </div>             
                </div>                                               
            </div>
        </div>
    </div>
</div>   




    <!-- popup open -->
    <script>
            function openForm(xxx) {
            document.getElementById(xxx).style.display = "block";
        }

        function closeForm(xxx) {
            document.getElementById(xxx).style.display = "none";
            }
    </script>


<?php
    include 'includes/footer.php';
?>
