<?php
include_once ("../Utils/SessionManagementUtils.php");
checkSession('editLocationHandler');
include_once("../Utils/Dao.php");
include_once("../Objects/Location.php");

if(isset($_POST['locationId']) && $_POST['locationId'] != 0){
    $dao = new Dao();
    $singleLocationId = $_POST['locationId'];
    $location = $dao->getLocation($singleLocationId);
    $enemiesIdArray = $dao->getLocationEnemiesIds($singleLocationId);
    addLocation($location, $enemiesIdArray);
    //echo "<br><br>". print_r($_SESSION, 1);
}
header("Location:../forms/createLocation.php");