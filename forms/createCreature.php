<?php
$thisPage = "loginForm";
include_once("../lib/pageHeader.php");
echo   "<form action='createCreatureHandler.php' method='post'>
        <div>Name of Creature:<input type='text' name='name'></div>
        <div><p>Attributes</p>
        <div>AC:<input type='number' name='Strength'></div>
        <div>Base Attack:<input type='number' name='Strength'></div>
        <div>Initiative:<input type='number' name='Strength'></div>
        </div><p>Stats:</p>
        <div>Name of Creature:<input type='text' name='name'></div>
        <div>Strength:<input type='number' name='Strength'></div>
        <div>Agility:<input type='number' name='Strength'></div>
        <div>Constitution:<input type='number' name='Strength'></div>
        <div>Intelligence:<input type='number' name='Strength'></div>
        <div>Wisdom:<input type='number' name='Strength'></div>
        <div>Charisma:<input type='number' name='Strength'></div>
        </div><div><p>Saves:</p>
        <div>Will:<input type='number' name='Strength'></div>
        <div>Fortitude:<input type='number' name='Strength'></div>
        <div>Reflex:<input type='number' name='Strength'></div>
        </div>
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
?>