$(document).ready(function (){
    var $weaponsForm = 1;
    var $itemsForm = 1;
    var $abilitiesForm = 1;
    var $spellsForm = 1;



    $("#weaponExpansion").click(function(event){
        event.preventDefault();
        var $newWeaponForm = "";
        var $oldweaponForm = "#";
        $oldweaponForm = $oldweaponForm.concat("weaponForm",$weaponsForm.toString());
        $weaponsForm = $weaponsForm + 1;
        $newWeaponForm = $newWeaponForm.concat( "<dd><div>Weapon Name:<input type='text' name='weapon", $weaponsForm, "' ></div><div id='weaponForm",$weaponsForm,"'>Damage/Note:<input type='text' name='damage",$weaponsForm,"'></div></dd>");
        $($oldweaponForm).after($newWeaponForm);
    });

    $("#itemExpansion").click(function(event){
        event.preventDefault();
        var $newItemForm = "";
        var $oldItemForm = "#";
        $oldItemForm = $oldItemForm.concat("itemForm",$itemsForm.toString());
        $itemsForm = $itemsForm + 1;
        var $newItemForm = $newItemForm.concat( "<dd><div>Item Name:<input type='text' name='item", $itemsForm, "' ></div> <div id='itemForm",$itemsForm,"'>Value/Note:<input type='text' name='value",$itemsForm,"' ></div></dd>");
        $($oldItemForm).after($newItemForm);
    });

    $("#abilityExpansion").click(function(event){
        event.preventDefault();
        var $newAbilitiesForm = "";
        var $oldAbilitiesForm = "#";
        $oldAbilitiesForm = $oldAbilitiesForm.concat("abilityForm", $abilitiesForm.toString());
        $abilitiesForm = $abilitiesForm + 1;
        $newAbilitiesForm = $newAbilitiesForm.concat( "<dd><div>Ability Name:<input type='text' name='ability", $abilitiesForm, "' ></div> <div id='abilityForm",$abilitiesForm,"'>Note:<input type='text' name='abilityNote",$abilitiesForm,"' ></div></dd>");
        $($oldAbilitiesForm).after($newAbilitiesForm);
    });

    $("#spellExpansion").click(function(event){
        event.preventDefault();
        var $newSpellsForm = "";
        var $oldSpellsForm = "#";
        $oldSpellsForm = $oldSpellsForm.concat("spellForm", $spellsForm.toString());
        $spellsForm = $spellsForm + 1;
        $newSpellsForm = $newSpellsForm.concat( "<dd><div>Spell Name:<input type='text' name='spell", $spellsForm, "' ></div> <div id='spellForm",$spellsForm,"'>Prepared/Note:<input type='text' name='spellNote",$spellsForm,"' ></div></dd>");
        $($oldSpellsForm).after($newSpellsForm);
    });
});