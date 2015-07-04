<?php

//db include here

// example data, this is what will be passed by the form
$result = '{"id": "abc123", "voted": "1", "party":"freeparking party", "mp":"somerandomguy"}';
$person = json_decode($result, true);

//Check if the record exists, the database will not allow this insert but its better to catch the error here I think

$record_check = mysql_query("SELECT * FROM Vote WHERE id = '".$person['id']."' ");
$check_result = mysql_num_rows($record_check);

//This person has not voted.
if ($check_result === 0) {

    mysql_query("INSERT INTO  `myvote`.`Person` (`id`,
`voted`,
`party`,
`mp`)
  VALUES ('".$person['id']."', '".$person['voted']."', '".$person['party']."', '".$person['mp']."')");


}

//they have, lets handle the error here
else {
    echo ("This person somehow managed to send their vote twice!!");
}










