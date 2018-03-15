<?php

class Nerd
{

    private $alias;
    private $id;
    private $email;
    private $DMLevel;
    private $secret;

    /**
     * Nerd constructor.
     * @param $alias
     * @param $id
     * @param $email
     * @param $secret
     * @param $DMLevel
     */
    public function __construct($alias, $id, $email, $secret, $DMLevel ){
        $this->alias = $alias;
        $this->email = $email;
        $this->id = $id;
        $this->secret = $secret;
        $this->DMLevel = $DMLevel;
    }

    public function getName(){
        return $this->alias;
    }

    public function getSecret(){
        return $this->secret;
    }

    public function validateCookie($secret){
        return $this->secret == $secret;
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
}