<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "stats";

require("include/header.inc.php");
require("include/function.php");
?>
<main>
	<section class="orange_background">
	<a href="#" onclick="history.back()"><img src="images/arrow-go-back-line.svg" width="100" height="100" alt=""></a>
    <h1>Statistiques des visites</h1>
    
	<?php
    $visites=calculer_visites();
	?>
	<p>Nombre total de visites sur Biblioverse : <?php echo $visites; ?></p>
	



	<?php
	afficher_svg()
	?>

	<?php
	afficher_stats();
	?>

	</section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

