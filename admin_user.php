<?php

    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/admin_header.php';

?>
<h2>User Management</h2>
<div class="admin-user-list-wrapper-all">
    
    <li class="admin-list">
    <?php	
		$sql = "select * from User_";
		$result = $database->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc()) 
			{
				?>
				<ul class="admin-list">
					<div class="admin-user-list-wrapper">
						<div class="admin-user-details"><?=$row["u_f_name"] ?? ""?> <?=$row["u_l_name"] ?? ""?> : <?=$row["u_role"] ?? ""?></div>
						<?php 
						if($row["u_role"] == "Customer"){
							?>
							<div class="admin-user-pro" onclick="promotrow(<?=$row['u_ID'] ?>)">Promote</div>
							<?php 
						}
						else if($row["u_role"] == "Member") {
							?>
							<div class="admin-user-dimo" onclick="demoterow(<?=$row['u_ID'] ?>)">Demote</div>
							<?php
						}
						?>
						<div class="admin-user-remove" onclick="removerow(<?=$row['u_ID'] ?>)">Remove</div>
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

<button class="add-user-button" onclick="openForm()">Add</button>

<div class="add-user-popup-form" ID="addUserForm">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="add-user-form-container">
	<h3>Add User</h3>
		
		<label for="fname">First Name</label>
		<input type="text" placeholder="Enter first name" name="fname" required>

		<label for="lname">First Name</label>
		<input type="text" placeholder="Enter last name" name="lname" required>
		
		<label for="email">Email</label>
		<input type="text" placeholder="Enter Email" name="email" required>

		<label for="nic">NIC No</label>
		<input type="text" placeholder="Enter NIC Number" name="nic" required>
		
		<label for="address">Address</label>
		<input type="text" placeholder="Enter Address" name="address" required>

		<label for="dob">Date of Birth</label>
		<input type="date" placeholder="Enter Date of Birth" name="dob" required>
		<br/>
		<label for="con1">1st contact no</label>
		<input type="text" placeholder="Enter 1st contact no" name="con1" required>

		<label for="con2">2nd contact no</label>
		<input type="text" placeholder="Enter 2nd contact no" name="con2" required>
		<br/>
		<lable for="">Do you want to create new user</lable>
		<input type="checkbox" ID="wanttocheck" name="agree" value="agree">

		<button type="submit" class="btn" name="addUserSubmit">Create user</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	</form>
</div>



<?php
	if(isset($_POST["addUserSubmit"])){
		
		$sqlm = $database->prepare("INSERT INTO user_ (u_ID, u_NIC, u_f_name, u_l_name, u_email, u_address, u_dob, u_role, u_psw) VALUES('', ?, ?, ?, ?, ?, ?, ?, ?)");
		// print_r($database);
		$sqlm->bind_param('ssssssss', $NIC, $Fname, $Lname, $Email, $Address, $DOB, $role, $pass);

		$Fname = $_POST["fname"];
		$Lname= $_POST["lname"];
		$Email = $_POST["email"];
		$NIC= $_POST["nic"];
		$Address= $_POST["address"];
		$DOB = $_POST["dob"];
		$role = "Member";
		$pass = generatePassword();
		$sqlm->execute();

		$last_user_id = $database->insert_id;
		echo $last_user_id;
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
	}
	
	$database->close();

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
?>
<script>
	function removerow(uid){
		if(confirm("Do you want to delete")){
			fetch("api/delete-user.php?uid="+uid, {
				method : "GET",
			}).then(() => {
				setTimeout(() => {
					location.reload()
				}, 1500);
			});
		}
	}
	function promotrow(uid){
		if(confirm("Do you want to promote this user")){
			fetch("api/promote-user.php?uid="+uid, {
				method : "GET",
			}).then(() => {
				setTimeout(() => {
					location.reload()
				}, 1500);
			});
		}
	}
	function demoterow(uid){
		if(confirm("Do you want to demote this user")){
			fetch("api/demote-user.php?uid="+uid, {
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