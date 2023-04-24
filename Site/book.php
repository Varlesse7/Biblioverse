<?php
/*if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['genre']) && !empty($_GET['genre'])) {
        $searchby = 'genre';
        $search = $_GET['genre'];
    } elseif (isset($_GET['searchby']) && isset($_GET['search']) && !empty($_GET['search'])) {
        $searchby = $_GET['searchby'];
        $search = $_GET['search'];
    } else {
    }
}
*/
?>

<?php

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
            <?php
            echo (book($_GET['isbn']));

            ?>
        </div>
    </section>
    <section class="orange_background">

    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

