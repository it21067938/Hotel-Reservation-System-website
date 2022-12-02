<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/admin_header.php';
?>
<h2>Dashboard</h2>

<?php 
$cat = $database->query("SELECT * FROM event");
$cat_arr = array();
while($row = $cat->fetch_assoc()){
	$cat_arr[$row['e_ID']] = $row;
}
$hall = $database->query("SELECT * FROM hall");
$hall_arr = array();
while($row = $hall->fetch_assoc()){
	$hall_arr[$row['h_No']] = $row;}
?>

<div class = "container fluid">
    <div class = "col-lg-1">
        <div class = "adrow mt-1">
            <div class = "col-md-1">
                <div class = "ad_card">
                    <div class = "ad_card_body">
                        <div class = "dataTables_wrapper no-footer">
                            <div class = "page_counter">
                                <?php
                                // page counter
                                $handle = fopen("counter.txt", "r"); 
                                if(!$handle){ 
                                    echo "could not open the file" ;
                                } 
                                else { 
                                    $counter = (int ) fread($handle,20); 
                                    fclose ($handle);  echo" <strong>  page views ". $counter . " </strong> " ;
                                    
                                    }   
                                    ?>
                                    <br><br>
                                <div class = "dataTables_length" >
                                    <label>
                                        show  
                                        <select name = "DataTables_Table_0_length">
                                            <option value = "10">10</option>
                                            <option value = "25">25</option>
                                            <option value = "50">50</option>
                                            <option value = "100">100</option>
                                        </select>
                                        entries
                                    </label>
                                </div>
                                <div id = "DataTables_Table_0_filter" class = "dataTables_filter">
                                    <label>
                                        Search:
                                        <input type = "search" class placeholder aria-controls = "DataTables_Table_0">

                                    </label>
                                </div>
                                <br/>
                                <br/>
                                <table class="table table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Details</th>
                                    <th>reserv_ID</th>
                                    <th>User ID</th>
                                    <th>reserv_date</th>
                                    <th>reserv_time</th>
                                    <th>Hall No</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    $id = 1;

                                    $checked = $database ->query("SELECT * FROM reservation where status = 0 order by status desc, reserv_ID asc");
                                    while($row=$checked->fetch_assoc()):
                                        
                                        
                                        ?>
                                    <tr>
                                        <td class="text-center"><?php echo $id++ ?></td>
                                        <td class="text-center"><?php echo $cat_arr[$row['e_ID']]['e_type'] ?></td>
                                        <td class="text-center"><?php echo $row['reserv_details'] ?></td>
                                        <td class="text-center"><?php echo $row['reserv_ID'] ?></td>
                                        <td class="text-center"><?php echo $row['u_ID'] ?></td>
                                        <td class="text-center"><?php echo $row['reserv_date'] ?></td>
                                        <td class="text-center"><?php echo $row['reserv_time'] ?></td>
                                        <td class="text-center"><?php echo $row['h_No'] ?></td>
                                        <td class="text-center"><span class="badge badge-warning">pendding</span></td>
                                        <td class="text-center">
                                                <div class="openBtn">
                                                <button class="openButton" type="button" onclick="openForm(<?=$row['reserv_ID'] ?>)" >Edit</button>
                                                    </div>
                                                    <div class="viewPopup">
                                                    <div class="formPopup" id="<?php echo $id ?>">
                                                        <form  method = "POST"class="formContainer" name ="reserv">
                                                        
                                                        <label for="reserv_ID">
                                                            <strong>Reservation ID : </strong>
                                                        </label>
                                                        
                                                        <input type="text" id="id" name="reserv_ID" value = "<?php echo $row['reserv_ID'] ?>">
                                    </br>
                                    <label for="eventid">
                                                            <strong>Event ID : </strong>
                                                        </label>
                                                        
                                                        <input type="text" id="eid" name="e_ID" value = "<?php echo $row['e_ID'] ?>">
                                    </br>
                                                        <label for="category">
                                                            <strong> Event Category : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="e_type" value = "<?php echo $cat_arr[$row['e_ID']]['e_type'] ?>">
                                    </br>
                                                        <label for="Details">
                                                            <strong>Details : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="reserv_details" value = "<?php echo $row['reserv_details'] ?>">
                                    </br>
                                                        <label for="User ID">
                                                            <strong> User ID : </strong>
                                                        </label>
                                                        <?php echo $row['u_ID'] ?>
                                    </br>
                                                        <label for="reserv_date">
                                                            <strong>reserv_date : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="reserv_date" value = "<?php echo $row['reserv_date'] ?>">
                                    </br>
                                                        <label for="reserv_time">
                                                            <strong>reserv_time : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="reserv_time" value = "<?php echo $row['reserv_time'] ?>">
                                    </br>
                                                        <label for="Hall_No">
                                                            <strong>Hall No : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="h_No" value = "<?php echo $row['h_No'] ?>">
                                    </br>
                                                        <label for="Status">
                                                            <strong>Status : </strong>
                                                        </label>
                                                        <input type="text" id="fname" name="status" value = "<?php echo $row['status'] ?>">
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
                    
                    $etype = $_POST["e_type"];
                    $details = $_POST["reserv_details"];
                    $date = $_POST["reserv_date"];
                    $time = $_POST["reserv_time"];
                    $hallno = $_POST["h_No"];
                    $status = $_POST["status"];
                    $reservid = $_POST["reserv_ID"];
                   $eid = $_POST["e_ID"];
                                
                    $sql = "UPDATE reservation SET reserv_details = '$details', reserv_date = '$date', reserv_time  =' $time',h_No = '$hallno', status ='$status' WHERE reserv_ID= '$reservid'";
                    $sqll = "UPDATE event SET e_type = '$etype'WHERE e_ID = '$eid'";
                    if($database->query($sql)){
                        echo "<script> alert('Thank You !!')</script>";
                    }
                    else{
                        echo "<script> alert('Error')</script>";
                        echo "Error: ".$database->error;
                    }
                    
                

                if($database->query($sqll)){
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function openForm(xxx) {
        document.getElementById(xxx).style.display = "block";
    }

    function acceptForm(xxx){
        document.getElemetById(xxx).style.display = "block";
    }
    function editForm(xxx){
        document.getElemetById(xxx).style.display = "block";
    }
    function closeForm(xxx) {
        document.getElementById(xxx).style.display = "none";}
 </script>


