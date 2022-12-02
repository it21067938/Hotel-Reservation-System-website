<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/admin_header.php'
?>
<h2>Transaction</h2>
<?php 
$cat = $database->query("SELECT * FROM staff");
$cat_arr = array();
while($row = $cat->fetch_assoc()){
	$cat_arr[$row['s_ID']] = $row;
}

$res = $database->query("SELECT * FROM reservation");
$res_arr = array();
while($row = $res->fetch_assoc()){
	$res_arr[$row['reserv_ID']] = $row;}
?>

<br><br>


                                    

<div class = "container fluid">
    <div class = "col-lg-1">
        <div class = "adrow mt-1">
            <div class = "col-md-1">
                <div class = "ad_card">
                    <div class = "ad_card_body">
                        <div class = "dataTables_wrapper no-footer">
                        <table class="table table-bordered">
                                <thead>
                                    <th>P_ID</th>
                                    <th>Reserv_ID</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>paid Date</th>
                                    <th>Paid By user </th>
                                    
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                   

                                    $checked = $database ->query("SELECT * FROM payment ");
                                    while($row=$checked->fetch_assoc()):
                                        
                                        
                                        ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['p_ID'] ?></td>
                                        <td class="text-center"><?php echo $row['reserv_ID'] ?></td>
                                        <td class="text-center"><?php echo $row['p_type'] ?></td>
                                        <td class="text-center"><?php echo $row['p_amount'] ?></td>
                                        <td class="text-center"><?php echo $res_arr[$row['reserv_ID']]['reserv_date']?></td>
                                        <td class="text-center"><?php echo $row['u_ID'] ?></td>
                                        
                                        
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include 'includes/admin_footer.php'
?>