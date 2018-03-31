<?php
include_once("../Utils/Dao.php");

/**
 * @param $name
 * @return bool
 */
function validateName($name){
    return true;
}

/**
 * @param $email
 * @return bool
 */
function validateEmail($email){
    return true;
}

/**
 * @param $password
 * @return bool
 */
function validatePassword($password){
    return true;
}

/**
 * @param $password
 * @return string
 */
function setPasswordHash($password){
    $hash = crypt($password."dungeon","master");
    return $hash;
}

/**
 * @param $userName
 * @param $password
 * @return Nerd|null
 */
function validateUser($userName, $password){

    $dao = new Dao();
    $secret = $dao->checkNerd($userName);
    if(hash_equals($secret, setPasswordHash($password))){
        return $dao->getNerd($userName);
    }else {
        return null;
    }
}


