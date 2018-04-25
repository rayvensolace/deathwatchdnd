<?php
session_start();
include_once("../Objects/Nerd.php");
include_once("../Objects/Location.php");
include_once("../Objects/CampaignSection.php");
include_once("../Objects/Campaign.php");
//print_r(isset($_COOKIE) ? isset($_COOKIE["validation"])? $_COOKIE["validation"]: "There is no validation in Cookie <br>" : "There is no Cookie <br><br>");


/**
 * @param $thisPage
 * @return bool
 */
function checkSession($thisPage){
    //echo $thisPage;
    if( $thisPage == "Landing" || $thisPage == "loginForm"){
        return true;
        die;
    }else if(isset($_SESSION["NERD"])) {

        //echo "Logged on for Nerd <br>";
        //echo print_r($_SESSION["NERD"],1);
        //echo "<br>". print_r($_COOKIE,1 );
        $nerd = unserialize($_SESSION['NERD']);
        if (isset($_COOKIE['validation']) && $nerd->validateCookie($_COOKIE['validation'])) {
            return true;
        }else {
            $_SESSION["RETURN"] = $_GET;
            $_SESSION["MESSAGE"] = "Your token has expired. Please re-login to vew that page";
        }
    }else {
        $_SESSION["RETURN"] = $_GET;
        $_SESSION["MESSAGE"] = "Please login to vew that page";
    }
        echo "Returning to login";
        header("Location: ../forms/login.php");
}

/**
 * @param $indexToAddAt
 * @param $dataToAdd
 */
function addValueToSession($indexToAddAt, $dataToAdd){
    $_SESSION[$indexToAddAt] = $dataToAdd;
}

/**
 * @return bool
 */
function sessionAvail(){
    return isset($_SESSION);
}

/**
 * @param $index
 * @return bool
 */
function sessionContains($index){
    return isset($_SESSION[$index]);
}

/**
 * @param $indexInSession
 * @param $indexInIndex
 * @return bool
 */
function sessionContainsSubIndex($indexInSession, $indexInIndex){
    return isset($_SESSION[$indexInSession]) && isset($_SESSION[$indexInSession][$indexInIndex]);
}

/**
 * @param $indexInSession
 * @param null $indexInIndex
 * @param null $default
 * @return null
 */
function getIfContains($indexInSession, $indexInIndex = null, $default = null){
    //echo 'Checking for session variable '. $indexInSession . ' and index in that variable ' . $indexInIndex . ' ';
    //echo '<br>' . print_r($_SESSION, 1);
    if(is_null($indexInIndex)){
       if(sessionContains($indexInSession)) {
            return  $_SESSION[$indexInSession];
       }else {
           return is_null($default) ? null : $default;
       }
    }else{
        if(sessionContainsSubIndex($indexInSession, $indexInIndex)) {
            //echo '<br>index in index is ' .   $_SESSION[$indexInSession][$indexInIndex];
            return  $_SESSION[$indexInSession][$indexInIndex];
        }else {
            return is_null($default) ? null : $default;
        }
    }
}

function addLocation($location, $enemiesIdArray){
    $prevValues = array();
    $prevValues['locationNotes'] = $location->locationNotes;
    $prevValues['locationName'] = $location->locationName;
    $prevValues['locationId'] = $location->locationId;
    $prevEnemies = array();
    foreach($enemiesIdArray as $id){
        $name = "enemyId".$id;
        $prevEnemies[$name] = $id;
    }
    $prevValues['enemiesArray'] = $prevEnemies;
    $_SESSION['prevValues'] = $prevValues;
    return $prevValues;
}

function addSection($campaignSection, $locationIdArray){
    $prevValues['sectionId'] = $campaignSection->sectionId;
    $prevValues['parentCampaign'] = $campaignSection->parentCampaign;
    $prevValues['sectionName'] = $campaignSection->sectionName;
    $prevValues['sectionNotes'] = $campaignSection->sectionNotes;
    $prevLocations = array();
    foreach($locationIdArray as $id){
        $name = "locationId".$id;
        $prevLocations[$name] = $id;
    }
    $prevValues['locationsArray'] = $prevLocations;
    $_SESSION['prevValues'] = $prevValues;
    return $prevValues;
}

function addCampaign($campaign){

}

/**
 *
 */
function restartFreshSession(){
    session_regenerate_id();
    session_destroy();
    session_start();
}