<?php
include_once("../Objects/Nerd.php");
include_once("../Objects/Enemy.php");
include_once("../Objects/Location.php");
include_once("../Objects/CampaignSection.php");
include_once("../Utils/EnemyBuilder.php");

class Dao
{


    private $host = "localhost";
    private $db = "deathwatchdnd";
    private $user = "root";
    private $pass = "Hope2015";

//    private $host = "us-cdbr-iron-east-05.cleardb.net";
//    private $db = "heroku_1b423bac23d8d42";
//    private $user = "b582fc1a10d3d8";
//    private $pass = "98831eb9";

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
            $connection = new PDO("mysql:host={$this->host}; port=3306 ;dbname={$this->db}", $this->user, $this->pass,
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
    function checkUserAvailability($username)
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
     * @param $enemyname
     * @return bool
     */
    function checkEnemyAvailability($enemyname)
    {
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();
        //echo $username;
            $query = $connection->prepare("Select enemyId FROM enemies WHERE enemyName = :enemyName and creatorsId = :creatorsId");
            $query->bindParam(':enemyName', $enemyname);
            $query->bindParam(':creatorsId', $nerdID);
            $results = null;
            try {
                $query->execute();
                $results = $query->fetchAll();
            } catch (Exception $exception) {
                print($exception->getMessage());
            }
            if (empty($results)) {
                return true;
            } else {
                return false;
            }

    }

    function checkValidEnemy($enemyname, $id){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();
        $query = $connection->prepare("Select enemyId FROM enemies WHERE enemyId = :enemyId  and creatorsId = :creatorsId");
        $query->bindParam(':enemyId', $id);
        $query->bindParam(':creatorsId', $nerdID);
        $results = null;
        try {
            $query->execute();
            $results = $query->fetchAll();
        } catch (Exception $exception) {
            print($exception->getMessage());
        }
        if (empty($results)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $enemy
     */
    function addEnemy($enemy){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();
        //echo $username;
        $query = $connection->prepare("Insert INTO enemies 
                                (creatorsId, enemyName, challengeRating,hp, attack,armorClass,size,enemyType,initiative,strength,dexterity,constitution,intelligence,wisdom,charisma,fortitude,reflex,will,skillsArray,weaponsMap,itemsMap,spellsMap,abilitiesMap,notes,enemyImage) 
                                VALUES (:creatorsId, :enemyName, :challengeRating,:hp, :attack,:armorClass,:size,:enemyType,:initiative,:strength,:dexterity,:constitution,:intelligence,:wisdom,:charisma,:fortitude,:reflex,:will,:skillsArray,:weaponsMap,:itemsMap,:spellsMap,:abilitiesMap,:notes,:enemyImage)");
        $query->bindParam(':creatorsId', $nerdID);
        $query->bindParam(':enemyName', $enemy->name);
        $baseStatsArray = $enemy->baseStatsArray;// :challengeRating, :attack,:armorClass,:size,:enemyType,:initiative
        $query->bindParam(':hp', $baseStatsArray['hp']);
        $query->bindParam(':challengeRating', $baseStatsArray['challengeRating']);
        $query->bindParam(':attack', $baseStatsArray['attack']);
        $query->bindParam(':armorClass', $baseStatsArray['armorClass']);
        $query->bindParam(':enemyType', $baseStatsArray['enemyType']);
        $query->bindParam(':size', $baseStatsArray['size']);
        $query->bindParam(':initiative', $baseStatsArray['initiative']);
        $attributesArray = $enemy->attributesArray;//:strength,:dexterity,:constitution,:intelligence,:wisdom,:charisma
        $query->bindParam(':strength', $attributesArray['strength']);
        $query->bindParam(':dexterity', $attributesArray['dexterity']);
        $query->bindParam(':constitution', $attributesArray['constitution']);
        $query->bindParam(':intelligence', $attributesArray['intelligence']);
        $query->bindParam(':wisdom', $attributesArray['wisdom']);
        $query->bindParam(':charisma', $attributesArray['charisma']);
        $savesArray = $enemy->savesArray;//:fortitude,:reflex,:will
        $query->bindParam(':fortitude', $savesArray['fortitude']);
        $query->bindParam(':reflex', $savesArray['reflex']);
        $query->bindParam(':will', $savesArray['will']);
        //:skillsArray,:weaponsMap,:itemsMap,:spellsMap,:abilitiesMap,:notes,:enemyImage
        $skillsArray = serialize($enemy->skillsArray);
        $query->bindParam(':skillsArray',$skillsArray);

        if(isset($enemy->weaponsMap)) {
            $weaponsMap = serialize($enemy->weaponsMap);
        }else{
            $weaponsMap = null;
        }
        $query->bindParam(':weaponsMap', $weaponsMap);

        $itemsMap = serialize($enemy->itemsMap);
        $query->bindParam(':itemsMap',$itemsMap);

        $abilitiesMap =  serialize($enemy->abilitiesMap);
        $query->bindParam(':abilitiesMap',$abilitiesMap);

        $spellsMap = serialize($enemy->spellsMap);
        $query->bindParam(':spellsMap',$spellsMap);

        if(isset($enemy->notes)) {
            $notes = $enemy->notes;
        }else{
            $notes = null;
        }
        $query->bindParam(':notes',$notes);

        $image = $enemy->image;
        $query->bindParam(':enemyImage',$image);

        $results = null;
        try {
            $query->execute();

        }catch(Exception $exception){
            print($exception->getMessage());
        }
        echo "<br><br> ADDED ENEMY<br>";
    }

    /**
     * @param $enemy
     */
    function updateEnemy($enemy){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();

        $enemyId = $enemy->id;

        //echo $username;
        $query = $connection->prepare("Update enemies SET 
                                creatorsId = :creatorsId, 
                                enemyName = :enemyName, 
                                challengeRating = :challengeRating,
                                hp = :hp, 
                                attack = :attack,
                                armorClass = :armorClass,
                                size = :size,
                                enemyType = :enemyType,
                                initiative = :initiative,
                                strength = :strength,
                                dexterity = :dexterity,
                                constitution = :constitution ,
                                intelligence = :intelligence,
                                wisdom = :wisdom,
                                charisma = :charisma,
                                fortitude = :fortitude,
                                reflex = :reflex,
                                will = :will,
                                skillsArray = :skillsArray,
                                weaponsMap = :weaponsMap,
                                itemsMap = :itemsMap,
                                spellsMap = :spellsMap,
                                abilitiesMap = :abilitiesMap,
                                notes = :notes,
                                enemyImage = :enemyImage
                                WHERE enemyId = :enemyId");
        $query->bindParam(':enemyId', $enemyId);
        $query->bindParam(':creatorsId', $nerdID);
        $query->bindParam(':enemyName', $enemy->name);
        $baseStatsArray = $enemy->baseStatsArray;// :challengeRating, :attack,:armorClass,:size,:enemyType,:initiative
        $query->bindParam(':hp', $enemy->hp);
        $query->bindParam(':challengeRating', $baseStatsArray['challengeRating']);
        $query->bindParam(':attack', $baseStatsArray['attack']);
        $query->bindParam(':armorClass', $baseStatsArray['armorClass']);
        $query->bindParam(':enemyType', $baseStatsArray['enemyType']);
        $query->bindParam(':size', $baseStatsArray['size']);
        $query->bindParam(':initiative', $baseStatsArray['initiative']);
        $attributesArray = $enemy->attributesArray;//:strength,:dexterity,:constitution,:intelligence,:wisdom,:charisma
        $query->bindParam(':strength', $attributesArray['strength']);
        $query->bindParam(':dexterity', $attributesArray['dexterity']);
        $query->bindParam(':constitution', $attributesArray['constitution']);
        $query->bindParam(':intelligence', $attributesArray['intelligence']);
        $query->bindParam(':wisdom', $attributesArray['wisdom']);
        $query->bindParam(':charisma', $attributesArray['charisma']);
        $savesArray = $enemy->savesArray;//:fortitude,:reflex,:will
        $query->bindParam(':fortitude', $savesArray['fortitude']);
        $query->bindParam(':reflex', $savesArray['reflex']);
        $query->bindParam(':will', $savesArray['will']);
        //:skillsArray,:weaponsMap,:itemsMap,:spellsMap,:abilitiesMap,:notes,:enemyImage
        $skillsArray = serialize($enemy->skillsArray);
        $query->bindParam(':skillsArray',$skillsArray);

        if(isset($enemy->weaponsMap)) {
            $weaponsMap = serialize($enemy->weaponsMap);
        }else{
            $weaponsMap = null;
        }
        $query->bindParam(':weaponsMap', $weaponsMap);

        $itemsMap = serialize($enemy->itemsMap);
        $query->bindParam(':itemsMap',$itemsMap);

        $abilitiesMap =  serialize($enemy->abilitiesMap);
        $query->bindParam(':abilitiesMap',$abilitiesMap);

        $spellsMap = serialize($enemy->spellsMap);
        $query->bindParam(':spellsMap',$spellsMap);

        if(isset($enemy->notes)) {
            $notes = $enemy->notes;
        }else{
            $notes = null;
        }
        $query->bindParam(':notes',$notes);

        $image = $enemy->image;
        $query->bindParam(':enemyImage',$image);

        $results = null;
        try {
            $query->execute();

        }catch(Exception $exception){
            print($exception->getMessage());
        }
        echo "<br><br> UPDATED ENEMY<br>";
    }

    function getEnemies(){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();
        $query = $connection->prepare("Select 
                                enemyId,creatorsId, enemyName, challengeRating,hp, attack,armorClass,size,enemyType,initiative,strength,dexterity,constitution,intelligence,wisdom,charisma,fortitude,reflex,will,skillsArray,weaponsMap,itemsMap,spellsMap,abilitiesMap,notes,enemyImage 
                                FROM enemies where creatorsId = :creatorsId");
        $query->bindParam(':creatorsId',$nerdID);
        $query->execute();
        $results = $query->fetchAll();
        $enemies = array();
        foreach($results as $rs){
            $enemy = createEnemyFromDatabaseRow($rs);
            array_push($enemies,$enemy);
        }
        return $enemies;
    }

    function getSpecificEnemies($enemyIdArray){
        $enemyListString = '0';
        foreach($enemyIdArray as $enemyId){
            $enemyListString = $enemyListString.",".$enemyId;
        }
        echo "ENEMY LIST TO PULL FROM DB " . $enemyListString. "<br>";
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();
        $query = $connection->prepare("Select 
                                enemyId,creatorsId, enemyName, challengeRating, attack,armorClass,size,enemyType,initiative,strength,dexterity,constitution,intelligence,wisdom,charisma,fortitude,reflex,will,skillsArray,weaponsMap,itemsMap,spellsMap,abilitiesMap,notes,enemyImage 
                                FROM enemies WHERE creatorsId = :creatorsId AND enemyId IN (:enemyListString)");
        $query->bindParam(':creatorsId',$nerdID);
        $query->bindParam(":enemyListString", $enemyListString);
        $query->execute();
        $results = $query->fetchAll();
        echo "Enemy Array Results " . print_r($results, 1). "<br>";
        $enemies = array();
        foreach($results as $rs){
            $enemy = createEnemyFromDatabaseRow($rs);
            array_push($enemies,$enemy);
        }
        echo "Enemy Array Objects " . print_r($enemies,1). "<br>";
        return $enemies;
    }

    function getEnemy($enemyId){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();
        $query = $connection->prepare("Select 
                                enemyId,creatorsId, enemyName, challengeRating, attack,armorClass,size,enemyType,initiative,strength,dexterity,constitution,intelligence,wisdom,charisma,fortitude,reflex,will,skillsArray,weaponsMap,itemsMap,spellsMap,abilitiesMap,notes,enemyImage 
                                FROM enemies WHERE creatorsId = :creatorsId AND enemyId = :enemyId");
        $query->bindParam(':creatorsId',$nerdID);
        $query->bindParam(":enemyId", $enemyId);
        $query->execute();
        $results = $query->fetch();
        echo "Enemy Array Results " . print_r($results, 1). "<br>";
        $enemy = createEnemyFromDatabaseRow($results);
        echo "Enemy Array Objects " . print_r($enemies,1). "<br>";
        return $enemy;
    }

    function checkCampaignSectionAvailability($sectionName){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();
        //echo $username;
        $query = $connection->prepare("Select sectionId FROM sections WHERE sectionName = :sectionName and creatorsId = :creatorsId");
        $query->bindParam(':sectionName', $sectionName);
        $query->bindParam(':creatorsId', $nerdID);
        $results = null;
        try {
            $query->execute();
            $results = $query->fetchAll();
        }catch(Exception $exception){
            print($exception->getMessage());
        }
        if (empty($results)) {
            return true;
        }else{
            return false;
        }
    }

    function addCampaignSection($sectionName, $sectionNotes, $locationArray){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();

        echo $sectionName . " " . $sectionNotes . " " . print_r($locationArray);

        $query = $connection->prepare("Insert Into sections (creatorsId, sectionName, sectionNotes, sectionImage) VALUES (:creatorsId, :sectionName, :sectionNotes ,:sectionImage ) ");
        $query->bindParam(':creatorsId' , $nerdID );
        $query->bindParam(':sectionName' , $sectionName );
        $query->bindParam(':sectionNotes' , $sectionNotes );
        $image = null;
        $query->bindParam(':sectionImage', $image);
        $query->execute();

        $connection2 = $this->getConnection();
        $query2 = $connection2->prepare("Select sectionId FROM sections WHERE sectionName = :sectionName and creatorsId = :creatorsId");
        $query2->bindParam(':sectionName', $sectionName);
        $query2->bindParam(':creatorsId', $nerdID);
        $locationId = null;
        try {
            $query2->execute();
            $results = $query2->fetchAll();
            $sectionId = array_pop($results)['sectionId'];
        }catch(Exception $exception){
            print($exception->getMessage());
        }

        foreach($locationArray as $id){
            $connection3 = $this->getConnection();
            $query3 = $connection3->prepare("Insert Into sectionLocals (sectionId, locationId) VALUES (:sectionId, :locationId) ");
            $query3->bindParam(':sectionId' , $sectionId );
            $query3->bindParam(':locationId' , $id );
            $query3->execute();
        }
    }

    function updateCampaignSection($sectionId, $sectionName, $sectionNotes, $locationArray){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();

        echo $sectionName . " " . $sectionNotes . " " . print_r($locationArray);

        $query = $connection->prepare("UPDATE sections SET sectionName = :sectionName, sectionNotes = :sectionNotes, sectionImage = :sectionImage WHERE sectionId = :sectionId AND creatorsId = :creatorsId  ) ");
        $query->bindParam(':sectionId' , $sectionId );
        $query->bindParam(':creatorsId' , $nerdID );
        $query->bindParam(':sectionName' , $sectionName );
        $query->bindParam(':sectionNotes' , $sectionNotes );
        $image = null;
        $query->bindParam(':sectionImage', $image);
        $query->execute();

        $queryClean = $connection->prepare("Delete From sectionLocals WHERE sectionId = :sectionId");
        $queryClean->bindParam(':sectionId', $sectionId);
        $queryClean->execute();

        foreach($locationArray as $id){
            $query = $connection->prepare("Insert Into sectionLocals (sectionId, enemyId) VALUES (:sectionId, :enemyId) ");
            $query->bindParam(':sectionId' , $sectionId );
            $query->bindParam(':enemyId' , $id );
            $query->execute();
        }
    }

    function getSections(){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();

        $query = $connection->prepare("SELECT sectionId, creatorsId, sectionName, sectionNotes, sectionImage FROM sections WHERE creatorsId = :creatorsId   ");
        $query->bindParam(':creatorsId' , $nerdID );

        $results = null;
        try {
            $query->execute();
            $results = $query->fetchAll();
        }catch(Exception $exception){
            print($exception->getMessage());
        }

        $sectionArray = array();
        foreach($results as $row){
            //echo "<br>".print_r($row,1)."<br>";
            $section = new CampaignSection($row['sectionId'],null, $row['sectionName'], $row['sectionNotes']);
            array_push($sectionArray, $section);
        }
        return $sectionArray;
    }

    function checkLocationAvailability($locationName){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();
        //echo $username;
        $query = $connection->prepare("Select locationId FROM locations WHERE locationName = :locationName and creatorsId = :creatorsId");
        $query->bindParam(':locationName', $locationName);
        $query->bindParam(':creatorsId', $nerdID);
        $results = null;
        try {
            $query->execute();
            $results = $query->fetchAll();
        }catch(Exception $exception){
            print($exception->getMessage());
        }
        if (empty($results)) {
            return true;
        }else{
            return false;
        }
    }

    /**
     *
     */
        function addLocation($locationName, $locationNotes, $enemiesArray){
            $nerd = unserialize(getIfContains("NERD"));
            $connection = $this->getConnection();
            $nerdID = $nerd->getId();

            echo $locationName . " " . $locationNotes . " " . print_r($enemiesArray);

            $query = $connection->prepare("Insert Into locations (creatorsId, locationName, locationNotes, locationImage) VALUES (:creatorsId, :locationName, :locationNotes ,:locationImage ) ");
            $query->bindParam(':creatorsId' , $nerdID );
            $query->bindParam(':locationName' , $locationName );
            $query->bindParam(':locationNotes' , $locationNotes );
            $image = null;
            $query->bindParam(':locationImage', $image);
            $query->execute();

            $connection2 = $this->getConnection();
            $query2 = $connection2->prepare("Select locationId FROM locations WHERE locationName = :locationName and creatorsId = :creatorsId");
            $query2->bindParam(':locationName', $locationName);
            $query2->bindParam(':creatorsId', $nerdID);
            $locationId = null;
            try {
                $query2->execute();
                $results = $query2->fetchAll();
                $locationId = array_pop($results)['locationId'];
            }catch(Exception $exception){
                print($exception->getMessage());
            }

            foreach($enemiesArray as $id){
                $connection3 = $this->getConnection();
                $query3 = $connection3->prepare("Insert Into enemyLocals (locationId, enemyId) VALUES (:locationId, :enemyId) ");
                $query3->bindParam(':locationId' , $locationId );
                $query3->bindParam(':enemyId' , $id );
                $query3->execute();
            }
        }

    /**
     *
     */
    function updateLocation($locationId, $locationName, $locationNotes, $enemiesArray){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();

        $query = $connection->prepare("UPDATE locations SET locationName = :locationName, locationNotes = :locationNotes, locationImage = :locationImage WHERE locationId = :locationId AND creatorsId = :creatorsId  ) ");
        $query->bindParam(':locationId' , $locationId );
        $query->bindParam(':creatorsId' , $nerdID );
        $query->bindParam(':locationName' , $locationName );
        $query->bindParam(':locationNotes' , $locationNotes );
        $image = null;
        $query->bindParam(':locationImage', $image);
        $query->execute();

        $queryClean = $connection->prepare("Delete From enemyLocals WHERE locationId = :locationId");
        $queryClean->bindParam(':locationId', $locationId);
        $queryClean->execute();

        foreach($enemiesArray as $id){
            $query = $connection->prepare("Insert Into enemyLocals (locationId, enemyId) VALUES (:locationId, :enemyId) ");
            $query->bindParam(':locationId' , $locationId );
            $query->bindParam(':enemyId' , $id );
            $query->execute();
        }
    }

    function getLocations(){
        $nerd = unserialize(getIfContains("NERD"));
        $connection = $this->getConnection();
        $nerdID = $nerd->getId();

        $query = $connection->prepare("SELECT locationId, creatorsId, locationName, locationNotes, locationImage FROM locations WHERE creatorsId = :creatorsId   ");
        $query->bindParam(':creatorsId' , $nerdID );

        $results = null;
        try {
            $query->execute();
            $results = $query->fetchAll();
        }catch(Exception $exception){
            print($exception->getMessage());
        }

        $locationArray = array();
        foreach($results as $row){
            $location = new Location($row['locationId'], $row['locationName'], $row['locationNotes']);
            array_push($locationArray, $location);
        }
        return $locationArray;
    }



}