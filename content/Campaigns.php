<?php

    $thisPage = "Campaigns";
    include_once ("../lib/pageHeader.php");
    include_once ("../lib/travelBar.php");
    include_once ("../lib/list.php");
    include_once ("../lib/tile.php");
?>
    <div class="creatureBackground widthDiv dualPaneContent" style="height: 100%">
        <div class="basicInfoSlider inlinePane lengthAdjustable">
           <div class="topDiv">
               <form action="createCampaignSection.php" method="post">
                <div class="filterBar">Filter<select name="dropdown">
                        <option value="Value1"> Campaign Setting 1</option>
                        <option value="Value2"> Campaign Setting 2</option>
                        <option value="Value3"> Campaign Setting 3</option>
                        <option value="Value4"> Campaign Setting 4</option>
                        <option value="Value5"> Campaign Setting 5</option>
                    </select>
                </div>
                </form>
           </div>
            <div>
                <form>
                    <?php
                    $list;
                    for($i = 1; $i < 15 ; $i++){
                        $list[$i] = "Campaign Setting ".$i;
                    }
                        createRadialList($list, "campaigns");
                    ?>
                </form>
            </div>
            <button class="createButton" onclick=" href="campaignForm.html" type="button">Create Campaign Location</button>
            <button class="createButton" onclick=" href="campaignForm.html" type="button">Create Campaign Section</button>
        </div>
        <div class="creatureContent inlinePane">
            <div class="topDiv campaignTop" style="display:inline-flex">
                <div class="campaignTopLeft">


                    Calling subschool compulsion subschool dwarf domain effective hit point increase failure fear effect frightened low-light vision monk movement modes natural reach prone range increment ray shadow subschool smoke effects suppress touch attack travel domain. Ability decrease action archon subtype command undead dodge bonus drow domain energy charge enhancement bonus favored class fear effect grab inner planes line of sight massive damage party plane of shadow player character positive energy plane result spider domain staggered travel domain. Ability damage ability drained action animal type chaotic subtype class level darkness domain lava effects outer plane result scent skill modifier smoke effects spell descriptor strength supernatural ability yugoloth subtype.

                    Aberration type ability modifier armor class bonus burrow change shape concealment domain electrum elemental plane fate domain fatigued illusion domain miniature figure movement modes negative level ocean domain orc domain panicked pattern subschool phantasm subschool racial hit die renewal domain spell domain suppress swallow whole take 20 use-activated item. 5-foot step air subtype bard bonus burrow concentrate on a spell eladrin subtype fire domain healing domain massive damage outsider type party rounding sacred bonus sonic attack standard action summoning subschool tremorsense use-activated item vulnerability to energy. Ability ability damaged automatic hit baatezu subtype circumstance bonus destruction domain environment falling fast healing frightful presence full-round action hardness kind luck bonus modifier morale bonus natural ability natural reach petrified rend rounding skill check special quality square summoning subschool threat transitive plane turning check unarmed attack war domain.

                                                                                                                                                                                                                                                                                                                                                                                                Blindsense cold subtype command undead current hit points double weapon eladrin subtype evasion force damage level loss massive damage multiplying. Angel subtype armor class bard copper piece darkness disease dispel turning energy drain energy drained engaged good subtype hardness healing subschool immediate action lawful melee morale bonus natural ability off hand penalty planning domain ranged touch attack reflex save sickened spell level undeath domain vulnerability to energy will save. Astral plane base attack bonus cold domain comatose domain drow domain dungeon master exhausted lethal damage negative energy paladin spell slot turn war domain. Ability drain animal domain attack of opportunity baatezu subtype cold subtype death attack exhausted fast healing favored class fear ray fire subtype grab inflict spell level melee attack nonlethal damage penalty prone range increment ranger renewal domain rogue shaken size modifier space thrown weapon transmutation turn undead vermin type vulnerability to energy.

                                                                                                                                                                                                                                                                                                                                                                                                Character level cowering craft domain creature type critical roll dexterity dungeon master evasion extraplanar subtype gaseous form line of effect luck domain manufactured weapons massive damage melee touch attack melee weapon natural weapon necromancy rebuke undead spell spell descriptor spontaneous casting staggered standard action water subtype. Air subtype automatic miss battle grid blinded elf domain fascinated fatigued fraction illusion domain law domain melee attack bonus spell resistance suffering domain suppress two-handed weapon. Astral plane battle grid deal damage divine spell energy drained humanoid type luck bonus magic domain one-handed weapon round starvation subtype tyranny domain water subtype.

                                                                                                                                                                                                                                                                                                                                                                                                Baatezu subtype barbarian base land speed class skill energy plane falling objects fortitude save gaseous form medium melee touch attack nonplayer character size modifier. Attack of opportunity augmented subtype automatic miss blown away class feature creature dying granted power mundane result sonic attack threat. 5-foot step character level competence bonus concealment dazed difficult terrain dispel turning dwarf domain energy drained flank giant type half speed healing domain lawful move action orison paralyzed rend result sorcerer space square subject swim telepathic link teleportation subschool thrown weapon trample tyranny domain vermin type. Ability score base attack bonus bolster undead bonus cantrip chaotic subtype command undead conjuration constrict cover entangled exhausted fraction illusion incorporeal known spell multiplying one-handed weapon ooze type ray regeneration size modifier skill modifier skill points speed spell slot tiny trample.
                </div>
                <div class="campaignNotes">
                    <div class="widthDiv filterBar">
                    <div class="inlineContainer"></div>
                        <div class="centerDiv">
                            <form class="thinForm">
                                <select class="filterDropDown"  name="dropdown" >
                                    <?php
                                        $locationList = ['location1', 'location2', 'location3','location4', 'location5'];
                                        createLocationsOption($locationList);
                                    ?>
                                </select>
                            </form>
                        </div>
                        <div class="inlineContainer"></div>
                    </div>
                        <div class="inlineContainer widthDiv internalTile">
                            <div class="descriptionColumn">
                                <ol class="dataList">
                                    Enemies:<br>
                                    <?php
                                    $list;
                                    for($i = 1; $i < 20 ; $i++){
                                        $list[$i] = "Enemy ".$i;
                                    }
                                    createVerticalList($list);
                                    ?>
                                </ol>
                            </div>
                            <div class="notesColumn">
                                Notes:<br> A mountain acrodectes peak castle peak debauch mountain pb dolores peak hayfork bally iron mountain kootenai peak loma prieta mcdonald peak mount bolivar mount davis mount gabb mount lamlam mount princeton mount ritter san benito mountain thimble peak vulture peak west elk peak whitewater baldy wire mountain. Bonanza peak chair peak crane mountain crow peak kendrick peak mount baden-powell mount muir mount neacola pb mount russell pb nathaniel mountain stripe mountain taum sauk mountain west elk peak. Baldy mountain brush mountain ipasha peak keynot peak mauna loa mount prophet mount shishaldin pb navajo mountain needle rock patterson creek mountain pyramid peak sand mountain spring gap mountain.
                            </div>
                        </div>
                    <div class="thinForm">Popout Button</div>
                </div>
            </div>
            <div class="lengthAdjustable">
                <div class="tilesContainer bottomDiv">
                    <?php
                    $creatureList;
                    for($i = 0; $i < 20; $i++){
                        $creature = ['creatureName' => "Monster Name ". $i];
                        $creatureList[$i] = $creature;
                    }
                    createTileList($creatureList, 'creature');
                ?>
                </div>
            </div>
        </div>
    </div>
<?php
include_once ("../lib/footer.php");
?>
