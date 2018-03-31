<?php
$thisPage = "Landing";
include_once ("../lib/pageHeader.php");
include_once ("../lib/travelBar.php");
include_once ("../lib/list.php");
include_once ("../lib/tile.php");
?>
<div class="lengthAdjustable widthDiv creatureBackground">
    <div style="flex-direction: column">
        <div class="widthDiv"><div class="inlineContainer"></div><div id="intro" ><p>Welcome to Deathwatch's Sponsered website.</p>
        <p>This is a site for both new players and seasoned veterans.</p>
        <p>A place where fledgling players can find tutorials, grizzled DMs can have assistance with managing all of those resources they spend an inhuman number of hours creating, and both can find some possibly interesting side content provided by Deathwatch.</p>
                <p>Enjoy</p></div><div class="inlineContainer"></div></div>

    <div class="tilesContainer">
        <?php
        for($i = 0; $i < 20; $i++){
            $video = ['videoName' => "Video Image ".$i, 'httptag' => "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", 'image' => "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png"];
            createVideoTile($video);
        }
        ?>
    </div>

    </div>
</div>
<?php  include_once ("../lib/footer.php"); ?>

