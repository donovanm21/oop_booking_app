<?php
// Include the functions and config file
require_once('functions.php');

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