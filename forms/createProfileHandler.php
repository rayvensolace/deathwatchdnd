<?php
include_once("../Utils/SessionManagementUtils.php");
include_once("../Utils/Validators.php");
include_once("../Utils/Dao.php");
include_once("../Objects/Nerd.php");

unset($_SESSION["errorMessages"]);
$errors = array();
$user = null;
$password = null;
$email = null;
$getDemo = null;
$pastNerdString = getIfContains("NERD", null,"");
$pastNerd = $pastNerdString == null ? null : unserialize($pastNerdString);
//echo $pastNerd == null ? "NULL PAST NERD" : $pastNerd->string();
//echo print_r($_POST, 1). "<br>";
//echo print_r($_SESSION, 1). "<br>";
if(!isset($_POST["user"]) || empty($_POST["user"])){
    $errors["user"] = "A valid user name must be used";
}else{
    $dao = new Dao();
    $user = $_POST["user"];
    if(!validateName($_POST["user"])){
        $errors["user"] = "User name must be valid";
        addValueToSession("loginuser", $user);
    }else if(  $pastNerd != null  || $dao->checkUserAvailability($user)){
        $user = $_POST["user"];
        addValueToSession("loginuser", $user);
    }else{
        $errors["user"] = "That username is already taken";
        addValueToSession("loginuser", $user);
    }
}

if(!isset($_POST["passwordOriginal"]) || empty($_POST["passwordOriginal"])){
    $errors["password"] = "A password must be entered";
}else{
    if(!validatePassword($_POST["passwordOriginal"])){
        $errors["password"] = "Invalid password";
    }else if(!isset($_POST["passwordSecondary"]) || $_POST["passwordSecondary"] != $_POST["passwordOriginal"]){
        $errors["password"] = "Password inputs must match";
    }else{
        $password = $_POST["passwordOriginal"];
    }
}

if(!isset($_POST["email"]) || empty($_POST["email"])){
    $errors["email"] = "A password must be entered";
}else{
    if(!validateEmail($_POST["email"])){
        $errors["email"] = "email must be a valid email";
    }else{
        $email = $_POST["email"];
        addValueToSession("userEmail", $email);
    }
}

if(isset($_POST["getDemo"])){
   $getDemo =  1;
}else if($pastNerd != null){
   $getDemo = 0;
}

if(!empty($errors)){
        addValueToSession("errorMessages", $errors);
        header('Location:../forms/createProfile.php');
}else {

        if($pastNerd == null) {
            $dao->addNerd($user, $password, $email);
        }else{
            $demo = $getDemo == null ? 1 : $getDemo;
            $dao->updateNerd($user,$password,$email,$pastNerd->getDMLevel(), $getDemo, $pastNerd->getId() );
        }
        $nerd = $dao->getNerd($user);
        setcookie("validation", $nerd->getSecret(), time() + 60 * 60 * 24, "/");
        $_SESSION["NERD"] = serialize($nerd);
        unset($_SESSION["loginUser"]);
        unset($_SESSION["userEmail"]);
        header('Location:../content/Videos.php');
}
