$(document).ready(function (){

    $("input[name='campaigns']").change(function(event){
        var $campaignId = this.value;
        var $locationId = document.getElementsByName('locationDropDown').item(0).value;
        window.location = '/content/Campaigns.php?campSec='+$campaignId+'&loc='+$locationId;
        //alert("Change in Campaign Radial LocationId:" + $locationId +" Campaign Section Id:" + $campaignId);
    });



    $("select[name='locationDropDown']").change(function(event){
            var $campaignRadios = document.getElementsByName('campaigns');//Thank you stack overflow
            var $campaignId;
            for (var i=0, len=$campaignRadios.length; i<len; i++) {
                if ( $campaignRadios[i].checked ) { // radio checked?
                    $campaignId = $campaignRadios[i].value; // if so, hold its value in val
                    break; // and break out of for loop
                }
            }
            var $locationId = this.value;
            window.location = '/content/Campaigns.php?campSec='+$campaignId+'&loc='+$locationId;
            //alert("Change in Location Dropdown LocationId:" + $locationId +" Campaign Section Id:" + $campaignId);
    });
});