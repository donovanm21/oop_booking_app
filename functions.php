<?php

require('config.php');

// Echo items from array
function arrayItem($array){
    foreach($array as $a){
        echo $a . ", ";
    }
}
// Site root
function root() {
    header("Location: index.php");
}

// Hotel class object
class Hotel {
    // Properties
    public $id;
    public $name;
    public $location;
    public $rate;
    public $info;

    // Methods
    function set_data($id,$name,$location,$rate,$info) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->rate = $rate;
        $this->info = $info;
    }
    function get_id() {
        return $this->id;
    }
    function get_name() {
        return $this->name;
    }
    function get_location() {
        return $this->location;
    }
    function get_rate() {
        return $this->rate;
    }
    function get_info() {
        return $this->info;
    }
}

?>