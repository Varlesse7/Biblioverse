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
            echo '<a href="#" onclick="history.back()"><img src="images/arrow-go-back-line.svg" width="100" height="100"></a>';
        } elseif ($style_actuel == 'style_nuit.css') {
            echo '<a href="#" onclick="history.back()"><img src="images/arrow-go-back-line-nuit.svg" width="100" height="100"></a>';
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
        $form = '<form method="get" action = "recherche.php">';
        $form .= '<input type="hidden" name="page_count" value ="' . $array[1] . '" />';
        for ($i = 0; $i < $array[1]; $i++) {
            $form .= "<label>";
            $form .= '<input class="submit" type="submit" name="page" value ="' . ($i + 1) . '" />';
            $form .= "</label>";
        }
        $form .= '</form>';
        echo($form);
        ?>
    </section>
    <section class="orange_background">

    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

