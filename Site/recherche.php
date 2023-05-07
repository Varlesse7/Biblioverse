<?php
$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "recherche";

require("include/header.inc.php");
require("include/function.php");

?>
<main>

    <section class="black_background">
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
            echo '<a href="#" onclick="history.back()"><img class="fleche" src="images/arrow-go-back-line.svg" alt="fleche" /></a>';
        } elseif ($style_actuel == 'style_nuit.css') {
            echo '<a href="#" onclick="history.back()"><img class="fleche" src="images/arrow-go-back-line-nuit.svg" alt="fleche"/></a>';
        }
        ?>


        <div class='spacing'>
            <h1>Résultat(s) de la recherche:</h1>
            <?php
            save_5_derniers();

            $array = search_google();
            echo($array[0]);

            ecrire_stats();
            ?>

        </div>
        <?php
        $form = '<form class="form" method="get" action = "recherche.php">';
        $form .= '<input type="hidden" name="page_count" value ="' . $array[1] . '" />';
        for ($i = 0; $i < $array[1]; $i++) {
            $form .= '<input class="submit" type="submit" name="page" value ="' . ($i + 1) . '" />';

        }
        $form .= '</form>';
        echo($form);
        ?>
    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

