<?php
$thisPage = "loginForm";
include_once("../lib/pageHeader.php");

//echo print_r($_SESSION,1);
echo   "
        <div class = 'formBackground'><h1 class='formHeader'>Create a Creature</h1>
        <form action='createCreatureHandler.php' method='post' id='creatureForm'>
        <dl>
        <dd><div>Name of Creature:<input type='text' name='name' value='".getIfContains('prevValues', 'name', '')."'><span class ='formNotes'>*Required</span></div>
        <div>". htmlspecialchars(getIfContains('errorMessages', 'name', '')) ."</div></dd>
        <div  ><input type='hidden' name='id' value='". getIfContains('prevValues', 'id', 0) ."'></div>        
        <dt>Attributes:</dt>
        <dd>HP:<input type='number' name='hp' value='". getIfContains('prevValues', 'hp', 10) ."'></dd>
        <dd>AC:<input type='number' name='armorClass' value='". getIfContains('prevValues', 'armorClass', 10) ."'></dd>
        <dd>Attack:<input type='number' name='attack' value='". getIfContains('prevValues', 'attack', 0) ."'></dd>
        <dd>Initiative:<input type='number' name='initiative' value='". getIfContains('prevValues', 'initiative', 0) ."'></dd>
        <dd>Challenge Rating:<input type='number' name='challengeRating' value='". getIfContains('prevValues', 'challengeRating', 0) ."'></dd>
        <dd>Size:
            <select name='size'>
                <option value='diminutive' ";
                    echo getIfContains('prevValues', 'size', 'medium') == 'diminutive' ? 'selected' : '';
                    echo ">Diminutive</option>
                <option value='tiny' ";
                    echo getIfContains('prevValues', 'size', 'medium') == 'tiny' ? 'selected' : '';
                    echo ">Tiny</option>
                <option value='small' ";
                    echo getIfContains('prevValues', 'size', 'medium') == 'small' ? 'selected' : '';
                    echo ">Small</option>
                <option value='medium'";
                    echo getIfContains('prevValues', 'size', 'medium') == 'medium' ? 'selected' : '';
                    echo ">Medium</option>
                <option value='large'";
                    echo getIfContains('prevValues', 'size', 'medium') == 'large' ? 'selected' : '';
                    echo ">Large</option>
                <option value='huge'";
                    echo getIfContains('prevValues', 'size', 'medium') == 'huge' ? 'selected' : '';
                    echo ">Huge</option>
                <option value='gargantuan' ";
                    echo getIfContains('prevValues', 'size', 'medium') == 'gargantuan' ? 'selected' : '';
                    echo ">Gargantuan</option>
                <option value='Colossal' ";
                    echo getIfContains('prevValues', 'size', 'medium') == 'colossal' ? 'selected' : '';
                    echo ">Colossal</option>
            </select>
         <dd>Enemy Type:
            <select name='enemyType'>
                <option value='classedCharacters' ";
                    echo getIfContains('prevValues', 'enemyType', 'classedCharacters') == 'classedCharacters' ? 'selected' : '';
                    echo ">Characters/NPCs</option>
                <option value='humanoids' ";
                    echo getIfContains('prevValues', 'enemyType', 'classedCharacters') == 'humanoids' ? 'selected' : '';
                    echo ">Humanoids</option>
                <option value='animals' ";
                    echo getIfContains('prevValues', 'enemyType', 'classedCharacters') == 'animals' ? 'selected' : '';
                    echo ">Animals</option>
                <option value='magicalCreatures'";
                    echo getIfContains('prevValues', 'enemyType', 'classedCharacters') == 'magicalCreatures' ? 'selected' : '';
                    echo ">Magical Creatures</option>
                <option value='abberations'";
                    echo getIfContains('prevValues', 'enemyType', 'classedCharacters') == 'abberations' ? 'selected' : '';
                    echo ">Abberations</option>
                <option value='custom'";
                    echo getIfContains('prevValues', 'enemyType', 'classedCharacters') == 'custom' ? 'selected' : '';
                    echo ">custom</option>
            </select>
         </dd> 
            
        <dt>Stats:</dt>
        <dd><div>Strength:<input type='number' name='strength' value='". getIfContains('prevValues', 'strength', 10) ."'></div></dd>
        <dd><div>Agility:<input type='number' name='dexterity' value='". getIfContains('prevValues', 'dexterity', 10) ."'></div></dd>
        <dd><div>Constitution:<input type='number' name='constitution' value='". getIfContains('prevValues', 'constitution', 10) ."'></div></dd>
        <dd><div>Intelligence:<input type='number' name='intelligence' value='". getIfContains('prevValues', 'intelligence', 10) ."'></div></dd>
        <dd><div>Wisdom:<input type='number' name='wisdom' value='". getIfContains('prevValues', 'wisdom', 10) ."'></div></dd>
        <dd><div>Charisma:<input type='number' name='charisma' value='". getIfContains('prevValues', 'charisma', 10) ."'></div></dd>
        
        <dt>Saves:</dt>
        <dd><div>Will:<input type='number' name='will' value='". getIfContains('prevValues', 'will', 10) ."'></div></dd>
        <dd><div>Fortitude:<input type='number' name='fortitude' value='". getIfContains('prevValues', 'fortitude', 10) ."'></div></dd>
        <dd><div>Reflex:<input type='number' name='reflex' value='". getIfContains('prevValues', 'reflex', 10) ."'></div></dd>
        
        
        <dt>Skills:</dt>
        <dd><div>Appraise:<input type='number' name='appraise' value='". getIfContains('prevValues', 'appraise', 0) ."'></div></dd>
        <dd><div>Balance:<input type='number' name='balance' value='". getIfContains('prevValues', 'balance', 0) ."'></div></dd>
        <dd><div>Bluff:<input type='number' name='bluff' value='". getIfContains('prevValues', 'bluff', 0) ."'></div></dd>
        <dd><div>Climb:<input type='number' name='climb' value='". getIfContains('prevValues', 'climb', 0) ."'></div></dd>
        <dd><div>Concentration:<input type='number' name='concentration' value='". getIfContains('prevValues', 'concentration', 0) ."'></div></dd>
        <dd><div>Craft:<input type='number' name='craft' value='". getIfContains('prevValues', 'craft', 0) ."'></div></dd>
        <dd><div>Decipher Script:<input type='number' name='decipherScript' value='". getIfContains('prevValues', 'decipher Script', 0) ."'></div></dd>
        <dd><div>Diplomacy:<input type='number' name='diplomacy' value='". getIfContains('prevValues', 'diplomacy', 0) ."'></div></dd>
        <dd><div>Disable Device:<input type='number' name='disableDevice' value='". getIfContains('prevValues', 'disableDevice', 0) ."'></div></dd>
        <dd><div>Disguise:<input type='number' name='disguise' value='". getIfContains('prevValues', 'disguise', 0) ."'></div></dd>
        <dd><div>Escape Artist:<input type='number' name='escapeArtist' value='". getIfContains('prevValues', 'escapeArtist', 0) ."'></div></dd>
        <dd><div>Forgery:<input type='number' name='forgery' value='". getIfContains('prevValues', 'forgery', 0) ."'></div></dd>
        <dd><div>Gather Information:<input type='number' name='gatherInformation' value='". getIfContains('prevValues', 'gatherInformation', 0) ."'></div></dd>
        <dd><div>Handle Animal:<input type='number' name='handleAnimal' value='". getIfContains('prevValues', 'handleAnimal', 0) ."'></div></dd>
        <dd><div>Heal:<input type='number' name='heal' value='". getIfContains('prevValues', 'heal', 0) ."'></div></dd>
        <dd><div>Hide:<input type='number' name='hide' value='". getIfContains('prevValues', 'hide', 0) ."'></div></dd>
        <dd><div>Intimidate:<input type='number' name='intimidate' value='". getIfContains('prevValues', 'intimidate', 0) ."'></div></dd>
        <dd><div>Jump:<input type='number' name='jump' value='". getIfContains('prevValues', 'jump', 0) ."'></div></dd>
        <dd><div>Knowledge:<input type='number' name='knowledge' value='". getIfContains('prevValues', 'knowledge', 0) ."'></div></dd>
        <dd><div>Listen:<input type='number' name='listen' value='". getIfContains('prevValues', 'listen', 0) ."'></div></dd>
        <dd><div>Move Silently:<input type='number' name='moveSilently' value='". getIfContains('prevValues', 'moveSilently', 0) ."'></div></dd>
        <dd><div>Open Lock:<input type='number' name='openLock' value='". getIfContains('prevValues', 'openLock', 0) ."'></div></dd>
        <dd><div>Perform:<input type='number' name='perform' value='". getIfContains('prevValues', 'perform', 0) ."'></div></dd>
        <dd><div>Profession:<input type='number' name='profession' value='". getIfContains('prevValues', 'profession', 0) ."'></div></dd>
        <dd><div>Ride:<input type='number' name='ride' value='". getIfContains('prevValues', 'ride', 0) ."'></div></dd>
        <dd><div>Search:<input type='number' name='search' value='". getIfContains('prevValues', 'search', 0) ."'></div></dd>
        <dd><div>Sense Motive:<input type='number' name='senseMotive' value='". getIfContains('prevValues', 'senseMotive', 0) ."'></div></dd>
        <dd><div>Sleight of Hand:<input type='number' name='sleightOfHand' value='". getIfContains('prevValues', 'sleightOfHand', 0) ."'></div></dd>
        <dd><div>Spellcraft:<input type='number' name='spellcraft' value='". getIfContains('prevValues', 'spellcraft', 0) ."'></div></dd>
        <dd><div>Spot:<input type='number' name='spot' value='". getIfContains('prevValues', 'spot', 0) ."'></div></dd>
        <dd><div>Survival:<input type='number' name='survival' value='". getIfContains('prevValues', 'survival', 0) ."'></div></dd>
        <dd><div>Swim:<input type='number' name='swim' value='". getIfContains('prevValues', 'swim', 0) ."'></div></dd>
        <dd><div>Tumble:<input type='number' name='tumble' value='". getIfContains('prevValues', 'tumble', 0) ."'></div></dd>
        <dd><div>Use Magic Device:<input type='number' name='useMagicDevice' value='". getIfContains('prevValues', 'useMagicDevice', 0) ."'></div></dd>
        <dd><div>Use Rope:<input type='number' name='useRope' value='". getIfContains('prevValues', 'useRope', 0) ."'></div></dd>
        <div></div>
        <script src='../js/creatureForm.js'></script>
        <dt>Weapons:</dt>
        <dd><div>Weapon Name:<input type='text' name='weapon1' value='". htmlspecialchars(getIfContains('prevValues', 'weapon1', 'dagger')) ."'></div>
        <div id='weaponForm1'>Damage/Note:<input type='text' name='damage1' value='". htmlspecialchars(getIfContains('prevValues', 'damage1', '1d4')) ."'></div></dd>
        
        <div><button id='weaponExpansion'>+</button></div>
        
        <dt>Items:</dt>
        <dd><div>Item Name:<input type='text' name='item1' value='". htmlspecialchars(getIfContains('prevValues', 'item1', 'Gold Pieces')) ."'></div>
        <div id='itemForm1'>Value/Note:<input type='text' name='value1' value='". htmlspecialchars(getIfContains('prevValues', 'value1', '100')) ."'></div></dd>
        
        <div><button id='itemExpansion'>+</button></div>
        
        <dt>Abilities:</dt>
        <dd><div>Ability Name:<input type='text' name='ability1' value='". htmlspecialchars(getIfContains('prevValues', 'ability1', '')) ."'></div>
        <div id='abilityForm1'>Note:<input type='text' name='abilityNote1' value='". htmlspecialchars(getIfContains('prevValues', 'abilityNote1', '')) ."'></div></dd>
        
        <div><button id='abilityExpansion'>+</button></div>
        
        <dt>Spells:</dt>
        <dd><div>Spell Name:<input type='text' name='spell1' value='". htmlspecialchars(getIfContains('prevValues', 'spell1', '')) ."'></div>
        <div id='spellForm1'>Prepared/Note:<input type='text' name='spellNote1' value='". htmlspecialchars(getIfContains('prevValues', 'spellNote1', '')) ."'></div></dd>
        
        <div><button id='spellExpansion'>+</button></div>
        
        <dt>Notes:<span class='formNotes'>*1000 Character max</span></dt>
        <dd><textarea name='notes' rows='10' cols='30' form='creatureForm'>". htmlspecialchars(getIfContains('prevValues', 'notes', '')) ."</textarea></dd>
        
        ";
        //<dt>Image:</dt>
        //<dd><input type='file' name='picture'></dd>
        echo "
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
unset($_SESSION['errorMessages']);
unset($_SESSION['prevValues']);
?>