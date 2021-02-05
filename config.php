<?php
// Fetch data from json
$data = file_get_contents('data.json');
// Decode into php array
$data = json_decode($data);

?>