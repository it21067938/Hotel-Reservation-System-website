<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/header.php';
?>
<div class="E_background">

    <div class="register">
        <center>
        <div class="eventheading">
            <h1>Event Booking</h1>
        </div>
        </center>
        <form id="register" method="post" action="payment.php">
            <label>First Name*</label>
            <br>
            <input type="text" name="fname"
            id="name" placeholder="Enter your first name">
            <br><br>
            <label>Last Name*</label>
            <br>
            <input type="text" name="lname"
            id="name" placeholder="Enter your last name">
            <br><br>
            <label>E-mail*</label>
            <br>
            <input type="email" name="email"
            id="name" placeholder="you@example.com">
            <br><br>
            <label>Contact number 1*</label>
            <br>
            <input type="text" name="con1"
            id="name" placeholder="Contact number">
            <br><br>
            <label>Contact number 2* </label>
            <br>
            <input type="text" name="con2"
            id="name" placeholder="Contact number">
            <br><br>
            <label>Date Of Birth*</label>
            <br>
            <input type="date" name="dob"
            id="date" placeholder="dd/mm/yyyy">
            <br><br>
            <label>Address*</label>
            <br>
            <input type="text" name="address"
            id="name" placeholder="Current address">
            <br><br>
            <label>NIC*</label>
            <br>
            <input type="text" name="nic"
            id="nic">
            <br><br>
            <label>No.of guests*</label>
            <br>
            <input type="text" name="guest"
            id="guest">
            <br><br>
            <label>Hall size*</label>
            <br>
            <select id="name" name="size">
                <option value="none">None</option>
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>
            <br><br>
            <label>Event date-From*</label>
            <br>
            <input type="date" name="sdate"
            id="date" placeholder="dd/mm/yyyy">
            <br><br>
            <label >Event date-To* </label>
            <br>
            <input type="date" name="edate"
            id="date" placeholder="dd/mm/yyyy">
            <br><br>
            <label>Event Type*</label>
            <br>
            <select id="name" name="event">
                <option value="none">None</option>
                <option value="Birthday">Birthday</option>
                <option value="Wedding">Wedding</option>
                <option value="Conference">Conference</option>
                <option value="Musical Show">Musical Show</option>
                <option value="Bride to be party">Bride To Be Party</option>
                <option value="Bachelor party">Bachelor Party</option>
            </select>
            <br><br>
            <label>Requirements or comments</label>
            <br>
            <textarea id="requirements" name="requirements"
            rows="5" cols="60"></textarea>
            <br><br>
            <input type="submit" value="Submit"
            name="submit" id="ssbtn">
            <br><br>
    </form>

    

    </div>
</div>
<?php
    include 'includes/footer.php';
?>