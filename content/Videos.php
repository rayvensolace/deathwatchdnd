<?php
$thisPage = "Videos";
    include_once ("../lib/pageHeader.php");
    include_once ("../lib/travelBar.php");
    include_once ("../lib/list.php");
    include_once ("../lib/tile.php");
    ?>
    <div class="creatureBackground widthDiv dualPaneContent" style="height: 100%">
        <div class="basicInfoSlider inlinePane lengthAdjustable">
            <form>
                <?php
                $list;
                for($i = 1; $i < 15 ; $i++){
                $list[$i] = "Video ".$i;
                }
                    createCheckboxList($list);
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
            <div class="tilesContainer bottomDiv">
                <?php
                    $videos;
                    for($i = 0; $i < 20; $i++){
                        $video = ['videoName' => "Video Image ".$i, 'httptag' => "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png", 'image' => "http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png"];
                        $videos[$i] = $video;
                        /*createVideoTile($video);*/
                    }
                    createTileList($videos, 'video');
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once ("../lib/footer.php");
       ?>http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4f5.png