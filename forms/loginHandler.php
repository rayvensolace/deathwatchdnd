<?php
include_once("../Utils/SessionManagementUtils.php");
include_once("../Utils/Validators.php");
include_once("../Objects/Nerd.php");
include_once("../Utils/KLogger.php");

echo print_r($_POST,1) . "<br>";
$errors = array();
if(!isset($_POST["user"]) || empty(trim($_POST["user"]))){
    echo "no user <br>";
    $errors["user"] = "Username needs to be entered";
}else{
    echo "username " . $_POST["user"] . "<br>";
}


if(!isset($_POST["password"]) || trim($_POST["password"]) == ""){
    echo "no password <br>";
    $errors["password"] = "Password needs to be entered";
}else{
echo "password " . $_POST["password"] . "<br>";
}

$nerd = validateUser(trim($_POST["user"]), trim($_POST["password"]));
if(!$nerd){
    echo "invalid combination <br>";
    $errors["invalidLogin"] = "That username and password combination does not exist";
}

if (!count($errors) ){
        //$nerd = new Nerd($_POST['user'], 1,"usersemail@wherever.com",$_POST['user'] . "'sSecretUserCookieCode" , 7);
        setcookie("validation", $nerd->getSecret(), time() + 60*60, "/");
        $_SESSION["NERD"] = serialize($nerd);

        echo print_r($_POST, true);
        print_r($_POST, true);
        echo print_r($nerd,1) . "<br>";
        echo print_r($_COOKIE,1) . "<br>";

        header('Location:../content/Videos.php');
}else {
    $_SESSION["errorMessages"] = $errors;
    isset($_POST["user"]) ? $_SESSION["loginUser"] = $_POST["user"] : null;
   header('Location:../forms/login.php');
}