<?php

class CampaignSection
{
    private $parentSection;
    private $sectionName;
    private $notesSection = "";
    private $listOfLocations;

    public function init($notesSection , $listOfLocations){
        $this->$notesSection = $notesSection;
        $this->$listOfLocations = $listOfLocations;
    }





}