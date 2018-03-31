<?php
$thisPage = "loginForm";
include_once("../lib/pageHeader.php");

echo   "<div class = 'formBackground'><h1 class='formHeader'>Create a Creature</h1>
        <form action='createCreatureHandler.php' method='post'>
        <dl>
        <dd><div>Name of Creature:<input type='text' name='name'><span class ='formNotes'>*Required: Once set cannot be changed</span></div></dd>
                
        <dt>Attributes:</dt>
        <dd>AC:<input type='number' name='ArmorClass' value='". getIfContains('prevValues', 'armorClass', 10) ."'></dd>
        <dd>Attack:<input type='number' name='Attack' value='". getIfContains('prevValues', 'attack', 0) ."'></dd>
        <dd>Initiative:<input type='number' name='Initiative' value='". getIfContains('prevValues', 'armorClass', 0) ."'></dd>
        
        <dt>Stats:</dt>
        <dd><div>Strength:<input type='number' name='Strength' value='". getIfContains('prevValues', 'Strength', 10) ."'></div></dd>
        <dd><div>Agility:<input type='number' name='Agility' value='". getIfContains('prevValues', 'Agility', 10) ."'></div></dd>
        <dd><div>Constitution:<input type='number' name='Constitution' value='". getIfContains('prevValues', 'Constitution', 10) ."'></div></dd>
        <dd><div>Intelligence:<input type='number' name='Intelligence' value='". getIfContains('prevValues', 'Intelligence', 10) ."'></div></dd>
        <dd><div>Wisdom:<input type='number' name='Wisdom' value='". getIfContains('prevValues', 'Wisdom', 10) ."'></div></dd>
        <dd><div>Charisma:<input type='number' name='Charisma' value='". getIfContains('prevValues', 'Charisma', 10) ."'></div></dd>
        
        <dt>Saves:</dt>
        <dd><div>Will:<input type='number' name='Will' value='". getIfContains('prevValues', 'Will', 10) ."'></div></dd>
        <dd><div>Fortitude:<input type='number' name='Fortitude' value='". getIfContains('prevValues', 'Fortitude', 10) ."'></div></dd>
        <dd><div>Reflex:<input type='number' name='Reflex' value='". getIfContains('prevValues', 'Reflex', 10) ."'></div></dd>
        
        
        <dt>Skills:</dt>
        <dd><div>Appraise:<input type='number' name='Appraise' value='". getIfContains('prevValues', 'Appraise', 0) ."'></div></dd>
        <dd><div>Balance:<input type='number' name='Balance' value='". getIfContains('prevValues', 'Balance', 0) ."'></div></dd>
        <dd><div>Bluff:<input type='number' name='Bluff' value='". getIfContains('prevValues', 'Bluff', 0) ."'></div></dd>
        <dd><div>Climb:<input type='number' name='Climb' value='". getIfContains('prevValues', 'Climb', 0) ."'></div></dd>
        <dd><div>Concentration:<input type='number' name='Concentration' value='". getIfContains('prevValues', 'Concentration', 0) ."'></div></dd>
        <dd><div>Craft:<input type='number' name='Craft' value='". getIfContains('prevValues', 'Craft', 0) ."'></div></dd>
        <dd><div>Decipher Script:<input type='number' name='Decipher Script' value='". getIfContains('prevValues', 'Decipher Script', 0) ."'></div></dd>
        <dd><div>Diplomacy:<input type='number' name='Diplomacy' value='". getIfContains('prevValues', 'Diplomacy', 0) ."'></div></dd>
        <dd><div>Disable Device:<input type='number' name='Disable Device' value='". getIfContains('prevValues', 'Disable Device', 0) ."'></div></dd>
        <dd><div>Disguise:<input type='number' name='Disguise' value='". getIfContains('prevValues', 'Disguise', 0) ."'></div></dd>
        <dd><div>Escape Artist:<input type='number' name='Escape Artist' value='". getIfContains('prevValues', 'Escape Artist', 0) ."'></div></dd>
        <dd><div>Forgery:<input type='number' name='Forgery' value='". getIfContains('prevValues', 'Forgery', 0) ."'></div></dd>
        <dd><div>Gather Information:<input type='number' name='Gather Information' value='". getIfContains('prevValues', 'Gather Information', 0) ."'></div></dd>
        <dd><div>Handle Animal:<input type='number' name='Handle Animal' value='". getIfContains('prevValues', 'Handle Animal', 0) ."'></div></dd>
        <dd><div>Heal:<input type='number' name='Heal' value='". getIfContains('prevValues', 'Heal', 0) ."'></div></dd>
        <dd><div>Hide:<input type='number' name='Hide' value='". getIfContains('prevValues', 'Hide', 0) ."'></div></dd>
        <dd><div>Intimidate:<input type='number' name='Intimidate' value='". getIfContains('prevValues', 'Intimidate', 0) ."'></div></dd>
        <dd><div>Jump:<input type='number' name='Jump' value='". getIfContains('prevValues', 'Jump', 0) ."'></div></dd>
        <dd><div>Knowledge:<input type='number' name='Knowledge' value='". getIfContains('prevValues', 'Knowledge', 0) ."'></div></dd>
        <dd><div>Listen:<input type='number' name='Listen' value='". getIfContains('prevValues', 'Listen', 0) ."'></div></dd>
        <dd><div>Move Silently:<input type='number' name='Move Silently' value='". getIfContains('prevValues', 'Move Silently', 0) ."'></div></dd>
        <dd><div>Open Lock:<input type='number' name='Open Lock' value='". getIfContains('prevValues', 'Open Lock', 0) ."'></div></dd>
        <dd><div>Perform:<input type='number' name='Perform' value='". getIfContains('prevValues', 'Perform', 0) ."'></div></dd>
        <dd><div>Profession:<input type='number' name='Profession' value='". getIfContains('prevValues', 'Profession', 0) ."'></div></dd>
        <dd><div>Ride:<input type='number' name='Ride' value='". getIfContains('prevValues', 'Ride', 0) ."'></div></dd>
        <dd><div>Search:<input type='number' name='Search' value='". getIfContains('prevValues', 'Search', 0) ."'></div></dd>
        <dd><div>Sense Motive:<input type='number' name='Sense Motive' value='". getIfContains('prevValues', 'Sense Motive', 0) ."'></div></dd>
        <dd><div>Sleight of Hand:<input type='number' name='Sleight of Hand' value='". getIfContains('prevValues', 'Sleight of Hand', 0) ."'></div></dd>
        <dd><div>Spellcraft:<input type='number' name='Spellcraft' value='". getIfContains('prevValues', 'Spellcraft', 0) ."'></div></dd>
        <dd><div>Spot:<input type='number' name='Spot' value='". getIfContains('prevValues', 'Spot', 0) ."'></div></dd>
        <dd><div>Survival:<input type='number' name='Survival' value='". getIfContains('prevValues', 'Survival', 0) ."'></div></dd>
        <dd><div>Swim:<input type='number' name='Swim' value='". getIfContains('prevValues', 'Swim', 0) ."'></div></dd>
        <dd><div>Tumble:<input type='number' name='Tumble' value='". getIfContains('prevValues', 'Tumble', 0) ."'></div></dd>
        <dd><div>Use Magic Device:<input type='number' name='Use Magic Device' value='". getIfContains('prevValues', 'Use Magic Device', 0) ."'></div></dd>
        <dd><div>Use Rope:<input type='number' name='Use Rope' value='". getIfContains('prevValues', 'Use Rope', 0) ."'></div></dd>
        <div></div>
        
        <dt>Weapons:</dt>
        <dd><div>Weapon Name:<input type='text' name='item1' value='". getIfContains('prevValues', 'item1', 'dagger') ."'></div>
        <div>Damage/Note:<input type='text' name='value1' value='". getIfContains('prevValues', 'value1', '1d4') ."'></div></dd>
        
        <dt>Items:</dt>
        <dd><div>Item Name:<input type='text' name='item1' value='". getIfContains('prevValues', 'Use Rope', 'Gold Pieces') ."'></div>
        <div>Value/Note:<input type='text' name='value1' value='". getIfContains('prevValues', 'Use Rope', '100') ."'></div></dd>
        
        
        <dt>Notes:<span class='formNotes'>*1000 Character max</span></dt>
        <dd><textarea name='textarea' rows='10' cols='30' form='creatureForm'></textarea></dd>
        
        
        <dt>Image:</dt>
        <dd><input type='file' name='picture'></dd>
        
        <div><input type='submit' value='Submit'></div>
     </dl>
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
?>