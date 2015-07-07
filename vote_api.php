<?php
/**
 * Created by PhpStorm.
 * User: Luke Hardiman & Michael
 * Date: 04/07/2015
 * Time: 10:55 PM
 * @description : vote_api handles/mimics api framework...
 */

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
class vote_api
{
    private $db_host = "localhost";
    private $db_username = "myvote";
    private $db_name = "myvote";
    private $db_password = "T33yaFZg";
    private $allowed_calls = array();
    private $call = null;
    private $db_connect = null;
    private $_get = null;
    private $_post = null;
    private $username = null;
    private $voted = null;
    function __construct($calls = array())
    {
        //allowed calls to this db
        $this->allowed_calls = $calls;
        if (session_id() == "")
            session_start();
    }

    public function run()
    {
        //pass the rest of calls to get
        $this->_get = $_GET;
        $this->_post = $_POST;
        $this->username = (isset($_SESSION['username'])) ? $_SESSION['username'] : null;
        $this->voted = false;
        //first get request as action we need to get the key value
        if (!isset($_GET) || count($_GET) < 1)
            $this->sendResponse("invalid call" , false);


        //check the first key as this will be our action or call to script

        $this->call = $this->getCall();
        //[0];
        //check call to me
        if (!in_array($this->call,$this->allowed_calls)){
            $this->sendResponse($this->call." is a invalid action" , false);
        }

        //remove this action from get
        unset($this->_get[$this->call]);
        unset($this->_get['callback']);
        unset($this->_get['_']);

        //we end here with valid call so lets return it
        $api_call = $this->call;
        if (method_exists($this, $api_call))
            return $this->$api_call();
        else
            $this->sendResponse(" Failed to call ".$this->call , false);
    }




    //connect to the db
    private function db(){
        //singleton
        if ($this->db_connect == null)
            $this->db_connect = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
        return $this->db_connect;
    }


    private function recordVote(){
        //first thing destroy session
        session_destroy();
        /*
         * Array
        (
            [party] =>
            [mp] =>
        )
         */
        $person = $this->getRecord($this->username);

        if ($this->canVote()){
            $party = $this->get("party");
            $mp = $this->get("mp");
            $this->voted = true;


            $sql = "INSERT INTO `myvote`.`Vote` (`party`, `mp`) VALUES ('$party', '$mp');";
            $this->db()->query($sql);
            $username = $this->username;
            //record as voted
            $sql = "UPDATE `myvote`.`Person` SET `voted` = '1' WHERE `Person`.`username` = '$username';";
            $result = $this->db()->query($sql);

            $this->sendResponse("Vote casted");

        }
        $this->sendResponse("failed to cast",false);



    }

    //Simple check for a person record
    //insert person from a realme login and return person

    private function getPerson(){


        $username = $this->get('username');
        $name = $this->get('name');
        $address = $this->get('address');
        $city = $this->get('city');
        $dob = $this->get('dob');
        $pob  = $this->get('pob');
        $email  = $this->get('email');
        $gender  = $this->get('gender');
        $phone  = $this->get('phone');

        $sql = "INSERT INTO `myvote`.`Person` (`username`, `name`, `address`, `city`, `dob`, `pob`, `email`, `gender`, `phone`) VALUES ('$username', '$name', '$address', '$city', '$dob', '$pob', '$email', '$gender', '$phone');";

        $record_check = $this->db()->query($sql);
        //entry was fine
        if ($record_check){

            $this->sendResponse($this->getRecord($username));

        }else{
            //failed user will be in
            if ($this->db()->errno == 1062){

                $this->sendResponse($this->getRecord($username));
            }

            unset($_SESSION['username']);
            //something wrong happend
            $this->sendResponse("Failed error code l".$this->db()->errno,false);

        }


    }
    private function getRecord($username){
        $sql = "SELECT * FROM `Person` WHERE `username` = '$username'";
        $result = $this->db()->query($sql);

        if (!$result || $result->num_rows < 0)die("fatal no person");

        $person = $result->fetch_assoc();
        //set

        $this->voted = ($person['voted'] == 0) ? false : true;
        $_SESSION['username'] = $person['username'];
        $this->username = $person['username'];
        return $person;

    }
    //can they vote
    private function canVote(){
        return $this->username != null && $this->voted == false;
    }
    //checks if they are allowed to see vote.html
    private function allowedVote(){
        if ($this->username != null){
             $this->getRecord($this->username);
             $this->sendResponse("",$this->username != null && $this->voted == false);
        }
        $this->sendResponse("",false);
    }
    /*
     * get value from $_GET if not set FAIL
     */
    private function get($key){
        if (!isset($this->_get[$key]))
            $this->sendResponse("Failed missing field : $key ",false);

        return $this->_get[$key];
    }
    /*
     * get value from $_POST if not set FAIL
     */
    private function post($key){
        if (!isset($this->_post[$key]))
            $this->sendResponse("Failed missing field : $key ",false);

        return $this->_post[$key];
    }

    //returns the call from get
    private function getCall(){
        $keys = array_keys($this->_get);
        return $keys[0];
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

//actions allowed to our api create
$vote = new vote_api(array("getPerson","recordVote","allowedVote"));
$vote->run();