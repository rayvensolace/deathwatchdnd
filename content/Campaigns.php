<?php

    $thisPage = "Campaigns";
    include_once ("../lib/pageHeader.php");
    include_once ("../lib/travelBar.php");
    include_once ("../lib/list.php");
    include_once ("../lib/tile.php");
    include_once ("../Utils/Dao.php");
$dao = new Dao();
$sectionList = $dao->getSections();
$checkedSection = new CampaignSection(0,0,'DemoSection', ' Calling subschool compulsion subschool dwarf domain effective hit point increase failure fear effect frightened low-light vision monk movement modes natural reach prone range increment ray shadow subschool smoke effects suppress touch attack travel domain. Ability decrease action archon subtype command undead dodge bonus drow domain energy charge enhancement bonus favored class fear effect grab inner planes line of sight massive damage party plane of shadow player character positive energy plane result spider domain staggered travel domain. Ability damage ability drained action animal type chaotic subtype class level darkness domain lava effects outer plane result scent skill modifier smoke effects spell descriptor strength supernatural ability yugoloth subtype.

                    Aberration type ability modifier armor class bonus burrow change shape concealment domain electrum elemental plane fate domain fatigued illusion domain miniature figure movement modes negative level ocean domain orc domain panicked pattern subschool phantasm subschool racial hit die renewal domain spell domain suppress swallow whole take 20 use-activated item. 5-foot step air subtype bard bonus burrow concentrate on a spell eladrin subtype fire domain healing domain massive damage outsider type party rounding sacred bonus sonic attack standard action summoning subschool tremorsense use-activated item vulnerability to energy. Ability ability damaged automatic hit baatezu subtype circumstance bonus destruction domain environment falling fast healing frightful presence full-round action hardness kind luck bonus modifier morale bonus natural ability natural reach petrified rend rounding skill check special quality square summoning subschool threat transitive plane turning check unarmed attack war domain.                                                                                                                                                                       Baatezu subtype barbarian base land speed class skill energy plane falling objects fortitude save gaseous form medium melee touch attack nonplayer character size modifier. Attack of opportunity augmented subtype automatic miss blown away class feature creature dying granted power mundane result sonic attack threat. 5-foot step character level competence bonus concealment dazed difficult terrain dispel turning dwarf domain energy drained flank giant type half speed healing domain lawful move action orison paralyzed rend result sorcerer space square subject swim telepathic link teleportation subschool thrown weapon trample tyranny domain vermin type. Ability score base attack bonus bolster undead bonus cantrip chaotic subtype command undead conjuration constrict cover entangled exhausted fraction illusion incorporeal known spell multiplying one-handed weapon ooze type ray regeneration size modifier skill modifier skill points speed spell slot tiny trample.
               ');
if (count($sectionList) > 0){
    $checkedSection = current($sectionList);
}
$checkedLocation = new Location(1,"Location Name", "A lot of notes about this location");

    echo    "<div class='creatureBackground widthDiv dualPaneContent' style='height: 100%'>
        <div class='basicInfoSlider inlinePane lengthAdjustable'>
           <div class='topDiv'>
           </div>
            <div>
                <form>";
//echo "<br>".print_r($checkedSection,1)."<br>";
$nameToIdMap = array();
foreach($sectionList as $section){
    //echo "<br>".print_r($sectionList)."<br>";
    $id = $section->sectionId;
    $name = $section->sectionName;
    $nameToIdMap[$id] = $name;
}
createRadialList($nameToIdMap, 'campaigns', $checkedSection->sectionName);

         echo    "</form>
            </div>";

            $nerd = unserialize($_SESSION['NERD']);
            if($nerd->getName() != 'Guest'){
                echo " <a href='../forms/createLocation.php'><button class='createButton' type='button'>Create Campaign Location</button></a>
                       <a href='../forms/createCampaignSection.php'><button class='createButton' onclick='document.location.href='../forms/createCampaignSection.php' type='button'>Create Campaign Section</button></a>";
            }

        echo    "</div>
        <div class='creatureContent inlinePane'>
        <div>
            <div class='topDiv campaignTop' style='display:inline-flex'>
                <div class='campaignTopLeft'>
                    <div class='inlineList thinForm widthDiv titleHighlight' id='sectionTitle'>
                        <div><form class='thinForm' action='../forms/editCampaignSectionHandler.php' method='post'>
                            <input type='hidden' name='sectionId' value=". $checkedSection->sectionId.">
                            <button type='submit' name='enemyEdit' class='editBtn'>Edit</button>
                            </form>
                        </div><div class='inlineContainer'></div><div class='centerDiv'>".htmlspecialchars($checkedSection->sectionName)."</div><div class='inlineContainer'></div>
                    </div>
                <div style='display:inline-flex'>".
                        htmlspecialchars($checkedSection->sectionNotes)
//                    Calling subschool compulsion subschool dwarf domain effective hit point increase failure fear effect frightened low-light vision monk movement modes natural reach prone range increment ray shadow subschool smoke effects suppress touch attack travel domain. Ability decrease action archon subtype command undead dodge bonus drow domain energy charge enhancement bonus favored class fear effect grab inner planes line of sight massive damage party plane of shadow player character positive energy plane result spider domain staggered travel domain. Ability damage ability drained action animal type chaotic subtype class level darkness domain lava effects outer plane result scent skill modifier smoke effects spell descriptor strength supernatural ability yugoloth subtype.
//
//                    Aberration type ability modifier armor class bonus burrow change shape concealment domain electrum elemental plane fate domain fatigued illusion domain miniature figure movement modes negative level ocean domain orc domain panicked pattern subschool phantasm subschool racial hit die renewal domain spell domain suppress swallow whole take 20 use-activated item. 5-foot step air subtype bard bonus burrow concentrate on a spell eladrin subtype fire domain healing domain massive damage outsider type party rounding sacred bonus sonic attack standard action summoning subschool tremorsense use-activated item vulnerability to energy. Ability ability damaged automatic hit baatezu subtype circumstance bonus destruction domain environment falling fast healing frightful presence full-round action hardness kind luck bonus modifier morale bonus natural ability natural reach petrified rend rounding skill check special quality square summoning subschool threat transitive plane turning check unarmed attack war domain.                                                                                                                                                                       Baatezu subtype barbarian base land speed class skill energy plane falling objects fortitude save gaseous form medium melee touch attack nonplayer character size modifier. Attack of opportunity augmented subtype automatic miss blown away class feature creature dying granted power mundane result sonic attack threat. 5-foot step character level competence bonus concealment dazed difficult terrain dispel turning dwarf domain energy drained flank giant type half speed healing domain lawful move action orison paralyzed rend result sorcerer space square subject swim telepathic link teleportation subschool thrown weapon trample tyranny domain vermin type. Ability score base attack bonus bolster undead bonus cantrip chaotic subtype command undead conjuration constrict cover entangled exhausted fraction illusion incorporeal known spell multiplying one-handed weapon ooze type ray regeneration size modifier skill modifier skill points speed spell slot tiny trample.
                ."</div>
                </div>
                <div class='campaignNotes'>
                    <div class='widthDiv thinForm titleHighlight' id='locationTitle'>
                    <div><form class='thinForm' action='../forms/editLocationHandler.php' method='post'>
                            <input type='hidden' name='sectionId' value="."1"."> 
                            <button type='submit' name='enemyEdit' class='editBtn'>Edit</button>
                            </form>
                    </div>
                    <div class='inlineContainer'></div><div class='centerDiv'>".htmlspecialchars($checkedLocation->locationName)."</div><div class='inlineContainer'></div>
                    <div class='inlineContainer'></div>
                        <div class='centerDiv'>
                            <form class='thinForm'>
                                <select class='filterDropDown'  name='dropdown' >";

                                        $locationList = ['location1', 'location2', 'location3','location4', 'location5'];
                                        createLocationsOption($locationList);

                        echo    "</select>
                            </form>
                        </div>
                    </div>
                        <div class='inlineContainer widthDiv internalTile'>
                            <div class='descriptionColumn'>
                                <ol class='dataList'>
                                    Enemies:<p>";

                                    $list;
                                    for($i = 1; $i < 18 ; $i++){
                                        $list[$i] = 'Enemy '.$i;
                                    }
                                    createVerticalList($list);

                        echo "   </ol>
                            </div>
                            <div class='notesColumn'>
                                Notes:<p>". $checkedLocation->locationNotes
                                 //A mountain acrodectes peak castle peak debauch mountain pb dolores peak hayfork bally iron mountain kootenai peak loma prieta mcdonald peak mount bolivar mount davis mount gabb mount lamlam mount princeton mount ritter san benito mountain thimble peak vulture peak west elk peak whitewater baldy wire mountain. Bonanza peak chair peak crane mountain crow peak kendrick peak mount baden-powell mount muir mount neacola pb mount russell pb nathaniel mountain stripe mountain taum sauk mountain west elk peak. Baldy mountain brush mountain ipasha peak keynot peak mauna loa mount prophet mount shishaldin pb navajo mountain needle rock patterson creek mountain pyramid peak sand mountain spring gap mountain.
                            ."</div>
                        </div>
                    <div class='thinForm'>Popout Button</div>
                </div>
            </div>
            
            <div class='lengthAdjustable'>
                <div class='tilesContainer bottomDiv'>";

                    $dao = new Dao();
                    $creatureList = $dao->getEnemies();
                    createTileList($creatureList, 'creature');
                
               echo "</div>
            </div>
        </div>
        </div>
    </div>";

include_once ("../lib/footer.php");
?>
