<?php
$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "book";

require("include/header.inc.php");
require("include/function.php");

?>
<main>

    <section class="black_background">
	<?php
		$style_actuel = '';
		if (isset($_GET['style'])) {
			$style_actuel = 'style_' . $_GET['style'] . '.css';
		} 
		elseif (isset($_COOKIE['style'])) {
			$style_actuel = 'style_' . $_COOKIE['style'] . '.css';
		} 
		else {
			$style_actuel = 'style_nuit.css';
		}
		if ($style_actuel == 'style_jour.css') {
			echo '<a href="#" onclick="history.back()"><img class="fleche" src="images/arrow-go-back-line.svg" alt="fleche"/></a>';
		} elseif ($style_actuel == 'style_nuit.css') {
			echo '<a href="#" onclick="history.back()"><img class="fleche" src="images/arrow-go-back-line-nuit.svg" alt="fleche"/></a>';
		}
	?>
        <div class='spacing'>
            <?php
            $book= book($_GET['isbn']);
            echo ($book[0]);
            echo ("<h3>Autres titres de l'auteur / Autres titres du meme genre:</h3>");
            echo ($book[1]);
            ?>
        </div>
    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

