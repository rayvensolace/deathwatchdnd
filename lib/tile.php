<?php

  function  createTile(){
         echo "<div class=\"tileContainer\"><div class='internalTile'>Generic Tile</div></div>";
}


    function createVideoTile($videoDataArray){
        $name = empty($videoDataArray['videoName']) ? 'Video Name':$videoDataArray['videoName'];
        $href =empty($videoDataArray['httptag']) ? 'https://ih0.redbubble.net/image.25011287.7046/flat,800x800,070,f.u2.jpg': $videoDataArray['httptag'];
        $src = empty($videoDataArray['image']) ? 'https://ih0.redbubble.net/image.25011287.7046/flat,800x800,070,f.u2.jpg': $videoDataArray['image'];
        echo "<div class='tileContainer'>
            <div class='inlineList widthDiv titleHighlight'>
                <div class='inlineContainer'></div>
                <div>$name</div>
                <div class='inlineContainer'></div>
            </div>
            <div class='videoImage'><a href=$href >
                    <img src:$src height:95% width: 95% >
                    </a>
            </div>
        </div>";
    }

    function createCreatureTile($enemy){
      $name = $enemy->name;
      echo "<div class='tileContainer'>
        <div class='inlineList thinForm widthDiv titleHighlight'>
            <div><form class='thinForm' action='../forms/editCreatureHandler.php' method='post'>
                <input type='hidden' name='enemyId' value=". $enemy->id.">
                <button type='submit' name='enemyEdit' class='editBtn'>Edit</button>
            </form></div>
            <div class='inlineContainer'></div><div class='centerDiv'>".htmlspecialchars($name)."</div><div class='inlineContainer'></div>
        </div>
            <div class='inlineList widthDiv internalTile'>
                <div class='statColumn'>
                    <ol class='dataList'>";
            echo "<li class='listSectionHeader'>Basic Stats</li>";
            $baseStatsArray = $enemy->baseStatsArray;
            foreach($baseStatsArray as $stat => $value){
                echo "<li>".$stat.": ".$value."</li>";
            }
            echo "<li class='listSectionHeader'>Attributes</li>";
            $attributesArray = $enemy->attributesArray;
            foreach($attributesArray as $attribute => $value){
                echo "<li>".$attribute.": ".$value."</li>";
            }

            echo "<li class='listSectionHeader'>Abilities</li>";
            $abilitiesMap = $enemy->abilitiesMap;
            foreach($abilitiesMap as $ability => $value){
                echo "<li>".htmlspecialchars($ability).": ".htmlspecialchars($value)."</li>";
            }

            echo "<li class='listSectionHeader'>Spells</li>";
            $spellsMap = $enemy->spellsMap;
            foreach($spellsMap as $spell => $value){
                echo "<li>".htmlspecialchars($spell).": ".htmlspecialchars($value)."</li>";
            }

          echo "    </dl>    
                </div>
                <div class='descriptionColumn'>
                    <dl class='dataList'>";


        echo "<li class='listSectionHeader'>Skills</li>";
        $skillsArray = $enemy->skillsArray;
        foreach($skillsArray as $skill => $value){
            echo "<li>".$skill.": ".$value."</li>";
        }

        echo "<li class='listSectionHeader'>Items</li>";
        $itemsMap = $enemy->itemsMap;
        foreach($itemsMap as $item => $value){
            echo "<li>".htmlspecialchars($item).": ".htmlspecialchars($value)."</li>";
        }

          echo "    </ol>
                </div>
                <div class='notesColumn'>";
                echo    htmlspecialchars($enemy->notes);
          echo  "</div>
            </div>
        </div>";
    }
?>