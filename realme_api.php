<?php
/**
 * Created by PhpStorm.
 * User: Luke Hardiman
 * Date: 03/07/2015
 * Time: 10:55 PM
 * @description : basic hack job for an api sooo wrong...
 */
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
class realme_api {
    private $db_host = "localhost";
    private $db_username = "myvote";
    private $db_name = "myvote";
    private $db_password = "T33yaFZg";
    private $allowed_calls = array();
    private $call = null;
    private $db_connect = null;
    private $get = null;
    private $post = null;
    function __construct($calls = array()) {
            //allowed calls to this db
            $this->allowed_calls = $calls;

    }

    public function run(){
        //pass the rest of calls to get
        $this->get = $_GET;
        $this->post = $_POST;

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
        unset($this->get[$this->call]);

        //we end here with valid call so lets return it
        $api_call = $this->call;
        if (method_exists($this, $api_call))
            return $this->$api_call();
        else
            $this->sendResponse(" Failed to call ".$this->call , false);

    }

    /*
     * checks user returns realme details
     */
    private function login(){

        $username = $this->get['username'];
        $password = $this->get['password'];
        $sql = "SELECT * FROM myvote.realme WHERE username = '$username' AND password = '$password' LIMIT 1";
        $results = $this->db()->query($sql);
        if ($results){
            $person = $results->fetch_assoc();
            unset($person['password']);
            $this->sendResponse($person);
        }else{
            $this->sendResponse("Failed incorrect details",false);
        }

    }
    /*
     * Creates a user
     */
    private function create(){

        $columns = implode(",",array_keys($this->post));
        //$escaped_values =  array_map(array($this, "mysqli->real_escape_string"), array_values($_POST));
        $values  = "'".implode("','", array_values($this->post))."'";
        $sql = "INSERT INTO myvote.realme ($columns) VALUES ($values);";

        $result = $this->db()->query($sql);
        if ($result){
            $id = $this->db()->insert_id;
            $username = substr($this->post['name'], 0, 3) . substr($this->post['dob'], 0, 2).$id;
            $password = substr($this->post['email'], 0, 3) . substr($this->post['phone'], 0, 3);
            $SQL = "UPDATE myvote.realme SET username = '$username' , password = '$password' WHERE account_id = '$id'";
            $result =  $this->db()->query($SQL);
            //sms code/username : 3 first name 2 of dob
            $name = $this->post['name'];
            $mobile = $this->post['phone'];
            $message = "Hello $name your realMe login details\nUsername : $username \nPassword : $password";
            //$id
            $this->sendSms($message,$mobile);
            $this->sendResponse("success");
            //echo json_encode("success");

        }else{
            $this->sendResponse("Failed to create check field inputs",false);
        }


    }
    private function sendSms($message,$number){
        $url = "http://home.lukes-server.com/sms/?api_key=a1O3k07N21&text=".urlencode($message)."&dest=$number";
        file_get_contents($url);
    }
    //make a call to db
    private function db(){
        //singleton
        if ($this->db_connect == null)
            $this->db_connect = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);

        return $this->db_connect;
    }
    //returns the call from get
    private function getCall(){
        $keys = array_keys($this->get);
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

//actons to our api create
$realMe = new realme_api(array("create","login"));
$realMe->run();



