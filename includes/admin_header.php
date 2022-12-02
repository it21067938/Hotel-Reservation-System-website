<?php

    require 'includes/admin_checklog.php';

    $page = strtok(basename($_SERVER['PHP_SELF']), '.');
    // print_r($_SESSION);
?>
<div class="admin-headder-wrapper">
    <div class="admin-top-header">
        <a href="index.php">Go to Home Page</a> (<?= $_SESSION['username']; ?>)<a href="api/admin_logout.php">Log out</a>
    </div>

    <div class="admin_row">
        <div class="admin_nevi_wrapper">
        <div class="admin_logo">
        <img src="images/logo_admin.png" alt="admin logo">
        </div>
            <ul class="admin_nevi">
                <li class="admin_nevi <?=($page=='admin_home'?'active':'')?>" ><a href="admin_home.php">Home</a></li>
                <li class="admin_nevi <?=($page=='admin_event'?'active':'')?>" ><a href="admin_event.php">Event</a></li>
                <li class="admin_nevi <?=($page=='admin_transaction'?'active':'')?>" ><a href="admin_transaction.php">Transaction</a></li>
                <li class="admin_nevi <?=($page=='admin_feedbacks'?'active':'')?>" ><a href="admin_feedbacks.php">Feedbacks</a></li>
                <li class="admin_nevi <?=($page=='admin_user'?'active':'')?>" ><a href="admin_user.php">User Administration</a></li>
                <li class="admin_nevi <?=($page=='admin_offers'?'active':'')?>" ><a href="admin_offers.php">Offers</a></li>
            </ul>
        </div>
        <div class="admin_body_wrapper">
