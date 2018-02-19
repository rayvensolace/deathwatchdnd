<?php
$thisPage = "Videos";
    include_once ("../lib/pageHeader.php");
    include_once ("../lib/travelBar.php");
    include_once ("../lib/list.php");
    include_once ("../lib/tile.php");
    ?>
    <div class="creatureBackground widthDiv dualPaneContent" style="height: 100%">
        <div class="basicInfoSlider inlinePane lengthAdjustable">
            Left pane
            <form>
                <?php
                list_item('video1');
                list_item('video2');
                list_item('video3');
                list_item('video4');
                list_item('video5');
                list_item('video6');
                list_item('video7');
                list_item('video8');
                list_item('video9');
                ?>
            </form>
        </div>
        <div class="creatureContent inlinePane lengthAdjustable">
            Right Pane
            <div class="monstersContainer bottomDiv">
                <?php
                createTile();
                createTile();
                createTile();
                createTile();
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once ("../lib/footer.php");
       ?>