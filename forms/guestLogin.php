<?php
session_start();
include_once("../Objects/Nerd.php");
$nerd = new Nerd("Guest", 0,"noemail@na.com", "secretGuestCookieEncoding", 3);
setcookie("validation", $nerd->getSecret(), time() + 60*60, "/");
$_SESSION["NERD"] = serialize($nerd);
print_r($_COOKIE,1);
header('Location:../content/Videos.php');