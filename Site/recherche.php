<?php
/*if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   if (isset($_GET['genre']) && !empty($_GET['genre'])) {
        $searchby = 'genre';
        $search = $_GET['genre'];
    } elseif (isset($_GET['searchby']) && isset($_GET['search']) && !empty($_GET['search'])) {
        $searchby = $_GET['searchby'];
        $search = $_GET['search'];
    } else {
        // Si aucun critère de recherche n'est spécifié, vous pouvez afficher un message d'erreur ou rediriger l'utilisateur vers la page de recherche.
    }
}
*/

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "recherche";

require("include/header.inc.php");
require("include/function.php");

?>
<main>

    <section class="black_background">
	<a href="#" onclick="history.back()">
	<img src="images/arrow-go-back-line.svg" width="100" height="100">
	</a>
        <div class='spacing'>
            <h1>Résultat(s) de la recherche:</h1>
            <?php
			save_5_derniers();
			?>
			<?php
            $array = search_google();
            echo($array[0]);
            $form = '<form method="get" action = "recherche.php">';
            $form .='<input type="hidden" name="page_count" value ="'.$array[1].'" />';
            for ($i = 0; $i < $array[1]; $i++){
                $form .= "<label>";
                $form .='<input type="submit" name="page" value ="'.($i+1).'" />';
                $form .= "</label>";
            }
            $form .='</form>';
            echo($form);
            ?>
			<?php
			ecrire_stats();
			?>
			
        </div>
    </section>
    <section class="orange_background">

    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

