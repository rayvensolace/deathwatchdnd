<?php

include_once ("../Utils/SessionManagementUtils.php");
include_once("../Utils/Validators.php");
include_once("../Utils/Dao.php");
include_once("../Utils/EnemyBuilder.php");
checkSession("createCreatureHandler");
$dao = new Dao();

//echo print_r($_POST,1);
$errors = array();

if(!isset($_POST["sectionName"]) || empty(trim($_POST["sectionName"]))){
    $errors["sectionName"] = "Must enter a unique name";
}else{
    $sectionName = $_POST["sectionName"];
    if(! $dao->checkcampaignSectionAvailability($sectionName)){
        echo print("<br>This section already exists<br>");
        $errors["sectionName"] = "There already exists a campaignSection with that name";
    }
}

$locationIdArray = array();
foreach($_POST as $name => $id){
    if(strpos($name, 'locationId') !== false){
        array_push($locationIdArray,$id );
    }
}

if(empty($errors)) {
    if ($_POST['sectionId'] == 0) {
        $dao->addCampaignSection($sectionName, $_POST['sectionNotes'], $locationIdArray );
        echo 'adding campaignSection';
    }else{
        $dao->updateCampaignSection($_POST['sectionId'], $name, $_POST['sectionNotes'], $locationIdArray);
        echo 'updating campaignSection';
    }
    header("Location:../content/Campaigns.php");
}else {
    echo print("Attempting to return to form after setting session variables");
    $section = new CampaignSection($_POST['sectionId'],null, $_POST['sectionName'], $_POST['sectionNotes']);
    //echo "<br>Section: " . print_r($section,1)." Location Array:". print_r($locationIdArray, 1) . "<br>";
    addSection($section, $locationIdArray);
    //echo "<br>returning session: " . print_r($_SESSION,1). "<br>";
    $_SESSION["errorMessages"] = $errors;
    header("Location:../forms/createCampaignSection.php");
}