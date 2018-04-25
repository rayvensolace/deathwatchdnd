<?php

class Enemy
{

    public $id;

    public $name;

    //contains hp, armorClass, attack, initiative, size, challengeRating, enemyType
    public $baseStatsArray;

    //contains strength,dexterity,constitution,intelligence,wisdom,charisma
    public $attributesArray;

    //contains reflex,will,fortitude
    public $savesArray;

    //contains
    //appraise,balance,bluff,climb,concentration,craft,decipherScript,diplomacy,disable_device,disguise,
    //escapeArtist,forgery,gatherInformation,handle_animal,heal,hide,intimidate,jump,knowledge,listen,
    //moveSilently,openLock,perform,profession,ride,search,senseMotive,sleightOfHand,spellcraft,spot,
    //survival,swim,tumble,useMagicDevice,useRope
    public $skillsArray;

    //contains map of {weapon name : damage/description}
    public $weaponsMap;

    //contains map of {item name of item : description}
    public $itemsMap;

    //contains map of {extra ability : description}
    public $abilitiesMap;

    //
    public $spellsMap;

    public $notes;

    public $image;

    public function __construct($id,$name, $baseStatsArray, $attributesArray, $savesArray, $skillsArray,$weaponsMap, $itemsMap, $abilitiesMap, $spellsMap, $notes, $image){
     //   echo "<br><br>Name:".$name."<br>Stats:".print_r($baseStatsArray,1)."<br>Attributes:".print_r($attributesArray,1)."<br>Saves:".print_r($savesArray,1)."<br>Skills:".print_r($skillsArray,1)."<br>Weapons:".print_r($weaponsMap,1)."<br>Items:".print_r($itemsMap,1)."<br>Spells".print_r($spellsMap,1)."<br>Notes".$notes;

        $this->id = $id;
        $this->name = $name;
        $this->baseStatsArray = $baseStatsArray;
        $this->attributesArray = $attributesArray;
        $this->savesArray = $savesArray;
        $this->skillsArray = $skillsArray;
        $this->weaponsMap = $weaponsMap;
        $this->itemsMap = $itemsMap;
        $this->abilitiesMap = $abilitiesMap;
        $this->spellsMap = $spellsMap;
        $this->notes = $notes;
        $this->image = $image;

//        echo "<br>After".$this->id;
//        echo "<br>After".$this->name;
//        echo "<br>After".print_r($this->baseStatsArray, 1);
//        echo "<br>After".print_r($this->attributesArray, 1);
//        echo "<br>After".print_r($this->savesArray, 1);
//        echo "<br>After".print_r($this->skillsArray, 1);
//        echo "<br>After".print_r($this->weaponsMap, 1);
//        echo "<br>After".print_r($this->itemsMap, 1);
//        echo "<br>After".print_r($this->abilitiesMap, 1);
//        echo "<br>After".print_r($this->spellsMap, 1);
//        echo "<br>After".$this->notes;
//        echo "<br>After".$this->image;
    }
}