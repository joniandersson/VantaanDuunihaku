<?php

// Fix API URLs
function fixURL($string){
    if ($string == "http://gis.vantaa.fi/rest/tyopaikat/v1/Lasten päivähoito/"){
        $fixedEncodedUrl = "http://gis.vantaa.fi/rest/tyopaikat/v1/Lasten%20p%C3%A4iv%C3%A4hoito/";
        return $fixedEncodedUrl;
    }else if($string == "http://gis.vantaa.fi/rest/tyopaikat/v1/Tekninen ala/"){
        $fixedEncodedUrl = "http://gis.vantaa.fi/rest/tyopaikat/v1/Tekninen%20ala";
        return $fixedEncodedUrl;
    }else if (stripos($string, "esiopetus") !== false) {
        $fixedEncodedUrl = "http://gis.vantaa.fi/rest/tyopaikat/v1/Varhaiskasvatus%20ja%20esiopetus";
        return $fixedEncodedUrl;
    }else if($string == "http://gis.vantaa.fi/rest/tyopaikat/v1/Nuorisotyö ja liikuntapalvelut/") {
        $fixedEncodedUrl = "http://gis.vantaa.fi/rest/tyopaikat/v1/Nuorisoty%C3%B6%20ja%20liikuntapalvelut";
        return $fixedEncodedUrl;
    }else{
        $url_utf8 = urlencode($string);
        $fixedEncodedUrl = str_replace(['%2F', '%3A', '%C3%B62F'], ['/', ':', 'ö'], $url_utf8);
        return $fixedEncodedUrl;
    }
}

// If a joblisting contains $keyword, return true
function searchWord($title,$keyword){
    if (stripos($title, $keyword) !== false) {
        return true;
    }
}

// Get amount of joblistings for a profession
function getJoblistingAmount($professionID){
    // API URL
    $url = "http://gis.vantaa.fi/rest/tyopaikat/v1/";
    // Gets JSON from API
    $data = file_get_contents($url);
    // JSON Decode
    $items = json_decode($data);

    echo $items[$professionID]->lukumäärä;

}

function professionTitleToID($professionTitle){

    if ($professionTitle == "Kaikki"){
        return "0";
    }else if ($professionTitle == "Opetusala"){
        return "1";
    }else if ($professionTitle == "Lasten Päivähoito"){
        return "2";
    }else if ($professionTitle == "Sosiaalityö"){
        return "3";
    }else if ($professionTitle == "Terveydenhuolto"){
        return "4";
    }else if ($professionTitle == "Hallinto"){
        return "5";
    }else if ($professionTitle == "Kotihoito"){
        return "6";
    }else if ($professionTitle == "Tekninen ala"){
        return "7";
    }else if ($professionTitle == "Nuorisotyö ja liikuntapalvelut"){
        return "8";
    }
}