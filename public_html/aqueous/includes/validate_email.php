<?php

//Properties & methods vs variables & funactions
// opp vs procedural

/**
 * setup manual email validation
 *
 * @param $data object  $object The object to convert
 * @return array
 *
*/
class Validate_email{
    //properties
    public $data;//available outside this class
    public $email;//available outside this class
    //protected = reachable within class and classes that extend it

    //methods
    public function validate($this_email) {
        $email = $this_email;
        $cleanemail = preg_replace('/\s+/','',test_input($email));
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if ($cleanemail && !preg_match($regex, ($cleanemail))) {
            $result['error'] = "Invalid email format";
            $result['email'] = $cleanemail;
        } else {
            $result['email'] = $cleanemail;
        }
        return $result;
    }
}
$object = new Validate_email;
?>
