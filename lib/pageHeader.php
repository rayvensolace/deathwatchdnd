<?php
include_once("../Utils/SessionManagementUtils.php");
checkSession($thisPage)
?>
<html>
<title>Deathwatch D&D</title>
<head>
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Contrail+One" rel="stylesheet">
    <link rel="stylesheet" href="/baseStyle.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
</head>
<body>
<!--    --><?php
    if ($thisPage=="Landing") {
        echo "<div id=\"LandingHeader\" class=\"header\"> Welcome </div>";
    }
    ?>