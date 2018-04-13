<?php
include_once ("../Utils/SessionManagementUtils.php");
checkSession('editEnemyHandler');
include_once("../Utils/Dao.php");
include_once("../Utils/EnemyBuilder.php");

if(isset($_POST['enemyId'])){
    $dao = new Dao();
    $singleEnemyId = $_POST['enemyId'];
    $enemyArray = $dao->getEnemy($singleEnemyId);
    $enemy = $enemyArray;
    setEnemyForSession($enemy);
    //echo "<br><br>". print_r($_SESSION, 1);
}
header("Location:../forms/createCreature.php");