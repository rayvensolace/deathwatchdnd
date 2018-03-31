<?php
include_once("../Objects/Nerd.php");

class Dao
{


//    private $host = "localhost";
//    private $db = "deathwatchdnd";
//    private $user = "root";
//    private $pass = "Hope2015";

    private $host = "us-cdbr-iron-east-05.cleardb.net";
    private $db = "heroku_1b423bac23d8d42";
    private $user = "b582fc1a10d3d8";
    private $pass = "98831eb9";

    protected $logger;

    /**
     *
     */
    function __const(){
        $this->logger = new KLogger();
    }

    /**
     * @return PDO
     */
    function getConnection(){
        try{
            //Heroku info mysql://b582fc1a10d3d8:98831eb9@us-cdbr-iron-east-05.cleardb.net/heroku_1b423bac23d8d42?reconnect=true
            //$connection = new PDO("mysql:host={us-cdbr-iron-east-05.cleardb.net} ; dbname={heroku_1b423bac23d8d42}", "b582fc1a10d3d8", "98831eb9");
            //$connection = new PDO("mysql:host=127.0.0.1; dbname='deathwatchdnd'", 'root', 'Hope2015');
            //$connection = new PDO("mysql:host={$this->host}; port=3306 ;dbname={$this->db}", $this->user, $this->pass,
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            return $connection;
        }catch(Exception $exception){
            //echo "<br> connection failed <br>";
            //print($exception->getMessage());
            //echo "<br> connection failed <br>";
        }
    }

    /**
     * @param $username
     * @return bool
     */
    function checkAvailability($username)
    {
        $connection = $this->getConnection();
        //echo $username;
        $query = $connection->prepare("Select characterId FROM NERDS WHERE characterName = :user");
        $query->bindParam(':user', $username);
        $results = null;
        try {
            //echo print_r($query, 1) . "<br>";
            $query->execute();
            $results = $query->fetchAll();
            //echo "finished checkAvailability";
        }catch(Exception $exception){
            //echo "<br> connection failed <br>";
            print($exception->getMessage());
            //echo "<br> connection failed <br>";
        }
        if (empty($results)) {
            //echo "<br>Nothing returned from check for user<br>";
            //echo print_r($results, 1) . "<br />";
            return true;
        }else{
            //echo "<br>Something was returned from check for user<br>";
            //echo "<br>" . print_r($results, 1) . "<br>";
            return false;
        }
    }

    /**
     * @param $username
     * @param $password
     * @param $email
     * @throws Exception
     */
    function addNerd($username, $password, $email){
        $connection = $this->getConnection();
        $dmLevel = 7;
        $demo = 1;
        $password = setPasswordHash($password);
        $query = $connection->prepare("Insert Into NERDS (characterName, secretCode, DmLevel, mail, demo) VALUES (:user, :password, :dmLevel ,:mail, :demo ) ");
        $query->bindParam(':user' , $username );
        $query->bindParam(':password' , $password );
        $query->bindParam(':dmLevel' , $dmLevel );
        $query->bindParam(':mail', $email);
        $query->bindParam(':demo' , $demo );
        //echo print_r($query, 1) . "<br>";

        try {
            $rs = $query->execute();
            //echo "<br> no error to add nerd <br>";
            //echo print_r($rs, 1);
        }catch (Exception $e){
            //echo "<br> insert failed <br>";
            //print($e->getMessage());
            //echo $e->getTraceAsString();
            //echo "<br> insert failed <br>";
            throw $e;
        }
    }

    /**
     * @param $username
     * @param $password
     * @param $email
     * @param $getDemo
     * @throws Exception
     */
    function updateNerd($username, $password, $email,$level, $getDemo, $userId){
        $connection = $this->getConnection();
        $dmLevel = $level;
        $demo = $getDemo;
        $password = setPasswordHash($password);
        $query = $connection->prepare("Update NERDS SET characterName = :user, secretCode =:password , DmLevel=:dmLevel, mail=:mail, demo=:demo WHERE characterId= :id");
        $query->bindParam(':user' , $username );
        $query->bindParam(':password' , $password );
        $query->bindParam(':dmLevel' , $dmLevel );
        $query->bindParam(':mail', $email);
        $query->bindParam(':demo' , $demo );
        $query->bindParam(":id", $userId);
        //echo print_r($query, 1) . "<br>";

        try {
            $rs = $query->execute();
            //echo "<br> no error to add nerd <br>";
            //echo print_r($rs, 1);
        }catch (Exception $e){
            //echo "<br> insert failed <br>";
            print($e->getMessage());
            //echo $e->getTraceAsString();
            //echo "<br> insert failed <br>";
            throw $e;
        }
    }

    /**
     * @param $username
     * @return mixed
     */
    function checkNerd($username){
        $connection = $this->getConnection();
        $query = $connection->prepare("Select * FROM NERDS WHERE characterName = :user");
        $query->bindParam(":user" , $username );
        $query->execute();
        $rs = $query->fetch();
        //echo "<br> checking Nerd <br>";
        //echo print_r( $rs, 1);
        //echo "<br> checking Nerd <br>";

        return $rs["secretCode"];
    }

    /**
     * @param $username
     * @return Nerd
     */
    function getNerd($username){
        $connection = $this->getConnection();
        $query = $connection->prepare("Select * FROM NERDS WHERE characterName = :user");
        $query->bindParam(":user" , $username );
        $query->execute();
        $rs = $query->fetch();
        //echo "<br> returning Nerd <br>";
        //echo print_r( $rs, 1);
        //echo "<br> returning Nerd <br>";
        $nerd = new Nerd($rs["characterName"], $rs["mail"], $rs["DMLevel"] , $rs["characterId"], $rs["demo"]);
        //echo serialize($nerd);
        return $nerd;
    }

    /**
     *
     */
    function addEnemy(){

    }

    /**
     *
     */
    function addCampaign(){

    }

    /**
     *
     */
    function addLocation(){

    }
}