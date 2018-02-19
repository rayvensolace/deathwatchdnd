<?php
$thisPage = "CreaturesNCharacters";
     include_once ("../lib/pageHeader.php");
     include_once ("../lib/travelBar.php");
     include_once ("../lib/list.php");
     include_once ("../lib/tile.php");
     ?>

    <div class="creatureBackground widthDiv" style="height: 100%">
        <div class="basicInfoSlider inlinePane lengthAdjustable">
            <?php
            if (!defined('PDO::ATTR_DRIVER_NAME')) {
                echo 'PDO unavailable';
            }else{
                  echo "There is support for PDO";
            } ?>
            <form>
                <?php
                list_item('monster1');
                list_item('monster2');
                list_item('monster3');
                list_item('monster4');
                list_item('monster5');
                list_item('monster6');
                list_item('monster7');
                list_item('monster8');
                list_item('monster9');
                ?>
            </form>
            <button class="createButton" onclick=" href="campaignForm.html" type="button">Create Creature or Character</button>
        </div>
        <div class="creatureContent inlinePane lengthAdjustable">
            <div>
                <form>

                </form>
            </div>
           Some Creatures
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
    </div>
<?php
       include_once ("../lib/footer.php");

?>