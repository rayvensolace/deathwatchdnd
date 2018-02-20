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
            <div class="widthDiv filterBar">
                <div class="inlineContainer"></div>
                <div>
                <form class="thinForm">
                    <ul class="inlineList">
                        <li class="filterListItem"><div>How To Guides<input type="checkbox" name="howTo" value="howTo"></div></li>
                        <li class="filterListItem"><div>Game Sessions<input type="checkbox" name="sessions" value="howTo"></div></li>
                    </ul>
                </form>
                </div>
                <div class="inlineContainer"></div>
            </div>
            Right Pane
            <div class="tilesContainer bottomDiv">
                <?php
                createVideoTile("videoImage", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png");
                createVideoTile("videoImage", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png");
                createVideoTile("videoImage", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png");
                createVideoTile("videoImage", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png");
                createVideoTile("videoImage", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png");
                createVideoTile("videoImage", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png");
                createVideoTile("videoImage", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png");
                createVideoTile("videoImage", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png");
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once ("../lib/footer.php");
       ?>http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png