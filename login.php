<?php
// Start a session
session_start();

if(isset($_SESSION['signed-in']) && $_SESSION['signed-in'] === true) {
    header("location: index.php");
    exit;
}

if($_POST['firstname'] != '' && $_POST['email'] != '') { 
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];

    if($firstname != "" && $email != "") {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['email'] = $email;
        $_SESSION['signed-in'] = true;
        header("location: index.php");
        exit;
    }
}

?>
<html>
    <head>
        <meta >
        <title>OOP Booking Application</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
        <link rel="stylesheet" href="includes/css/styles.css" >
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
        <script src="includes/js/scripts.js"></script>
    </head>
    <body class="body">
        <div class="content">
            <div class="wrapper">
                <div class="signin-form">
                    <h1 class="signin-heading">Hotel Booking App</h1>
                    <p class="signin-subtitle">Please sign in below
                    </p>
                    <form action="login.php" method="post">
                        <label for="firstname" class="signin-label">First Name</label>
                        <input type="text" name="firstname" class="signin-input form-input-text" id="firstname" oninput="inputError(this.id);" >
                        <label for="email" class="signin-label">Email</label>
                        <input type="text" name="email" class="signin-input form-input-text" id="email" oninput="inputError(this.id);" >
                        <input type="submit" class="signin-submit" name="submit" value="Sign In" >
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>