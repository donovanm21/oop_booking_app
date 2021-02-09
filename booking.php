<?php
// Start a session
session_start();
// Include the functions and config file
require_once('processor.php');

// Set SESSION variables
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$form_location = $_SESSION['location'];
$days = $_SESSION['days'];

?>
<html>
    <head>
        <meta >
        <title>OOP Booking Application</title>
        <link rel="stylesheet" href="includes/css/styles.css" >
        <script src="includes/js/scripts.js"></script>
    </head>
    <body class="body">
        <div class="content">
            <div class="wrapper">
                <div class="booking-comfirmation">
                    <!-- Bookings & Comparisons -->
                    <h1 class="form-heading">Confirm Your Booking</h1>
                    <p class="form-subtitle">We've found some options for you based on the selections made, see how other hotel rates compare.</p>
                    <!-- Bookings Compare Section -->
                    <h2 class="form-heading">Comparitive Bookings for <?php print($form_location); ?></h2>
                    <?php $i = 1; do {$get_location = ${'hotel' . $i}->get_location(); if($form_location == $get_location) { ?>
                    <div class="primary-booking grid-container">
                        <div class="g-item1">
                            <img src="includes/img/hotel_logo.jpg" class="hotel-logo" alt="Hotel Logo">
                            <p class="min-padding"><?php print(${'hotel' . $i}->get_name());?></p>
                        </div>
                        <div class="g-item2">
                            <span class="min-padding">Days:</span>
                            <span class="days"><?php print($days); ?></span>
                        </div>
                        <div class="g-item3">
                            <span class="min-padding">Rate:</span>
                            <span class="rate">R<?php print(${'hotel' . $i}->get_rate());?> p/d</span>
                        </div>
                        <div class="g-item4">
                            <p class="min-padding">Additional Info</p>
                            <p class="min-padding"><?php $hotel_info = ${'hotel' . $i}->get_info(); foreach($hotel_info as $x){echo $x . ', ';} echo 'Restaurant';?></p>
                        </div>
                        <div class="g-item5">
                            <p class="min-padding">Total Amount</p>
                            <p class="total-amount">R<?php print(${'hotel' . $i}->get_rate()*$days);?></p>
                            <a href="mail.php?id=<?php print(${'hotel' . $i}->get_id());?>"><button class="book-button" onclick="confirm('Confirm booking?');">Book Now</button></a>
                        </div>
                    </div>
                    <?php } $i++; } while($i <= $obj_len); ?>
                    <div class="home-button-div">
                        <a href="index.php" class="no-styles"><button class="home-button">Back To Search</button></a>
                    </div>
                    <a href="logout.php" class="no-styles"><button type="button" class="logout-button-booking">Logout</button></a>
                </div>
            </div>
        </div>
    </body>
</html>