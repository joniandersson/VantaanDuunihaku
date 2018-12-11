<?php

// Store search term in variable
$hakusana = $_POST['sanahaku'];


// API ID of professions will be stored here
$categories = array();
// All professions to check for
$checks = array("kaikki","terveydenhuolto","sosiaalityo","varhaiskasvatus","opetusala","hallinto","nuorisotyö","tekninen",
"kotihoito");

// Calculate amount of prosessions to check for
$checkNum = count($checks);
// While loop to check which professions were chosen
$y = 0;
while($y < $checkNum){
    if (isset($_POST[$checks[$y]])){
        // If profession y was chosen, then add its API profession ID to $categories array
        array_push($categories, $y);
        $y++;
    }else{
        // Else move on to the next profession
        $y++;
    }
}

// API URL
$url = "http://gis.vantaa.fi/rest/tyopaikat/v1/";
// Gets JSON from API
$data = file_get_contents($url);
// JSON Decode
$items = json_decode($data);

// Count how many profession categories were chosen and store value in variable
$checkCats = count($categories);

$url = $_SERVER['REQUEST_URI'];

// If no professions were chosen, show all professions using keyword search
if($checkCats == "0" && $url = "/search.php"){
    echo "
       <thead>
         <tr>
           <th class='text-white' style='background: rgb(66,139,202)'>Avoimet työpaikat hakusanalla: $hakusana</th>
         </tr>
       </thead>
    ";
    include("keywordSearch.php");
}else{
$z = 0;
// While loop to display the chosen profession categories open job listings
while($z < $checkCats){
    // Chosen category begins with the first array value inside the chosen profession categories array
    // And then continues to loop trough the chosen professions array to display them all
    $chosenCat = $items[$categories[$z]]->ammattiala;
    $chosenCatListingAmount =  $items[$categories[$z]]->lukumäärä;
    $catNumber = $categories[$z];

    // API URL to specific profession
    $AlanURL = "http://gis.vantaa.fi/rest/tyopaikat/v1/" . $chosenCat . "/";
    // Some API links use special characters so function fixURL enables file_get_contents to read
    $AlanData = file_get_contents(fixURL($AlanURL));
    // JSON Decode
    $AlanIlmoitukset = json_decode($AlanData);

    // Table header that displays which professions job listings are shown below
    echo "<th class='text-white' style='background: rgb(66,139,202)'>Avoimet Työpaikat Ammattiryhmässä: " . $chosenCat . "</th>";


    $x = 0;
    // Get amount of job listings in chosen profession category
    $lukumaara = $items[$categories[$z]]->lukumäärä;
    // Nested while loop which displays all job listings inside chosen profession category
    while($x < $lukumaara) {
        // If searchword is used run this
        if(!empty($_POST['sanahaku'])){
        // Variable holding current profession title and job title
        $job = $AlanIlmoitukset[$x]->ammattiala . $AlanIlmoitukset[$x]->tyotehtava;
        // If profession title or job title contains the search word, then display them
        if (searchWord($job, $hakusana) == true) {
            echo "<tr class='jobListing'><td><strong>" . $AlanIlmoitukset[$x]->tyotehtava
                . "</strong><br><span class='font-weight-light'> " . $AlanIlmoitukset[$x]->osoite .
                "</span>
            <span class='d-none jobProfession'>" . $AlanIlmoitukset[$x]->ammattiala . "</span>
            <span class='d-none jobOrganisation'>" . $AlanIlmoitukset[$x]->organisaatio . "</span>
            <span class='d-none jobSearchtime'>" . $AlanIlmoitukset[$x]->haku_paattyy_pvm . "</span>
            <span class='d-none jobLink'>" . $AlanIlmoitukset[$x]->linkki . "</span>
            <span class='d-none jobKey'>" . $AlanIlmoitukset[$x]->tyoavain . "</span>
            </td></tr>";
            $x++;
        }else{
            $x++;
        }
        }else{
            echo "<tr class='jobListing'><td><strong>" . $AlanIlmoitukset[$x]->tyotehtava
                . "</strong><br><span class='font-weight-light'> " . $AlanIlmoitukset[$x]->osoite .
                "</span>
            <span class='d-none jobProfession'>" . $AlanIlmoitukset[$x]->ammattiala . "</span>
            <span class='d-none jobOrganisation'>" . $AlanIlmoitukset[$x]->organisaatio . "</span>
            <span class='d-none jobSearchtime'>" . $AlanIlmoitukset[$x]->haku_paattyy_pvm . "</span>
            <span class='d-none jobLink'>" . $AlanIlmoitukset[$x]->linkki . "</span>
            <span class='d-none jobKey'>" . $AlanIlmoitukset[$x]->tyoavain . "</span>
            </td></tr>";
            $x++;
        }

    }
    $z++;
}
}