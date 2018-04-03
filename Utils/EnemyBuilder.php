<?php
include_once("../Utils/SessionManagementUtils.php");
include_once("../Objects/Enemy.php");



function createEnemyFromPost(){

    $id = $_POST['id'];

    $name = $_POST['name'];

    //contains armorClass, attack, initiative, size, challengeRating, enemyType
    $baseStatsArray = array();
    $baseStatsArray['armorClass'] = $_POST['armorClass'];
    $baseStatsArray['attack'] = $_POST['attack'];
    $baseStatsArray['initiative'] = $_POST['initiative'];
    $baseStatsArray['size'] = $_POST['size'];
    $baseStatsArray['challengeRating'] = $_POST['challengeRating'];
    $baseStatsArray['enemyType'] = $_POST['enemyType'];

    
    //contains strength,dexterity,constitution,intelligence,wisdom,charisma
    $attributesArray = array();
    $attributesArray['strength'] = $_POST['strength'];
    $attributesArray['dexterity'] = $_POST['dexterity'];
    $attributesArray['constitution'] = $_POST['constitution'];
    $attributesArray['intelligence'] = $_POST['intelligence'];
    $attributesArray['wisdom'] = $_POST['wisdom'];
    $attributesArray['charisma'] = $_POST['charisma'];
    
    //contains reflex,will,fortitude
    $savesArray = array();
    $savesArray['reflex'] = $_POST['reflex'];
    $savesArray['will'] = $_POST['will'];
    $savesArray['fortitude'] = $_POST['fortitude'];

    //contains
    //appraise,balance,bluff,climb,concentration,craft,decipherScript,diplomacy,disable_device,disguise,
    //escapeArtist,forgery,gatherInformation,handle_animal,heal,hide,intimidate,jump,knowledge,listen,
    //moveSilently,openLock,perform,profession,ride,search,senseMotive,sleightOfHand,spellcraft,spot,
    //survival,swim,tumble,useMagicDevice,useRope
    $skillsArray = array();
    $skillsArray['appraise'] = $_POST['appraise'];
    $skillsArray['balance'] = $_POST['balance'];
    $skillsArray['bluff'] = $_POST['bluff'];
    $skillsArray['climb'] = $_POST['climb'];
    $skillsArray['concentration'] = $_POST['concentration'];
    $skillsArray['craft'] = $_POST['craft'];
    $skillsArray['decipherScript'] = $_POST['decipherScript'];
    $skillsArray['diplomacy'] = $_POST['diplomacy'];
    $skillsArray['disableDevice'] = $_POST['disableDevice'];
    $skillsArray['disguise'] = $_POST['disguise'];
    $skillsArray['escapeArtist'] = $_POST['escapeArtist'];
    $skillsArray['forgery'] = $_POST['forgery'];
    $skillsArray['gatherInformation'] = $_POST['gatherInformation'];
    $skillsArray['handleAnimal'] = $_POST['handleAnimal'];
    $skillsArray['heal'] = $_POST['heal'];
    $skillsArray['hide'] = $_POST['hide'];
    $skillsArray['intimidate'] = $_POST['intimidate'];
    $skillsArray['jump'] = $_POST['jump'];
    $skillsArray['knowledge'] = $_POST['knowledge'];
    $skillsArray['listen'] = $_POST['listen'];
    $skillsArray['moveSilently'] = $_POST['moveSilently'];
    $skillsArray['openLock'] = $_POST['openLock'];
    $skillsArray['perform'] = $_POST['perform'];
    $skillsArray['profession'] = $_POST['profession'];
    $skillsArray['ride'] = $_POST['ride'];
    $skillsArray['search'] = $_POST['search'];
    $skillsArray['senseMotive'] = $_POST['senseMotive'];
    $skillsArray['sleightOfHand'] = $_POST['sleightOfHand'];
    $skillsArray['spellcraft'] = $_POST['spellcraft'];
    $skillsArray['spot'] = $_POST['spot'];
    $skillsArray['survival'] = $_POST['survival'];
    $skillsArray['swim'] = $_POST['swim'];
    $skillsArray['tumble'] = $_POST['tumble'];
    $skillsArray['useMagicDevice'] = $_POST['useMagicDevice'];
    $skillsArray['useRope'] = $_POST['useRope'];

    //contains map of {weapon name : damage/description}
    $weaponsMap = array();
    $weaponNumber = 1;
    while(isset($_POST['weapon'.$weaponNumber])){
        $weaponsMap[$_POST["weapon".$weaponNumber]] = $_POST['damage'.$weaponNumber];
        $weaponNumber = $weaponNumber + 1;
    }

    //contains map of {item name of item : description}
    $itemsMap = array();
    $itemNumber = 1;
    while(isset($_POST['item'.$itemNumber])){
        $itemsMap[$_POST["item".$itemNumber]] = $_POST['value'.$itemNumber];
        $itemNumber = $itemNumber + 1;
    }


    //contains map of {extra ability : description}
    $abilitiesMap = array();
    $abilityNumber = 1;
    while(isset($_POST['ability'.$abilityNumber])){
        $abilitiesMap[$_POST["ability".$abilityNumber]] = $_POST['abilityNote'.$abilityNumber];
        $abilityNumber = $abilityNumber + 1;
    }

    //
    $spellsMap = array();
    $spellNumber = 1;
    while(isset($_POST['spell'.$spellNumber])){
        $spellsMap[$_POST["spell".$spellNumber]] = $_POST['spellNote'.$spellNumber];
        $spellNumber = $spellNumber + 1;
    }

    $notes = !isset($_POST['notes']) ? "" : $_POST['notes'];

    $image = null;

    $newEnemy = new Enemy($id,$name,$baseStatsArray,$attributesArray,$savesArray,$skillsArray,$weaponsMap,$itemsMap,$abilitiesMap,$spellsMap,$notes,$image);
    // echo "<br>".print_r($newEnemy,1)."<br>";
    return $newEnemy;
}

