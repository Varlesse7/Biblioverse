<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "tech";

require("include/header.inc.php");
?>
<main class="orange_background" >
    <div class="orange_background">
	<a href="#"  onclick="history.back()"><img class="fleche" src="images/arrow-go-back-line.svg" alt="fleche"/></a>
    <?php
    $nasa = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=Pjqxo5xGM1Hr1BvyPIQLyJNh8gJcoua1kWzvxwZr");
    $tableau = json_decode($nasa, true);
    echo('<h1>Premiere partie de notre projet Web</h1>'."\n");
    echo('<p>Image du jour de la nasa</p>'."\n");
    if ($tableau['media_type'] =="image"){
        echo('<img src = "' . $tableau['url'] .'" alt ="nasa"/>'."\n");
    }
    if ($tableau['media_type'] !="image"){
        echo('<iframe src = "' . $tableau['url'] .'" />'."\n");
    }
    echo('<p>Phrase du jour de la nasa</p>'."\n");
    echo('<p>'.$tableau['explanation'].'</p>'."\n");

    echo ('</div>'."\n");
   ?>

</main>
<?php require("include/footer.inc.php"); ?>
</html>

