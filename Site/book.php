<?php
$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "book";

require("include/header.inc.php");
require("include/function.php");

?>
<main class="black_background">
    <section class="black_background">
        <div class='spacing'>
            <?php
            $style_actuel = '';
            if (isset($_GET['style'])) {
                $style_actuel = 'style_' . $_GET['style'] . '.css';
            } elseif (isset($_COOKIE['style'])) {
                $style_actuel = 'style_' . $_COOKIE['style'] . '.css';
            } else {
                $style_actuel = 'style_nuit.css';
            }
            if ($style_actuel == 'style_jour.css') {
                echo '<a href="#" onclick="history.back()"><img class="fleche" src="images/arrow-go-back-line.svg" alt="fleche"/></a>';
            } elseif ($style_actuel == 'style_nuit.css') {
                echo '<a href="#" onclick="history.back()"><img class="fleche" src="images/arrow-go-back-line-nuit.svg" alt="fleche"/></a>';
            }
            ?>


            <?php
            $book = book($_GET['isbn']);
            echo($book[0]);
            echo("</div>");

            echo("</section>");
            echo("<section class='orange_background'>");
            echo("<div class='spacing'>");

            echo("<h2>Autres titres de l'auteur / Autres titres du meme genre:</h2>");
            echo($book[1]);
            echo("</div>");

            echo("</<section>");
            ?>


</main>

<?php require("./include/footer.inc.php"); ?>
</html>

