<?php

    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/admin_header.php';

?>
<h2>Feedbacks</h2>
<div class="admin-user-list-wrapper-all">
    
    <li class="admin-list">
    <?php	
		$sql = "select * from feedback";
		$result = $database->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc()) 
			{
				?>
				<ul class="admin-list">
					<div class="admin-user-list-wrapper">
						<div class="admin-user-details">
							<div>
								<div><?=$row["u_name"] ?? ""?></div>
								<div><?=$row["c_mnt"] ?? ""?></div>
							</div>
							<div><?=$row["cmnt_reply"] ?? ""?></div>
						</div>
						<?php 
							if($row["choose"] == 0){
								?>
								<div class="admin-user-pro" onclick="showrow(<?=$row['f_ID'] ?>)">Show</div>
								<?php 
							}
							else if($row["choose"] == 1) {
								?>
								<div class="admin-user-dimo" onclick="hiderow(<?=$row['f_ID'] ?>)">Hide</div>
								<?php
							}
						?>
						<div class="admin-user-pro" id="replyadmin" onclick="openForm(<?=$row['f_ID'] ?>)"?>Reply</div>
						
					</div>
				</ul>
			<?php 
			}
		}
		else
			{ echo "no results"; }
	?>
    
    </li>
</div>

<div class="add-user-popup-form" ID="addUserForm">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="add-user-form-container">
	<h3>Reply to Feedback</h3>

		<input type="text" placeholder="Enter F ID" name="fid" id="f_id" required>

		<label for="con2">reply</label>
		<textarea placeholder="YOUR Reply:" name="message" rows="18" cols="35" ></textarea>
		<br/>
		<lable for="">Do you want to reply this feedback</lable>
		<input type="checkbox" ID="wanttocheck" name="agree" value="agree">

		<button type="submit" class="btn" name="replySubmit">Submit Reply</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	</form>
</div>

<?php
	if(isset($_POST["replySubmit"])){
		$username = $_SESSION["username"];
		$checked = $database->query("SELECT* FROM login WHERE s_name= '$username'" );
		while($login=$checked->fetch_assoc()):
		$sid= $login['s_ID'];
		endwhile; 

		$sqlm = $database->prepare("UPDATE feedback SET s_ID = ? , cmnt_reply = ? WHERE f_ID = ?");
		// print_r($database);
		$sqlm->bind_param('isi', $sID, $Reply, $fID);
		$sID = $sid;
		$Reply= $_POST["message"];
		$fID = $_POST["fid"];
		$sqlm->execute();
		$sqlm->close();
	}
	$database->close();
?>

<script>
	function openForm(fid) {
  		document.getElementById("addUserForm").style.display = "block";
		document.getElementById("f_id").value=fid;
		document.getElementById("f_id").style.display = "none";
	}

	function showrow(f_ID){
		if(confirm("Do you want to show this offer from public")){
			fetch("api/show-offer.php?f_ID="+f_ID, {
				method : "GET",
			}).then(() => {
				setTimeout(() => {
					location.reload()
				}, 1500);
			});
		}
	}
	function hiderow(f_ID){
		if(confirm("Do you want to hide this offer from public")){
			fetch("api/hide-offer.php?f_ID="+f_ID, {
				method : "GET",
			}).then(() => {
				setTimeout(() => {
					location.reload()
				}, 1500);
			});
		}
	}

	function closeForm() {
  		document.getElementById("addUserForm").style.display = "none";
	}
</script>

<?php
    include 'includes/admin_footer.php'
?>