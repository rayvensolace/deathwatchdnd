<?php
$thisPage = "campaignForm";
include_once("../lib/pageHeader.php");
include_once("../lib/list.php");
echo   "<div class = 'formBackground'>

        <form class='thinForm' action='createCampaignSectionHandler.php' method='post'>
        <div>Name of Section: <input type='text' name='locationName'><span class = 'formNotes'>*Required: Once set cannot be changed</span></div>
        <div>Type in what you want to know for this section:<p></p><textarea name='textarea' rows='30' cols='100' form='campaignForm'></textarea>
        </div>
        <div class=''>What locations are there in this section:";
                   $list;
                    for($i = 1; $i < 15 ; $i++){
                        $list[$i] = "Location ".$i;
                    }
                    createCheckboxList($list);
 echo"       </div>
        <div><input type='submit' value='Submit'></div>
     </form>
     </div>
</body>
    <footer class='footer widthDiv'>
        <div class='inlineContainer'></div>
        <div class='centerDiv'>
                You are filling out a form
        </div>
        <div class='inlineContainer'></div></footer>
</html>";