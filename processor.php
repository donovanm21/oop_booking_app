<?php
// Include the functions and config file
require_once('functions.php');

// Check if user is signed in
if(!$_SESSION['signed-in']) {
    header("Location: login.php");
}

// Location array
$location_array = array();
// Create Hotel instances of each hotel
$obj_len = count($data);
// Create Hotel instances
foreach($data as $row) {
    $id = $row->id;
    $name = $row->name;
    $location = $row->location;
    $rate = $row->rate;
    $info = $row->info;
    ${"hotel" . $id} = new Hotel();
    ${"hotel" . $id}->set_data($id, $name, $location, $rate, $info);
    if(in_array($location, $location_array)) {
        $match = 'found';
    } else {
        array_push($location_array, $location);
    }
    
}
?>