<?php
include_once("../Utils/SessionManagementUtils.php");
$thisPage = "campaignForm";
include_once("../lib/pageHeader.php");
include_once("../lib/list.php");
include_once("../Utils/Dao.php");

echo print_r($_SESSION,1);
echo   "<div class = 'formBackground'>
        <h1 class='formHeader'>Create a Location</h1>
        <form class='thinForm' action='createLocationHandler.php' id='locationForm' method='post'>
        <div  ><input type='hidden' name='locationId' value='". getIfContains('prevValues', 'locationId', 0) ."'></div>
        <div>Name of Location: <input type='text' name='locationName' value='".htmlspecialchars(getIfContains('prevValues', 'locationName', "")) ."'>
            <span class = 'formNotes'>".getIfContains('errorMessages', 'locationName', "*Required: must be unique")."</span></div>
        
        <div>Type in what you want to know for this location:
        <p></p><textarea name='notes' rows='10' cols='30' form='locationForm' >". htmlspecialchars(getIfContains('prevValues', 'locationNotes', "")) ."</textarea>
        
        </div>
        <div class=''>What enemies are there in this section:";
    $dao = new Dao();
    $creatureList = $dao->getEnemies();
    $nameList = array();
    $idList = array();
    $index = 0;
    foreach($creatureList as $enemy){
        $id = $enemy->id;
        $name = $enemy->name;
        $nameList[$index] = $name;
        $idList[$index] = $id;
        $index = $index + 1;
    }
    createNamedCheckboxList($nameList, $idList, "enemyId", getIfContains('prevValues','enemiesArray',array()));
echo"       </div>
        <div><input type='submit' value='Submit'></div>
     </form></div>
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
