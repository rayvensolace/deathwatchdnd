<?php
/**
 * Created by PhpStorm.
 * User: rayve
 * Date: 2/26/2018
 * Time: 5:56 PM
 */

class Campaign
{

    private $campaignName;
    private $listOfSections;

    public function init($campaignName, $listOfSections){
        $this->$campaignName = $campaignName;
        $this->$listOfSections = $listOfSections;
    }



}