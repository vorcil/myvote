<?php
//This code has not been tested yet and is not complete!! I have tried to implement some basic integrity checks

//db include goes here

//example data
$result = '{"id": "abc123", "name": "Jane", "address":"12 a street", "city":"Wellington", "dob": "31/5/1956", "pob":"Wellington",
 "email":"me@email.com","gender":"Female", "phone":"02152526", "enrolled": "1"}';
$person = json_decode($result, true);
//for testing

//print_r($person);

//not working but its a check we should so
if($person['id'] === null){
 echo ("The id is not there, something went wrong!");

}

//query the database for the id that has been provided
$record_check = mysql_query("SELECT * FROM Person WHERE id = '".$person['name']."' ");
$check_result = mysql_num_rows($record_check);

//Check to see if the person exists

//if they dont insert the new record
if ($check_result === 0) {
    mysql_query("INSERT INTO  `myvote`.`Person` (`id`,
`password`,
`name`,
`address`,
`city`,
`dob`,
`pob`,
`email`,
`gender`,
`phone`,
`enrolled`)
  VALUES ('".$person['id']."', '".$person['name']."', '".$person['address']."', '".$person['city']."', '".$person['dob']."', '".$person['pob']."', '".$person['email']."'
  , '".$person['gender']."', '".$person['phone']."', '".$person['enrolled']."')");
}

//if they do return an error
else {
    echo ("Someone already has that id! stop trying to rig votes!!");
}




