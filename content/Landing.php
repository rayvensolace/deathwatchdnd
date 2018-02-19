<?php
$thisPage = "Landing";
    include_once ("lib/pageHeader.php");
include_once ("lib/travelBar.php");
include_once ("lib/tile.php");
    ?>
    <div class="lengthAdjustable dualPaneContent widthDiv">
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
<?php  include_once ("/../lib/footer.php"); ?>

