<?php
include_once ("../Utils/SessionManagementUtils.php");
include_once("../Utils/Validators.php");
include_once("../Utils/Dao.php");
include_once("../Utils/EnemyBuilder.php");
checkSession("createCreatureHandler");
$dao = new Dao();

echo print_r($_POST,1);
$errors = array();

if(!isset($_POST["locationName"]) || empty(trim($_POST["locationName"]))){
    $errors["locationName"] = "Must enter a unique name";
}else{
    $locationName = $_POST["locationName"];
    if(! $dao->checkLocationAvailability($locationName)){
        $errors["locationName"] = "There already exists a location with that name";
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
        $dao->updateLocation($_POST['locationId'], $name, $_POST['notes'], $enemiesArray);
        echo 'updating location';
    }
    header("Location:../content/Campaigns.php");
}else {
    $prevValues = array();
    echo 'returning to create';
    $prevValues['notes'] = $_POST['notes'];
    $prevValues['locationName'] = $_POST['locationName'];
    $prevValues['locationId'] = $_POST['locationId'];
    $prevEnemies = array();
    foreach($enemiesIdArray as $id){
        $name = "enemyId".$id;
        $prevEnemies[$name] = $id;
    }
    $prevValues['enemiesArray'] = $prevEnemies;
    $_SESSION['prevValues'] = $prevValues;
    $_SESSION["errorMessages"] = $errors;
    header("Location:../forms/createLocation.php");
}




