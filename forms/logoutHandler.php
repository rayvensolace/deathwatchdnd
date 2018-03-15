<?php
include_once("../Utils/SessionManagementUtils.php");
restartFreshSession();
header("Location: ../content/Landing.php");
die;