function createEnemyFromDatabaseRow($rs){
    $id = $rs['enemyId'];

    $name = $rs['enemyName'];

    //contains armorClass, attack, initiative, size, challengeRating, enemyType
    $baseStatsArray = array();
    $baseStatsArray['armorClass'] = $rs['armorClass'];
    $baseStatsArray['attack'] = $rs['attack'];
    $baseStatsArray['initiative'] = $rs['initiative'];
    $baseStatsArray['size'] = $rs['size'];
    $baseStatsArray['challengeRating'] = $rs['challengeRating'];
    $baseStatsArray['enemyType'] = $rs['enemyType'];


    //contains strength,dexterity,constitution,intelligence,wisdom,charisma
    $attributesArray = array();
    $attributesArray['strength'] = $rs['strength'];
    $attributesArray['dexterity'] = $rs['dexterity'];
    $attributesArray['constitution'] = $rs['constitution'];
    $attributesArray['intelligence'] = $rs['intelligence'];
    $attributesArray['wisdom'] = $rs['wisdom'];
    $attributesArray['charisma'] = $rs['charisma'];

    //contains reflex,will,fortitude
    $savesArray = array();
    $savesArray['reflex'] = $rs['reflex'];
    $savesArray['will'] = $rs['will'];
    $savesArray['fortitude'] = $rs['fortitude'];

    //contains
    //appraise,balance,bluff,climb,concentration,craft,decipherScript,diplomacy,disable_device,disguise,
    //escapeArtist,forgery,gatherInformation,handle_animal,heal,hide,intimidate,jump,knowledge,listen,
    //moveSilently,openLock,perform,profession,ride,search,senseMotive,sleightOfHand,spellcraft,spot,
    //survival,swim,tumble,useMagicDevice,useRope
    $skillsArray = unserialize($rs['skillsArray']);
    
    //contains map of {weapon name : damage/description}
    $weaponsMap = unserialize($rs['weaponsMap']);
    

    //contains map of {item name of item : description}
    $itemsMap = unserialize($rs['itemsMap']);

    //contains map of {extra ability : description}
    $abilitiesMap = unserialize($rs['abilitiesMap']);
    
    //
    $spellsMap = unserialize($rs['spellsMap']);

    $notes = $rs['notes'];

    $image = null;

    $newEnemy = new Enemy($id,$name,$baseStatsArray,$attributesArray,$savesArray,$skillsArray,$weaponsMap,$itemsMap,$abilitiesMap,$spellsMap,$notes,$image);
   //echo "<br>".print_r($newEnemy,1)."<br>";
    return $newEnemy;
}

