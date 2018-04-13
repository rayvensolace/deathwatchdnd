<?php
include_once ("../Utils/SessionManagementUtils.php");
include_once("../Utils/Validators.php");
include_once("../Utils/Dao.php");
include_once("../Utils/EnemyBuilder.php");
checkSession("createCreatureHandler");
$dao = new Dao();

echo print_r($_POST,1);
$errors = array();
$enemy = createEnemyFromPost();

if(!isset($_POST["name"]) || empty(trim($_POST["name"]))){
        $errors["name"] = "Must enter a unique name";
}else{
    $name = $_POST["name"];
    if($enemy->id == 0) {
        if (!$dao->checkEnemyAvailability($name, $enemy->id)) {
            $errors["name"] = "There already exists an enemy with that name";
        }
    }else{
        if(!$dao->checkValidEnemy($enemy->name, $enemy->id)){
            $errors["name"] = "Error while attempting to update enemy";
        }
    }
}

if(empty($errors)) {
    if ($enemy->id == 0) {
        $dao->addEnemy($enemy);
        echo 'adding enemy';
    }else{
        $dao->updateEnemy($enemy);
        echo 'updating enemy';
    }
    header("Location:../content/CreaturesNCharacters.php");
}else{
    echo 'returning to create';
    setEnemyForSession($enemy);
    $_SESSION["errorMessages"] = $errors;
    header("Location:../forms/createCreature.php");
}

