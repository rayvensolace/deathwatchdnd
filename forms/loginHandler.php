<?php
session_start();
include_once("../Utils/Validators.php");
include_once("../Objects/Nerd.php");

    $error = array();

if (isset($_POST["user"]) && validateName($_POST["user"]) ){

    $nerd = new Nerd($_POST['user'], 1,"usersemail@wherever.com",$_POST['user'] . "'sSecretUserCookieCode" , 7);
    setcookie("validation", $nerd->getSecret(), time() + 60*60, "/");
    $_SESSION["NERD"] = serialize($nerd);

    echo print_r($_POST, true);
    print_r($_POST, true);
    echo print_r($nerd,1) . "<br>";
    echo print_r($_COOKIE,1) . "<br>";

    header('Location:../content/Videos.php');
}else {

    header('Location:../forms/login.php');
}