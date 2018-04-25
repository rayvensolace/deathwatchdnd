<?php
$thisPage = "campaignForm";
include_once("../lib/pageHeader.php");
include_once("../lib/list.php");
include_once("../Utils/Dao.php");

echo   "<div class = 'formBackground'><h1 class='formHeader'>Create a Campaign Section</h1>

        <form class='thinForm' action='createCampaignSectionHandler.php' id='campaignForm' method='post'>
        <div><input type='hidden' name='sectionId' value='". getIfContains('prevValues', 'sectionId', 0) ."'></div>        
        <div>Name of Section: <input type='text' name='sectionName' value='". getIfContains('prevValues', 'sectionName', '') ."'>
        <span class = 'formNotes'>".getIfContains('errorMessages', 'sectionName', "*Required: must be unique")."</span></div>
        <div>Type in what you want to know for this section:<p></p><textarea name='sectionNotes' rows='30' cols='100' form='campaignForm'>". htmlspecialchars(getIfContains('prevValues', 'sectionNotes', "")) ."</textarea>
        </div>
        <div class=''>What locations are there in this section:";
$dao = new Dao();
$locationList = $dao->getLocations();
$nameList = array();
$idList = array();
$index = 0;
foreach($locationList as $location){
    $id = $location->locationId;
    $name = $location->locationName;
    $nameList[$index] = $name;
    $idList[$index] = $id;
    $index = $index + 1;
}
createNamedCheckboxList($nameList, $idList, "locationId", getIfContains('prevValues','locationsArray',array()));
 echo"       </div>
        <div><input type='submit' value='Submit'></div>
     </form>
     </div>
</body>
    <footer class='footer widthDiv'>
        <div class='inlineContainer'></div>
        <div class='centerDiv'>
                You are filling out a form
        </div>
        <div class='inlineContainer'></div></footer>
</html>";

unset($_SESSION['errorMessages']);
unset($_SESSION['prevValues']);