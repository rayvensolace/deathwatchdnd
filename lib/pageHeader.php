<html>
<head>
    <link rel="stylesheet" href="/baseStyle.css">
</head>
<body>
    <?php
    if ($thisPage=="Landing"){
      echo "<div id=\"LandingHeader\" class=\"header\"> Welcome </div>";
    }else if ($thisPage=="CreaturesNCharacters"){
        echo "<div id=\"creatureBar\" class=\"header\"> Creatures & Characters 
                <button id=\"loginButton\" onclick=\"href=\"form.html\" type=\"button\">Login</button>
              </div>";
    }else if ($thisPage=="Campaigns"){
        echo "<div id=\"campaignBar\" class=\"header\"> Campaigns </div>";
    }else if ($thisPage=="Videos"){
        echo "<div id=\"videoBar\" class=\"header\"> Videos </div>";
    }
    ?>