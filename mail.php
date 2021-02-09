<?php
session_start();
require_once('functions.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// Get the id from booking
$booking_id = $_GET['id'];

// Get the rate and hotel name from storage for id
foreach($data as $row) {
    $id = $row->id;
    if($id == $booking_id){
        $rate = $row->rate;
        $hotel = $row->name;
    }
}

// SESSION Variables
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$days = $_SESSION['days'];
$total_amount = $days * $rate;

// If to prevent refresh loop
if($_GET['id'] != null) {
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.co.za';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bookings@example.co.za';
        $mail->Password   = 'yourpassword';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('bookings@example.co.za', 'Hotel Bookings');
        $mail->addAddress('manager@example.co.za'); // Email address for receiving the booking cofirmation (Your email)
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your Booking Details';
        $mail->Body    = '<html>
        <head>
            <style>
                .booking-table {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                .table-row {
                    border: 1px solid black;
                }
                .table-label {
                    font-weight: bold;
                    padding: 2px 10px;
                    border: 1px solid black;
                }
                .table-data {
                    padding: 5px 10px;
                }
            </style>
        </head>
        <body>
            <h1>Booking Confirmation:</h1>
            <table class="booking-table">
                <tr class="table-row">
                <td class="table-label">Firstname:</td>
                <td class="table-data">'.$firstname.'</td>
                </tr>
                <tr class="table-row">
                <td class="table-label">Lastname:</td>
                <td class="table-data">'.$lastname.'</td>
                </tr>
                <tr class="table-row">
                <td class="table-label">Email:</td>
                <td class="table-data">'.$email.'</td>
                </tr>
                <tr class="table-row">
                <td class="table-label">Hotel:</td>
                <td class="table-data">'.$hotel.'</td>
                </tr>
                <tr class="table-row">
                <td class="table-label">Days:</td>
                <td class="table-data">'.$days.'</td>
                </tr>
                <tr class="table-row">
                <td class="table-label">Rate Per Day:</td>
                <td class="table-data">R'.$rate.'</td>
                </tr>
                <tr class="table-row">
                <td class="table-label">Total Payable:</td>
                <td class="table-data">R'.$total_amount.'</td>
                </tr>
            </table>
            <p>Thank you for booking with us, we hope you have an amazing stay.</p>
            <h3>Contact Us</h3>
            <p>Email - info@example.com</p>
            <p>Phone - 021 123 1234</p>
        </body>
    </html>';

        $mail->send();
        echo '<meta http-equiv="refresh" content="0; url=mail.php">';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<html>
    <head>
        <meta >
        <title>OOP Booking Application</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="includes/css/styles.css" >
    </head>
    <body class="body">
        <div class="content">
            <div class="wrapper">
                <div class="booking-comfirmation">
                    <!-- Thanks you -->
                    <h1 class="form-heading">Thank You for booking with use</h1>
                    <div class="home-button-div">
                        <a href="index.php" class="no-styles"><button class="home-button">Back To Search</button></a>
                    </div>
                    <!-- Refresh page in 10 seconds and reload index -->
                    <meta http-equiv="refresh" content="10; url=index.php">
                </div>
            </div>
        </div>
    </body>
</html>