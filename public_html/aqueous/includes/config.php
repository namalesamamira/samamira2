<?php

//email form sends to
$to="namalesamamira@gmail.com";
$subject="Website Feedback";


/*******************************************
*************  CREDENTIALS  ****************
********************************************/
$databaseserver="mysql";
$databasename="database";
$databaseuser="sam";
$databasepass="abc123";
$table="leads";

//Connect
$mysqli = new mysqli($databaseserver, $databaseuser, $databasepass, $databasename);
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}

// echo 'Success... ' . $mysqli->host_info . "\n";


// $con=mysql_connect($databaseserver,$databaseuser,$databasepass);
// $selectdb = mysql_select_db($databasename);

//$total = mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `user_name` = '{$user}'");
//
//



// TODO: smartly process the form using this array
// TODO: pick all fields automagically
// TODO: use deep array with validation rules,
$formfields="name, email,created_at,phone,addMeToMailList";

// define variables and set to empty values
$name = $phone = $email = $addMeToMailList = "";

date_default_timezone_set('Africa/Nairobi');
$created_at=date("Y-m-d H:i:s");

$msg = "Time: " . $created_at . "\n";

$data = array();// array to pass back data
$errors = array();

?>
