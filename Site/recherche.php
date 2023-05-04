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
	<button onclick="history.back()">Retour temporaire</button>

    <section class="black_background">
        <div class='spacing'>
            <h1>Résultat(s) de la recherche:</h1>
            <?
			if(isset($_GET['search'])){
			$_SESSION['search'] = $_GET['search'];
			$search = $_GET['search'];
			$ip = $_SERVER['REMOTE_ADDR'];
			$filename = 'historique/' . $ip . '.txt';
			$file = fopen($filename, 'a');
			fwrite($file, date('Y-m-d H:i:s') . ' - ' . $search ."\n");
			fclose($file);
			}
			if(isset($_GET['genre'])){
			$_SESSION['genre'] = $_GET['genre'];
			}
			if (isset($_GET['autheur'])) {
				$_SESSION['autheur'] = true;
			} else {
				$_SESSION['autheur'] = false;
			}


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
        </div>
    </section>
    <section class="orange_background">

    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

