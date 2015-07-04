<?php
$record_check = mysql_query("SELECT * FROM Person WHERE id = '".$person['name']."' ");
$check_result = mysql_num_rows($record_check);

 if ($check_result === 0) {

//this person does not exit

}
else {

    
}