<?php




  function  createTile(){
         echo "<div class=\"tileContainer\"><div class='internalTile'>Generic Tile</div></div>";
}


    function createVideoTile($videoName, $httptag, $image ){
        echo "<div class='tileContainer'>
            <div class='inlineList widthDiv titleHighlight'>
                <div class='inlineContainer'></div>
                <div>$videoName</div>
                <div class='inlineContainer'></div>
            </div>
            <div class='videoImage'><a href=$httptag>
                    <img src:$image height:95% width: 95% >
                    </a>
            </div>
        </div>";
    }

    function createCreatureTile($creatureArray){
      echo "<div class='tileContainer'>
        <div class='inlineList thinForm widthDiv titleHighlight'>
            <div class='inlineContainer'></div><div class='centerDiv'>Creature Name</div><div class='inlineContainer'></div>
        </div>
            <div class='inlineList widthDiv internalTile'>
                <div class='statColumn'>
                    <ol class='dataList'>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                    </ol>    
                </div>
                <div class='descriptionColumn'>
                    <ol class='dataList'>
                        <li>Skills: x</li>
                        <li>Stuff: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                        <li>Strength: x</li>
                    </ol>
                </div>
                <div class='notesColumn'>
                    Ability damage alternate form animal type character level dead elemental plane gold piece metal domain negative level paralyzed party spontaneous casting suffering domain suffocation water dangers. Continuous damage extraplanar ice effects knocked down manufactured weapons melee attack ranged attack rebuke undead sorcerer subtype. Command undead domain spell effective hit point increase falling objects force damage healing subschool helpless illusion domain inflict spell inherent bonus initiative check knowledge domain lava effects masterwork material plane phantasm subschool player character prone speed thirst two-handed weapon. Aberration type animal type baatezu subtype barbarian construct type craft domain damage reduction elemental plane energy damage falling objects fast healing flight frightful presence glamer subschool hit die level medium monstrous humanoid type negate ocean domain ranged weapon saving throw skill rank small spider domain storm domain summon supernatural ability temporary hit points vermin type.
                </div>
            </div>
        </div>";
    }
?>