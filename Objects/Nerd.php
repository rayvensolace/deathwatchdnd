<?php

class Nerd
{

    private $alias;
    private $id;
    private $email;
    private $DMLevel;
    private $secret;
    private $demo;

    /**
     * Nerd constructor.
     * @param $alias
     * @param $id
     * @param $email
     * @param $secret
     * @param $DMLevel
     * @param $demo
     */
    public function __construct($alias, $email, $DMLevel , $id, $demo = 1){
        $this->alias = $alias;
        $this->email = $email;
        $this->id = $id;
        $this->secret = crypt($alias . $email . "dungeon", "master");
        $this->DMLevel = $DMLevel;
        $this->demo = $demo;
    }

    public function getName(){
        return $this->alias;
    }

    public function getSecret(){
        return $this->secret;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getDemo(){
        return $this->demo;
    }

    public function validateCookie($secret){
        return $this->secret == $secret;
    }

    public function getDMLevel(){
        return $this->DMLevel;
    }

    public function getId(){
        return $this->id;
    }

    public function appropriateLevel($DMLevel){
        switch($DMLevel){
            case "anyone":
                if($this->DMLevel == 3 ){
                    return true;
                }
            case "basicDM":
                if($this->DMLevel == 7){
                    return true;
                }
            case "powerDM":
                if($this->DMLevel == 13){
                    return true;
                }
            case "worldChanger":
                if($this->DMLevel == 19){
                    return true;
                }
        }
        return false;
    }

    public function string(){
        $returnString =  "ID:".$this->id."<br>Name:".$this->alias."<br>Email:".$this->email."<br>Hash:".$this->secret."<br>GetDemo:".$this->demo."<br>DMLevel:".$this->DMLevel."<br>";
        return $returnString;
    }
}