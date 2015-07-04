<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 5/07/2015
 * Time: 1:16 AM
 */

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
class Vote_api
{
    private $db_host = "localhost";
    private $db_username = "myvote";
    private $db_name = "myvote";
    private $db_password = "T33yaFZg";
    private $allowed_calls = array();
    private $call = null;
    private $db_connect = null;
    private $get = null;
    private $post = null;

    function __construct($calls = array())
    {
        //allowed calls to this db
        $this->allowed_calls = $calls;
    }

    public function run()
    {
        //pass the rest of calls to get
        $this->get = $_GET;
        $this->post = $_POST;
        //first get request as action we need to get the key value
        if (!isset($_GET) || count($_GET) < 1)
            $this->sendResponse("invalid call", false);
        //check the first key as this will be our action or call to script
        $this->call = $this->getCall();
        //[0];
        //check call to me
        if (!in_array($this->call, $this->allowed_calls)) {
            $this->sendResponse($this->call . " is a invalid action", false);
        }
        //remove this action from get
        unset($this->get[$this->call]);
        //we end here with valid call so lets return it
        $api_call = $this->call;
        if (method_exists($this, $api_call))
            return $this->$api_call();
        else
            $this->sendResponse(" Failed to call " . $this->call, false);
    }


    //create a new person

private function create_person(){

//This code has not been tested yet and is not complete!! I have tried to implement some basic integrity checks

//example data
    /*$result = '{"id": "abc123", "name": "Jane", "address":"12 a street", "city":"Wellington", "dob": "31/5/1956", "pob":"Wellington",
 "email":"me@email.com","gender":"Female", "phone":"02152526", "enrolled": "1"}';
    $person = json_decode($result, true);*/
//for testing

//print_r($person);

//not working but its a check we should so
    if($person['id'] === null){
        $this->sendResponse ("The id is not there, something went wrong!",false);

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

        $this->sendResponse("Insert complete");
    }

//if they do return an error
    else {
        //echo ("Someone already has that id! stop trying to rig votes!!");
        $this->sendResponse ("Someone already has that id! stop trying to rig votes!!",false);
    }


}

    //connect to the db
private function db(){
    //singleton
    if ($this->db_connect == null)
        $this->db_connect = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
    return $this->db_connect;
}


private function record_vote(){


    $columns = implode(",",array_keys($this->post));
    //$escaped_values =  array_map(array($this, "mysqli->real_escape_string"), array_values($_POST));
    $values  = "'".implode("','", array_values($this->post))."'";



// example data, this is what will be passed by the form
    $result = '{"id": "abc123", "voted": "1", "party":"freeparking party", "mp":"somerandomguy"}';
    $person = json_decode($result, true);

//Check if the record exists, the database will not allow this insert but its better to catch the error here I think

    $record_check = mysql_query("SELECT * FROM Vote WHERE id = '".$person['id']."' ");
    $check_result = mysql_num_rows($record_check);

    $sql = "INSERT INTO myvote.vote ($columns) VALUES ($values);";
    $this->sendResponse($sql);

//This person has not voted.
    if ($check_result === 0) {


    }

//they have, lets handle the error here
    else {
        $this->sendResponse("This person somehow managed to send their vote twice!!",false);
    }


}

    //Simple check for a person record
    private function person_check(){
        $person_name = $this->get['name'];

        $record_check = $this->db()->query("SELECT * FROM Person WHERE id = '$person_name' ");
        $check_result = $this->db()->mysqli_num_rows($record_check);

        if ($check_result === 0) {

//this person does not exit

        }
        else {


        }

    }

    //send response back to caller
    private function sendResponse($data,$success=true){
        $response['data'] = $data;
        $response['success'] = $success;

        $response = json_encode($response);

        header('Access-Control-Allow-Origin: *');
        header('Content-Type:  application/json');

        echo isset($_GET['callback'])
            ? "{$_GET['callback']}($response)"
            : $response;

        exit; //kill from other processing
    }


}

//actons to our api create
$realMe = new realme_api(array("create","login"));
$realMe->run();