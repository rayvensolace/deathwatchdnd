<?php



function list_item($checkboxName){
    echo "<div class='listItem'><input type='checkbox' name=$checkboxName value=$checkboxName >$checkboxName </div>";
}

function createLocationsOption( $locationList){
    foreach($locationList as $location ) {
        echo "<option value=$location >$location</option> ";
    }
}
?>