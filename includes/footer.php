<div class="footer">
   <div class="gridContainer">
    <div class="contact">
        <h5>Contact Details</h5>
           <img class="contactIcon" src="images/phoneiconwhite.png" alt="call"><a>T:(+94)11585452</a><br>
           <img class="contactIcon" src="images/emailiconwhite.png" alt=""><a>randenigrandhotel@gmail.com</a><br>
           <img class="contactIcon" src="images/addressiconwhite.png" alt=""><a>No. 223, Wattala Road, Negombo.</a><br>
           <a href="https://www.facebook.com"><img class="contactlogo"  src="images/facebooklogo.png" alt="Facebooklogo"></a>
           <a href="https://www.instagram.com"><img class="contactlogo" src="images/Instalogo.png" alt="instalogologo"></a>
           <a href="https://www.twitter.com"><img class="contactlogo"  src="images/twitterlogo.png" alt="twitterlogo"></a>
           <a href="https://www.booking.com"><img class="contactlogo"  src="images/booking-icon.png" alt="bookinglogo"></a>
           
    </div>

    <div class="explore">
        <h5><center>Explore</center></h5> 
        <ul class="exploresub">
            <li class =""><a href ="">Home</a></li>
            <li class =""><a href ="about.php">About</a></li>
            <li class =""><a href ="service.php">Services</a></li>
            <li class =""><a href ="gallery.php">Gallery</a></li>
            <li class =""><a href ="booking.php">Booking</a></li>
            <li class =""><a href="contact.php">Contact</a></li>            
            <li class =""><a href="admin_home.php">Admin</a></li>
        </ul>
    </div>
    <div class="opentime">
        <h5>Opening Timings</h5>
        <p>
            Mon-Fri 9.00 am-10.00 pm<br>
            Weekend 9.00 am-11.00 pm
        </p>
    </div>

    <div class="qrcode">
        <img class="qr" src="images/qr.png" alt="qr">
    </div>
   </div>
</div>

<script>
    var parth[6] = ""
    parth = document.getElementByClass("active");
    if (window.location.pathname != "index.php"){
        parth.style.display = "none";
    }
</script>

<?php
    include 'includes/foot.php';
?>