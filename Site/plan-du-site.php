<?php
$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "plan-du-site";

require("include/header.inc.php");
require("include/function.php");

?>
<main class="black_background">


    <section>
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
            echo '<a href="#" onclick="history.back()"><img class="fleche" src="images/arrow-go-back-line.svg" alt=""></a>';
        } elseif ($style_actuel == 'style_nuit.css') {
            echo '<a href="#" onclick="history.back()"><img class="fleche" src="images/arrow-go-back-line-nuit.svg" alt=""></a>';
        }
        ?>
        <div class='spacing'>
            <h1>Voici le plan du site:</h1>


            <div class="page-list">
                <ul>
                    <h2>Accueil</h2>
                    <li><a href="index.php">Accueil</a></li>
                    <h2>Profil</h2>
                    <li><a href="profil.php">Profil utilisateur</a></li>
                    <h2>Stat</h2>
                    <li><a href="stats.php">Stats du Site</a></li>
                    <h2>Tech</h2>
                    <li><a href="tech.php">Tech</a></li>
                    <h2>Doc</h2>

                    <li><a href="./html/globals_func.html">Documentation des fonctions crées</a></li>
                </ul>
            </div>

    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>