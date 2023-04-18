<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "recherche";

require("include/header.inc.php");
require("include/function.php");

?>
<main>
    <section class="black_background">
        <div class='spacing'>
            <h1>Résultat(s) de la recherche:</h1>
            <?php
            $array = search();
            $i =0;
            echo($array[1]);
            ?>
        </div>
    </section>
    <section class="orange_background">

    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

