<?php

class CampaignSection
{
    public $sectionId;
    public $parentCampaign;
    public $sectionName;
    public $sectionNotes;

    public function __construct($sectionId, $parentCampaign, $sectionName, $sectionNotes){
        $this->sectionId = $sectionId;
        $this->parentCampaign = $parentCampaign;
        $this->sectionName = $sectionName;
        $this->sectionNotes = $sectionNotes;
    }
}