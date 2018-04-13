<?php

class Location
{
    public $locationId;
    public $locationName;
    public $listOfEnemies;
    public $notes;


    public function init($locationId, $locationName, $notes){
        $this->$locationId = $locationId;
        $this->$locationName = $locationName;
        $this->$notes = $notes;
    }


}