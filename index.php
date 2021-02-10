<?php
// Start a session
session_start();
// Include the functions and config file
require_once('processor.php');

if($_POST['days'] != '' && $_POST['days'] != 0) { 
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $form_location = $_POST['location'];
    $days = $_POST['days'];

    if($firstname != "" && $lastname != "" && $email != "") {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['location'] = $form_location;
        $_SESSION['days'] = $days;
        header("Location: booking.php");
    }
}

?>
<html>
    <head>
        <meta >
        <title>OOP Booking Application</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="includes/css/styles.css" >
        <script src="includes/js/scripts.js"></script>
    </head>
    <body class="body">
        <div class="content">
            <div class="wrapper">
                <div class="booking-form">
                    <h1 class="form-heading">Hotel Booking App</h1>
                    <p class="form-subtitle">Use our free booking app to do a quick comparison between hotel accomidation 
                        and find the best price available for the nominated night stay.
                    </p>
                    <form action="index.php" method="post">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" class="form-input form-input-text" id="firstname" oninput="inputError(this.id);" value="<?php if($_SESSION['firstname'] != ""){ echo $_SESSION['firstname'];} ?>">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" class="form-input form-input-text" id="lastname" oninput="inputError(this.id);" value="<?php if($_SESSION['lastname'] != ""){ echo $_SESSION['lastname'];} ?>">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-input form-input-text" id="email" oninput="inputError(this.id);" value="<?php if($_SESSION['email'] != ""){ echo $_SESSION['email'];} ?>">
                        <label for="checkin" class="form-label">Check In</label>
                        <input type="date" class="form-input" id="checkin" oninput="checkinDate();">
                        <p class="error-bubble hidden" id="checkin-error">Please correct the date selection</p>
                        <label for="checkout" class="form-label">Check Out</label>
                        <input type="date" class="form-input" id="checkout" oninput="totalDays(); checkoutDate();">
                        <p class="error-bubble hidden" id="date-error">Please correct the date selection</p>
                        <label for="region" class="form-label">Select your region</label>
                        <select id="region" name="location" class="form-input form-input-select">
                            <?php foreach($location_array as $l) { ?>
                            <option class="form-input-select" value="<?php print($l); ?>"><?php print($l); ?></option>
                            <?php }; ?>
                        </select>
                        <label for="num-days" class="form-label">Number of Days</label>
                        <input type="number" name="days" class="form-input form-input-text form-input-number" id="num-days">
                        <input type="submit" class="form-submit" name="submit" value="Find My Booking" >
                        <a href="logout.php" class="no-styles"><button type="button" class="logout-button">Sign Out</button></a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>