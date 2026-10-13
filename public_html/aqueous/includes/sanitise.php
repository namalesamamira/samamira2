<?php

//Properties & methods vs variables & funactions
// opp vs procedural

/**
 * Clean up text input
 *
 * @param $data object  $object The object to convert
 * @return array
 *
*/
class Sanitise{
    //properties
    public $data; //available outside this class
    private $_host  = 'mysql'; //
    //protected = reachable within class and classes that extend it

    //methods
    public function clean($input_data) {
        $data = trim($input_data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$object = new Sanitise;
?>
