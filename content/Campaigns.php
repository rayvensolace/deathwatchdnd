<?php

    $thisPage = "Campaigns";
    include_once ("../lib/pageHeader.php");
    include_once ("../lib/travelBar.php");
    include_once ("../lib/list.php");
    include_once ("../lib/tile.php");
?>
    <div class="creatureBackground widthDiv dualPaneContent" style="height: 100%">
        <div class="basicInfoSlider inlinePane lengthAdjustable">
           <div class="topDiv">
               <form action="createCampaignSection.php" method="post">
                <div class="filterBar">Filter<select name="dropdown">
                        <option value="Value1"> Campaign Setting 1</option>
                        <option value="Value2"> Campaign Setting 2</option>
                        <option value="Value3"> Campaign Setting 3</option>
                        <option value="Value4"> Campaign Setting 4</option>
                        <option value="Value5"> Campaign Setting 5</option>
                    </select>
                </div>
                </form>
           </div>
            <div>
                Left pane
                <form>
                    <?php
                    list_item('campaignSection1');
                    list_item('campaignSection2');
                    list_item('campaignSection3');
                    list_item('campaignSection4');
                    list_item('campaignSection5');
                    list_item('campaignSection6');
                    list_item('campaignSection7');
                    list_item('campaignSection8');
                    list_item('campaignSection9');
                    ?>
                </form>
            </div>
            <button class="createButton" onclick=" href="campaignForm.html" type="button">Create Campaign Location</button>
            <button class="createButton" onclick=" href="campaignForm.html" type="button">Create Campaign Section</button>
        </div>
        <div class="creatureContent inlinePane">
            <div class="topDiv campaignTop" style="display:inline-flex">
                <div class="campaignTopLeft">
                    campaign text
                </div>
                <div class="campaignNotes">
                Campaign notes
                </div>
            </div>
            <div class="lengthAdjustable">
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
    </div>
<?php
include_once ("../lib/footer.php");
?>
