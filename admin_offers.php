<?php

    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/admin_header.php';

	// if (!isset($_SESSION["username"])) {
	// 	print_r($_SESSION);
	// 	header("location: error.php");
	// 	exit;
	// }
?>
<h2>User Management</h2>
<div class="admin-user-list-wrapper-all">
    
    <table class="admin-list">
        <th>o_ID</th>
        <th>o_startDate</th>
        <th>o_expDate</th>
        <th>o_dis</th>
        <th>o_description</th>
        <th>control</th>
    <?php	
		$sql = "select * from offer";
		$result = $database->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc()) 
			{
				?>
				<tr class="admin-list">
					<td><?=$row["o_ID"] ?? ""?></td>
                    <td><?=$row["o_startDate"] ?? ""?></td>
                    <td><?=$row["o_expDate"] ?? ""?></td>
                    <td><?=$row["o_dis"] ?? ""?></td>
                    <td><?=$row["o_description"] ?? ""?></td>
					<td>                  
                        <div class="admin-user-remove" onclick="removerow(<?=$row['o_ID'] ?>)">Remove</div>
                    </td>
                </tr>
			<?php 
			}
		}
		else
			{ echo "no results"; }
	?>
    
    </table>
</div>

<button class="add-user-button" onclick="openForm()">Add</button>

<div class="add-user-popup-form offers-popup-form" ID="addUserForm">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="add-user-form-container">
	<h3>Add Offer</h3>
		
		<label for="disco">Discount</label>
		<input type="text" placeholder="Enter discount amount" name="disco" required>

		<label for="descr">Description</label>
		<input type="text" placeholder="Enter description" name="descr" required>
		
		<label for="sDate">Offer start date</label>
		<input type="date" placeholder="Enter start date" name="sDate" required>

		<label for="eDate">Offer end date</label>
		<input type="date" placeholder="Enter end date" name="eDate" required>
		
        <lable for="">Do you want to create new offer</lable>
		<input type="checkbox" ID="wanttocheck" name="agree" value="agree">

		<button type="submit" class="btn" name="addOfferSubmit">Create Offer</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	</form>
</div>



<?php
	if(isset($_POST["addOfferSubmit"])){
		
		$sqlm = $database->prepare("INSERT INTO offer (o_ID, o_startDate, o_expDate, o_dis, o_description) VALUES('', ?, ?, ?, ?)");
		// print_r($database);
		$sqlm->bind_param('ssis', $Sdate, $Edate, $Dis, $Descr);

		$Sdate = $_POST["sDate"];
		$Edate= $_POST["eDate"];
		$Dis = $_POST["disco"];
		$Descr= $_POST["descr"];
		$sqlm->execute();

	$sqlm->close();
	}
	
	$database->close();
?>
<script>
	function removerow(oid){
		if(confirm("Do you want to delete")){
			fetch("api/delete-offer.php?oid="+oid, {
				method : "GET",
			}).then(() => {
				setTimeout(() => {
					location.reload()
				}, 1500);
			});
		}
	}
	function openForm() {
  		document.getElementById("addUserForm").style.display = "block";
	}

	function closeForm() {
  		document.getElementById("addUserForm").style.display = "none";
	}
</script>
<?php
    include 'includes/admin_footer.php'
?>