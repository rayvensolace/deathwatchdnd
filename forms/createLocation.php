<?php
$thisPage = "campaignForm";
include_once("../lib/pageHeader.php");
include_once("../lib/list.php");
echo   "<form class='thinForm' action='createLocationHandler.php' method='post'>
        <div>Type in what you want to know for this location:<p></p><textarea name='textarea' rows='10' cols='30' form='locationForm'></textarea>
        </div>
        <div class=''>What locations are there in this section:";
$list;
for($i = 1; $i < 15 ; $i++){
    $list[$i] = "Enemies ".$i;
}
createCheckboxList($list);
echo"       </div>
        <div><input type='submit' value='Submit'></div>
     </form>
</body>
    <footer class='footer widthDiv'>
        <div class='inlineContainer'></div>
        <div class='centerDiv'>
                You are filling out a form
        </div>
        <div class='inlineContainer'></div></footer>
</html>";