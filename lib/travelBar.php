<?php
include_once ("../Objects/Nerd.php");
?>
<div <?php if ($thisPage=="CreaturesNCharacters"){
    echo " id='creatureBar' class='widthDiv'> " ;
}else if ($thisPage=="Campaigns"){
    echo " id='campaignBar' class='widthDiv'> ";
}else if ($thisPage=="Videos"){
    echo "id='videoBar' class='widthDiv'>";
}else if ($thisPage=="Landing"){
    echo "id='landingBar' class='widthDiv'>";
}?>
<div class="widthDiv">
<div class="inlineContainer"></div>
<div class="centerDiv">
<ol class="inlineList">
    <?php if ($thisPage=="Landing") {
        echo "<li> <div class='listSurround'><a href='/forms/guestLogin.php'><div class='travelList' >Visit as Guest</div></a></div></li> ";
        echo "<li> <div class='listSurround'><a href='/forms/login.php'><div class='travelList'>Login</div></a></div></li>";
        echo "<li> <div class='listSurround'><a href='/forms/createProfile.php'><div class='travelList'>Create Profile</div></a></div></li>";
    }else if ($thisPage=="CreaturesNCharacters"){
        echo "<li> <div class='currentSurround'><div class='travelList' >Creatures</div></div></li> ";
        echo "<li> <div class='listSurround'><a href='/content/Campaigns.php'><div class='travelList'>Campaigns</div></a></div></li>";
        echo "<li> <div class='listSurround'><a href='/content/Videos.php'><div class='travelList'>Videos</div></a></div></li>";
    }else if ($thisPage=="Campaigns"){
        echo "<li> <div class='listSurround'><a href='CreaturesNCharacters.php'><div class='travelList' >Creatures</div></a></div></li> ";
        echo "<li> <div class='currentSurround'><div class='travelList'>Campaigns</div></div></li>";
        echo "<li> <div class='listSurround'><a href='/content/Videos.php'><div class='travelList'>Videos</div></a></div></li>";
    }else if ($thisPage=="Videos"){
        echo "<li> <div class='listSurround'><a href='/content/CreaturesNCharacters.php'><div class='travelList' >Creatures</div></a></div></li> ";
        echo "<li> <div class='listSurround'><a href='/content/Campaigns.php'><div class='travelList'>Campaigns</div></a></div></li>";
        echo "<li> <div class='currentSurround'><div class='travelList'>Videos</div></a></div></li>";
    }
?>
</ol>
</div>
<div class="inlineContainer"></div>
    <?php
    if ($thisPage != "Landing"){
        if(isset($_SESSION['NERD'])){
            $nerd = unserialize($_SESSION['NERD']);
            if($nerd->getName() != 'Guest'){
                    echo "<div class = 'rightDiv profileName' ><a href='../forms/createProfile.php'>".   htmlspecialchars($nerd->getName()) . "</a></div>";
                    echo "<a href='../forms/logoutHandler.php'> <button id='loginButton' class='rightDiv' type='button'>Logout</button></a>";
            }else{
                    echo "<div class = 'rightDiv profileName' >".  $nerd->getName() . "</div>";
                    echo "<a href= '../forms/login.php'><button id='loginButton' class='rightDiv' type='button'>Login</button></a>";
            }
        }
    }
    ?>
</div>
</div>


