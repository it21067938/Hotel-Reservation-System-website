<div class="header">
<div class="logo">
    <img class ="logo" src="images/logo_r.png">
</div>
  
<div class="nevi_wrapper">
    <ul class ="nevi">
    <b>
        <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            ?>
                <li class ="nevi <?=($page=='login'?'active':'')?>" ><a href ="api/user_logout.php">Logout</a></li>
            <?php
        }
        else{
            ?>
                <li class ="nevi <?=($page=='login'?'active':'')?>" ><a href ="login.php">Login</a></li>
            <?php
        }
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            ?>
                <li class ="nevi <?=($page=='login'?'active':'')?>" ><a href ="user_account.php">Account</a></li>
            <?php
        }
        ?>
        <li class ="nevi <?=($page=='login'?'active':'')?>"><a href ="contact.php">Contact</a></li>
        <li class ="nevi <?=($page=='login'?'active':'')?>"><a href ="booking.php">Booking</a></li>
        <li class ="nevi <?=($page=='login'?'active':'')?>"><a href ="gallery.php">Gallery</a></li>
        <li class ="nevi <?=($page=='login'?'active':'')?>"><a href ="service.php">Services</a></li>
        <li class ="nevi <?=($page=='login'?'active':'')?>"><a href ="about.php">About</a></li>
        <li class ="nevi <?=($page=='login'?'active':'')?>"><a href ="index.php">Home</a></li>
</b>

    </ul>
</div>
</div>
<style>
body {
  background-image: url('images/background_image.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>