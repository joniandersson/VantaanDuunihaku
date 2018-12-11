<?php

// API URL
$url = "http://gis.vantaa.fi/rest/tyopaikat/v1/";
// Gets JSON from API
$data = file_get_contents($url);
// JSON Decode
$items = json_decode($data);
// Show all category
$jobcat = 0;
// Choose show all category
$chosenCat = $items[$jobcat]->ammattiala;

// API URL to specific profession
$AlanURL = "http://gis.vantaa.fi/rest/tyopaikat/v1/" . $chosenCat . "/";
// Get contents of specific profession
$AlanData = file_get_contents($AlanURL);
// JSON Decode specific profession
$AlanIlmoitukset = json_decode($AlanData);


$x = 0;
// Amount of joblistings to show (15 when loading page and +20 every time a user scrolls to the bottom of the job listings)
$ajaxGet = $_POST['showAmount'];
// Amount of joblistings in "All" category
$lukumaara = $items[$jobcat]->lukumäärä;
// Display job listings
while($x < $ajaxGet){
        echo "<tr class='jobListing'><td><strong>"
        . $AlanIlmoitukset[$x]->tyotehtava .
        "</strong><br> <span class='font-weight-light'>"
        . $AlanIlmoitukset[$x]->osoite .  "</span>
            <span class='d-none jobProfession'>". $AlanIlmoitukset[$x]->ammattiala . "</span>
            <span class='d-none jobOrganisation'>". $AlanIlmoitukset[$x]->organisaatio . "</span>
            <span class='d-none jobSearchtime'>". $AlanIlmoitukset[$x]->haku_paattyy_pvm ."</span>
            <span class='d-none jobLink'>". $AlanIlmoitukset[$x]->linkki . "</span>
            <span class='d-none jobKey'>". $AlanIlmoitukset[$x]->tyoavain . "</span>
        </td></tr>";
    $x++;
}
