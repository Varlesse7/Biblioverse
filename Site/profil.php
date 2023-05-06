<?php
$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "profil";

require("include/header.inc.php");
require("include/function.php");

?>
<main>


    <section class="black_background">
	<a href="#" onclick="history.back()">
	<img src="images/arrow-go-back-line-nuit.svg" width="100" height="100">
	</a>
        <div class='spacing'>
            <h1>Voici l'historique de vos 5 dernières recherches:</h1>
			<?php
			afficher_5_derniers();
			?>
        </div>
    </section>
    <section class="orange_background">

    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>