<?php
    include_once("tile.php");


function createCheckboxList($checkboxList){
    foreach($checkboxList as $checkboxName){
        echo "<div class='listItem'><input type='checkbox' name=$checkboxName value=$checkboxName >$checkboxName </div>";
    }
}

function createNamedCheckboxList($nameArray, $idArray, $prefix, $prevValues){
    for($i = 0 ; $i < sizeof($nameArray) ; $i = $i + 1 ){
        $name = $prefix."".$idArray[$i];
        $checked = isset($prevValues[$name]) ? 'checked' : '';
        echo "<div class='listItem'><input type='checkbox' name=$name value=$idArray[$i] $checked>$nameArray[$i] </div>";
    }
}

function createLocationsOption( $locationList){
    foreach($locationList as $location ) {
        echo "<option value=$location >$location</option> ";
    }
}

function createVerticalList($listOfItems){
    foreach($listOfItems as $item){
        echo "<li>$item</li>";
    }
}

function createRadialList($listOfRadials, $group)
{
    foreach ($listOfRadials as $radial) {
        echo "<div><input type='radio' name='$group' value='preg_replace('/\s+/', '', $radial)>$radial</div>";
    }
}

function createTileList($listOfTileData, $type){
    foreach($listOfTileData as $tileData){
        switch($type) {
            case 'video':
                createVideoTile($tileData);
                break;
            case 'creature':
                createCreatureTile($tileData);
                break;
            default:
                echo "Not Valid Tile Type";
                break;
        }
    }
}

?>