<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/admin_header.php'
?>

<h2>Event</h2>
<?php 
$cat = $database->query("SELECT * FROM Event");
$cat_arr = array();
while($row = $cat->fetch_assoc()){
	$cat_arr[$row['e_ID']] = $row;
}
?>


<div class = "container fluid">
    <div class = "col-lg-1">
        <div class = "adrow mt-1">
            <div class = "col-md-1">
                <div class = "ad_card">
                <button class="btn" onclick="refreshForm()">Refresh</button>
                    <div class = "ad_card_body">
                        <div class = "dataTables_wrapper no-footer">
                        <table class="table table-bordered">
                                <thead>
                                    <th>E_ID</th>
                                    <th>Event Type</th>
                                    <th>Event Price</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    

                                    $checked = $database ->query("SELECT * FROM event");
                                    while($row=$checked->fetch_assoc()):
                                        
                                        
                                        ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['e_ID'] ?></td>
                                        <td class="text-center"><?php echo $row['e_type'] ?></td>
                                        <td class="text-center"><?php echo $row['e_price'] ?></td>
                                       <td><div class="admin-user-remove" onclick="removerow(<?=$row['e_ID'] ?>)">Remove</div></td>
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

<button class="add-user-button" onclick="openForm()">Add</button>

<div class="add-user-popup-form" ID="addUserForm">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="add-user-form-container">
	<h3>Add Catagory</h3>
		
		<label for="fname">Event ID</label>
		<input type="text" placeholder="Event ID" name="eid" required>

		<label for="lname">Event Type</label>
		<input type="text" placeholder="Event Type" name="etype" required>
		
		<label for="email">Event Price</label>
		<input type="text" placeholder="Event Price" name="eprice" required>

		<button type="submit" class="btn" name="addeventSubmit">Add Event</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	</form>
</div>



<?php
	if(isset($_POST["addeventSubmit"])){
		

		$eid = $_POST["eid"];
		$etype= $_POST["etype"];
		$eprice = $_POST["eprice"];

        $sql = "INSERT INTO event(e_ID, e_type, e_price) VALUES ('$eid', '$etype', '$eprice')";

        if($database->query($sql)){
            echo "<script> alert('New Event add successfully')</script>";
        }
        else{
            echo "<script> alert('Error')</script>";
            echo "Error: ".$database->error;
        } 
    }

		


    


		

	$database->close();
    ?>
<script>
function openForm() {
  		document.getElementById("addUserForm").style.display = "block";
	}

	function closeForm() {
  		document.getElementById("addUserForm").style.display = "none";
	}

    function refreshForm() {
        setTimeout(() => {
					location.reload()
				}, 150);
	}

    function removerow(eid){
		if(confirm("Do you want to delete")){
			fetch("api/delete-cat.php?eid="+eid, {
				method : "GET",
			}).then(() => {
				setTimeout(() => {
					location.reload()
				}, 1500);
			});
		}
	}
</script>
<?php
    include 'includes/admin_footer.php'
?>
