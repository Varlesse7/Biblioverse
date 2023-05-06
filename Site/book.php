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
			echo '<a href="#" onclick="history.back()"><img src="images/arrow-go-back-line.svg" width="100" height="100"></a>';
		} elseif ($style_actuel == 'style_nuit.css') {
			echo '<a href="#" onclick="history.back()"><img src="images/arrow-go-back-line-nuit.svg" width="100" height="100"></a>';
		}
	?>
        <div class='spacing'>
            <?php
            echo (book($_GET['isbn']));
            ?>
        </div>
    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

