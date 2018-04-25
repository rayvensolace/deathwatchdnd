<?php

class Location
{
    public $locationId;
    public $locationName;
    public $locationNotes;


    public function __construct($locationId, $locationName, $locationNotes){
        $this->locationId = $locationId;
        $this->locationName = $locationName;
        $this->locationNotes = $locationNotes;
    }


}
