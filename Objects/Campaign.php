<?php

class Campaign
{

    public $campaign;
    public $campaignName;
    public $notes;


    public function __construct($campaign, $campaignName, $listOfSections){
        $this->campaign = $campaign;
        $this->campaignName = $campaignName;
        $this->listOfSections = $listOfSections;
    }



}

function addToSession($campaign){

}