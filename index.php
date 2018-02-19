<?php
$thisPage = "Landing";
include_once ("lib/pageHeader.php");
include_once ("lib/travelBar.php");
include_once ("lib/list.php");
include_once ("lib/tile.php");
?>
<div class="lengthAdjustable widthDiv creatureBackground">
    <div class="monstersContainer">
        <?php
        createTile();
        createTile();
        createTile();
        createTile();
        createTile();
        createTile();
        ?>
    </div>
</div>
<?php  include_once ("lib/footer.php"); ?>