function setEnemyForSession($enemy){
    $prevValues = array();
    
    $id = $enemy->id;
    $prevValues['id'] = $id;

    $name = $enemy->name;
    $prevValues['name'] = htmlspecialchars($name);

    //contains armorClass, attack, initiative, size, challengeRating, enemyType
    $baseStatsArray = $enemy->baseStatsArray;
    $prevValues['armorClass'] = $baseStatsArray['armorClass'];
    $prevValues['attack'] = $baseStatsArray['attack'];
    $prevValues['initiative'] = $baseStatsArray['initiative'];
    $prevValues['size'] = $baseStatsArray['size'];
    $prevValues['challengeRating'] = $baseStatsArray['challengeRating'];
    $prevValues['enemyType'] = $baseStatsArray['enemyType'];


    //contains strength,dexterity,constitution,intelligence,wisdom,charisma
    $attributesArray = $enemy->attributesArray;
    $prevValues['strength'] = $attributesArray['strength'];
    $prevValues['dexterity'] = $attributesArray['dexterity'];
    $prevValues['constitution'] = $attributesArray['constitution'];
    $prevValues['intelligence'] = $attributesArray['intelligence'];
    $prevValues['wisdom'] = $attributesArray['wisdom'];
    $prevValues['charisma'] = $attributesArray['charisma'];

    //contains reflex,will,fortitude
    $savesArray = $enemy->savesArray;
    $prevValues['reflex'] = $savesArray['reflex'];
    $prevValues['will'] = $savesArray['will'];
    $prevValues['fortitude'] = $savesArray['fortitude'];

    //contains
    //appraise,balance,bluff,climb,concentration,craft,decipherScript,diplomacy,disable_device,disguise,
    //escapeArtist,forgery,gatherInformation,handle_animal,heal,hide,intimidate,jump,knowledge,listen,
    //moveSilently,openLock,perform,profession,ride,search,senseMotive,sleightOfHand,spellcraft,spot,
    //survival,swim,tumble,useMagicDevice,useRope
    $skillsArray = $enemy->skillsArray;
    $prevValues['appraise'] = $skillsArray['appraise'];
    $prevValues['balance'] = $skillsArray['balance'];
    $prevValues['bluff'] = $skillsArray['bluff'];
    $prevValues['climb'] = $skillsArray['climb'];
    $prevValues['concentration'] = $skillsArray['concentration'];
    $prevValues['craft'] = $skillsArray['craft'];
    $prevValues['decipherScript'] = $skillsArray['decipherScript'];
    $prevValues['diplomacy'] = $skillsArray['diplomacy'];
    $prevValues['disableDevice'] = $skillsArray['disableDevice'];
    $prevValues['disguise'] = $skillsArray['disguise'];
    $prevValues['escapeArtist'] = $skillsArray['escapeArtist'];
    $prevValues['forgery'] = $skillsArray['forgery'];
    $prevValues['gatherInformation'] = $skillsArray['gatherInformation'];
    $prevValues['handleAnimal'] = $skillsArray['handleAnimal'];
    $prevValues['heal'] = $skillsArray['heal'];
    $prevValues['hide'] = $skillsArray['hide'];
    $prevValues['intimidate'] = $skillsArray['intimidate'];
    $prevValues['jump'] = $skillsArray['jump'];
    $prevValues['knowledge'] = $skillsArray['knowledge'];
    $prevValues['listen'] = $skillsArray['listen'];
    $prevValues['moveSilently'] = $skillsArray['moveSilently'];
    $prevValues['openLock'] = $skillsArray['openLock'];
    $prevValues['perform'] = $skillsArray['perform'];
    $prevValues['profession'] = $skillsArray['profession'];
    $prevValues['ride'] = $skillsArray['ride'];
    $prevValues['search'] = $skillsArray['search'];
    $prevValues['senseMotive'] = $skillsArray['senseMotive'];
    $prevValues['sleightOfHand'] = $skillsArray['sleightOfHand'];
    $prevValues['spellcraft'] = $skillsArray['spellcraft'];
    $prevValues['spot'] = $skillsArray['spot'];
    $prevValues['survival'] = $skillsArray['survival'];
    $prevValues['swim'] = $skillsArray['swim'];
    $prevValues['tumble'] = $skillsArray['tumble'];
    $prevValues['useMagicDevice'] = $skillsArray['useMagicDevice'];
    $prevValues['useRope'] = $skillsArray['useRope'];

    //contains map of {weapon name : damage/description}
    $weaponsMap = isset($enemy->weaponsArray) ? $enemy->weaponsArray : array();
    $weaponNumber = 1;
    foreach($weaponsMap as $weapon => $value){
        $prevValues["weapon".$weaponNumber] = htmlspecialchars($weapon);
        $prevValues["damage".$weaponNumber] = htmlspecialchars($value);
        $weaponNumber = $weaponNumber + 1;
    }

    //contains map of {item name of item : description}
    $itemsMap = $enemy->itemsMap;
    $itemNumber = 1;
    foreach($itemsMap as $item => $value){
        $prevValues["item".$itemNumber] = htmlspecialchars($item);
        $prevValues["value".$itemNumber] = htmlspecialchars($value);
        $itemNumber = $itemNumber + 1;
    }


    //contains map of {extra ability : description}
    $abilitiesMap = $enemy->abilitiesMap;
    $abilityNumber = 1;
    foreach($abilitiesMap as $ability => $value){
        $prevValues["ability".$abilityNumber] = htmlspecialchars($ability);
        $prevValues["abilityNote".$abilityNumber] = htmlspecialchars($value);
        $abilityNumber = $itemNumber + 1;
    }

    //
    $spellsMap = $enemy->spellsMap;
    $spellNumber = 1;
    foreach($spellsMap as $spell => $value){
        $prevValues["spell".$spellNumber] = htmlspecialchars($spell);
        $prevValues["spellNote".$spellNumber] = htmlspecialchars($value);
        $spellNumber = $spellNumber + 1;
    }

    $prevValues["notes"] = htmlspecialchars($enemy->notes);

    $image = null;

    $_SESSION["prevValues"] = $prevValues;
//    echo "<br><br>Name:".$name."<br>Stats:".print_r($baseStatsArray,1)."<br>Attributes:".print_r($attributesArray,1)."<br>Saves:".print_r($savesArray,1)."<br>Skills:".print_r($skillsArray,1)."<br>Weapons:".print_r($weaponsMap,1)."<br>Items:".print_r($itemsMap,1)."<br>Spells".print_r($spellsMap,1)."<br>Notes".$notes;
//    echo "<br>".print_r($_SESSION,1)."<br>";
}