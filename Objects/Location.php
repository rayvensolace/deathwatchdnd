<?php

class Location
{
    private $campaignSection;
    private $locationName;
    private $listOfEnemies;
    private $notes;


    public function init( $locationName, $listOfEnemies, $notes, $campaignSection){
        $this->$campaignSection = $campaignSection;
        $this->$locationName = $locationName;
        $this->$notes = $notes;
        $this->$listOfEnemies = $listOfEnemies;
    }


}