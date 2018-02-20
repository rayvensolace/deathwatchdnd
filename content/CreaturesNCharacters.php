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
            <div class="widthDiv filterBar">
                <div class="inlineContainer"></div>
                <div class="centerDiv">
                <form class="thinForm">
                    <ol class="inlineList">
                        <li class="filterListItem">Whose Creatures
                            <ol class="inlineList">
                                <li>
                                    <div class="listItem"><input type="checkbox" value="Public" name="Public">Public Creatures  </div>
                                </li>
                                <li>
                                    <div class="listItem"><input type="checkbox" value="Private" name="My Creatures">My Creatures  </div>
                                </li>
                            </ol>
                        </li>
                        <li class="filterListItem">Creature Type
                            <select class="filterDropDown" name="types">
                                <option value="None">No Type Filter</option>
                                <option value="ClassedCharacters">Characters/NPCs</option>
                                <option value="Humanoids">Humanoids</option>
                                <option value="Animals">Animals</option>
                                <option value="MagicalCratures">Magical Creatures</option>
                                <option value="Abberations">Abberations</option>
                                <option value="Custom">Custom</option>
                            </select>
                        </li>
                        <li class="filterListItem">Challenge Rating
                            <select class="filterDropDown" name="chalengeRatings">
                                <option value="CR1">1</option>
                                <option value="CR1">2</option>
                                <option value="CR1">3</option>
                                <option value="CR1">4</option>
                                <option value="CR1">5</option>
                                <option value="CR1">6</option>
                                <option value="CR1">7</option>
                                <option value="CR1">8</option>
                                <option value="CR1">9</option>
                                <option value="CR1">10</option>
                                <option value="CR1">11</option>
                                <option value="CR1">12</option>
                                <option value="CR1">13</option>
                                <option value="CR1">14</option>
                                <option value="CR1">15</option>
                                <option value="CR1">16</option>
                                <option value="CR1">17</option>
                                <option value="CR1">18</option>
                                <option value="CR1">19</option>
                                <option value="CR1">20</option>
                            </select>
                        </li>
                    </ol>
                </form>
                </div>
                <div class="inlineContainer"></div>
            </div>

            <div class="tilesContainer">
           <?php
                $list = ['a'=>'a','ab'=>'b','c'=>'c','d'=>'d','e'=>'e'];
                createCreatureTile($list);
                createCreatureTile($list);
                createCreatureTile($list);
                createCreatureTile($list);
                createCreatureTile($list);
                createCreatureTile($list);
                createCreatureTile($list);
                createCreatureTile($list);
                createCreatureTile($list);
                createCreatureTile($list);
            ?>
            </div>
        </div>
    </div>
<?php
       include_once ("../lib/footer.php");

?>