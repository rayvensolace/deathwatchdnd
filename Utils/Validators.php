<?php
include_once("../Utils/Dao.php");

/**
 * @param $name
 * @return bool
 */
function validateName($name)
{
    if (preg_match('/^[a-zA-Z \-]+$/i', $name) && strlen($name) > 4) {
        return true;
    }else {
        return false;
    }
}

/**
 * @param $email
 * @return bool
 */
function validateEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else{
        return false;
    }
}

/**
 * @param $password
 * @return bool
 */
function validatePassword($password){
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    if ($uppercase && $lowercase && $number && strlen($password) > 5) {
        return true;
    }else {
        return false;
    }
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


