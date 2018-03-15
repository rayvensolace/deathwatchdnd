<?php
session_start();
include_once("../Objects/Nerd.php");
//print_r(isset($_COOKIE) ? isset($_COOKIE["validation"])? $_COOKIE["validation"]: "There is no validation in Cookie <br>" : "There is no Cookie <br><br>");
function checkSession($thisPage){
    if( $thisPage == "Landing" || $thisPage == "loginForm"){
        return true;
    }else if(isset($_SESSION["NERD"])) {

        //echo "Logged on for Nerd <br>";
        //echo print_r($_SESSION["NERD"],1);
        //echo "<br>". print_r($_COOKIE,1 );
        $nerd = unserialize($_SESSION['NERD']);
        if (isset($_COOKIE['validation']) && $nerd->validateCookie($_COOKIE['validation'])) {
            return true;
        }else {
            $_SESSION["RETURN"] = $_GET;
            $_SESSION["MESSAGE"] = "Your token has expired. Please re-login to vew that page";
        }
    }else {
        $_SESSION["RETURN"] = $_GET;
        $_SESSION["MESSAGE"] = "Please login to vew that page";
    }
        echo "Returning to login";
        header("Location: ../forms/login.php");
}

function restartFreshSession(){
    session_regenerate_id();
    session_destroy();
    session_start();
}