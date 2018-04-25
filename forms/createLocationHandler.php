<?php
include_once ("../Utils/SessionManagementUtils.php");
include_once("../Utils/Validators.php");
include_once("../Utils/Dao.php");
include_once("../Utils/EnemyBuilder.php");
checkSession("createCreatureHandler");
$dao = new Dao();

//echo print_r($_POST,1);
$errors = array();

if(!isset($_POST["locationName"]) || empty(trim($_POST["locationName"]))){
    $errors["locationName"] = "Must enter a unique name";
}else{
    $locationName = $_POST["locationName"];
    $locationId = $_POST["locationId"];
    if($locationId == 0){
        if (!$dao->checkLocationAvailability($locationName)) {
            $errors["locationName"] = "There already exists a location with that name";
        }
    }
}

$enemiesIdArray = array();
foreach($_POST as $name => $id){
    if(strpos($name, 'enemyId') !== false){
        array_push($enemiesIdArray,$id );
    }
}

if(empty($errors)) {

    if ($_POST['locationId'] == 0) {
       $dao->addLocation($locationName, $_POST['notes'], $enemiesIdArray );
        echo 'adding location';
    }else{
        $dao->updateLocation( $_POST['locationId'], $_POST["locationName"], $_POST['notes'], $enemiesIdArray);
        echo 'updating location';
    }
    header("Location:../content/Campaigns.php");
}else {
    echo 'returning to create';
    $location = new Location($_POST['locationId'],$_POST['locationName'],$_POST['notes']);
    addLocation($location, $enemiesIdArray);
    $_SESSION["errorMessages"] = $errors;
    header("Location:../forms/createLocation.php");
}




