<?php
include_once ("../Utils/SessionManagementUtils.php");
checkSession('editCampaignSectionHandler');
include_once("../Utils/Dao.php");
include_once("../Objects/CampaignSection.php");

if(isset($_POST['sectionId']) && $_POST['sectionId'] != 0){
    $dao = new Dao();
    $singleSectionId = $_POST['sectionId'];
    $section = $dao->getSection($singleSectionId);
    $locationIdArray = $dao->getSectionLocationIds($singleSectionId);
    addSection($section, $locationIdArray);
    //echo "<br><br>". print_r($_SESSION, 1);
}
header("Location:../forms/createCampaignSection.php");