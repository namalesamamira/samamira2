<?php

/**
 * Clean up text input
 * 
 * @param $data object  $object The object to convert
 * @return array
 *
*/
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
