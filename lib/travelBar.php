<div <?php if ($thisPage=="CreaturesNCharacters"){
    echo " id=\"creatureBar\" class=\"travelBar\"> " ;
}else if ($thisPage=="Campaigns"){
    echo " id=\"campaignBar\" class=\"travelBar\"> ";
}else if ($thisPage=="Videos"){
    echo "id=\"videoBar\" class=\"travelBar\">";
}?>
<div class="centerList">
<ol class="inlineList">
    <?php if ($thisPage=="CreaturesNCharacters"){
        echo "<li> <div class=\"currentSurround\"><div class=\"travelList\" >Creatures</div></div></li> ";
        echo "<li> <div class=\"listSurround\"><a href=\"Campaigns.php\"><div class=\"travelList\">Campaigns</div></a></div></li>";
        echo "<li> <div class=\"listSurround\"><a href=\"Videos.php\"><div class=\"travelList\">Videos</div></a></div></li>";
    }else if ($thisPage=="Campaigns"){
        echo "<li> <div class=\"listSurround\"><a href=\"CreaturesNCharacters.php\"><div class=\"travelList\" >Creatures</div></a></div></li> ";
        echo "<li> <div class=\"currentSurround\"><div class=\"travelList\">Campaigns</div></div></li>";
        echo "<li> <div class=\"listSurround\"><a href=\"Videos.php\"><div class=\"travelList\">Videos</div></a></div></li>";
    }else if ($thisPage=="Videos"){
        echo "<li> <div class=\"listSurround\"><a href=\"CreaturesNCharacters.php\"><div class=\"travelList\" >Creatures</div></a></div></li> ";
        echo "<li> <div class=\"listSurround\"><a href=\"Campaigns.php\"><div class=\"travelList\">Campaigns</div></a></div></li>";
        echo "<li> <div class=\"currentSurround\"><div class=\"travelList\">Videos</div></a></div></li>";
    }
?>
</div>
</ol>
</div>

