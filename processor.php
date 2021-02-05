<?php
// Start a session
session_start();
// Include the functions and config file
require_once('functions.php');

// Create Hotel instances of each hotel
$obj_len = count($data);

foreach($data as $row) {
    $id = $row->id;
    $name = $row->name;
    $rate = $row->rate;
    $info = $row->info;
    ${"hotel" . $id} = new Hotel();
    ${"hotel" . $id}->set_data($id, $name, $rate, $info);
    print_r(${"hotel" . $id});
    echo '<br>';
}

?>

<select>
    <?php $i = 1; while($i <= $obj_len) { ?>
    <option value="<?php print(${'hotel'.$i}->get_name()); ?>"><?php print(${'hotel'.$i}->get_name()); ?></option>
    <?php $i++; }; ?>
</select>
<?php $i = 1; while($i <= $obj_len) { ?>
<p><?php print(${'hotel'.$i}->get_rate()); ?></p>
<?php $i++; }; ?>
