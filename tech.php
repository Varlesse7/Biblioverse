<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "tech";

require("include/header.inc.php");
?>
<main>
    <?php
    $nasa = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=Pjqxo5xGM1Hr1BvyPIQLyJNh8gJcoua1kWzvxwZr");
    $tableau = json_decode($nasa, true);
    echo('<h1>Premiere partie de notre projet Web</h1>');
    echo('<p>Image du jour de la nasa</p>');
    if ($tableau['media_type'] =="image"){
        echo('<img src = "' . $tableau['url'] .'" \>');
    }
    if ($tableau['media_type'] !="image"){
        echo('<iframe src = "' . $tableau['url'] .'" \>');
    }
    echo('<p>Phrase du jour de la nasa</p>');
    echo('<p>'.$tableau['explanation'].'</p>');

    echo('<p>Voici les informations lier a votre IP dependant de la manière dont on la traite</p>');
    echo('<p>1ere méthode :(xml)</p>');


    $visitor_ip = $_SERVER['REMOTE_ADDR'];
    $geoplugin_url = "http://www.geoplugin.net/xml.gp?ip=$visitor_ip";
    $xml_data = file_get_contents($geoplugin_url);
    $xml = new SimpleXMLElement($xml_data);

    $city = $xml->geoplugin_city;
    $region = $xml->geoplugin_region;
    $country = $xml->geoplugin_countryName;
    $tonIP=$xml->geoplugin_request;
    echo ("<p>Ton ip: $visitor_ip</p>");
    echo ("<p>Ta position: $city, $region, $country</p>");

    echo('<p>2eme méthode :(json)</p>');

    $geoplugin_url_json = file_get_contents("https://ipinfo.io/$visitor_ip/geo");
    $ip = json_decode($geoplugin_url_json, true);

    $city2 = $ip['city'];
    $region2 = $ip['region'];
    $country2 = $ip['country'];
    $tonIP2 = $ip['ip'];
    echo ("<p>Ton ip: $tonIP</p>");

    echo ("<p>Ta position: $city2, $region2, $country2</p>");

    echo('<p>3eme méthode :(whatismyip)</p>');

    $url = "https://api.whatismyip.com/ip-address-lookup.php?key=efea57a39435989c1644939529cc21be&input=$visitor_ip&output=xml";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    curl_close($ch);

    $xml = simplexml_load_string($response);

    $city3 = $xml->xpath("//city");

    $country3 = $xml->xpath("//country");

    $region3 = $xml->xpath("//region");


    echo("<p>Ton ip : $visitor_ip </p>");

    echo("<p>Position : ".$city3[0].','.$country3[0].','.$region3[0]."</p>");


    ?>

</main>
<?php require("include/footer.inc.php"); ?>
</html>

