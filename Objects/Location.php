<?php

class Location
{
    public $locationId;
    public $locationName;
    public $listOfEnemies;
    public $notes;


    public function init($locationId, $locationName, $listOfEnemies, $notes){
        $this->$locationId = $locationId;
        $this->$locationName = $locationName;
        $this->$notes = $notes;
        $this->$listOfEnemies = $listOfEnemies;
    }


}