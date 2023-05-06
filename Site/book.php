<?php
$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "book";

require("include/header.inc.php");
require("include/function.php");

?>
<main>

    <section class="black_background">
	<a href="#" onclick="history.back()">
	<img src="images/arrow-go-back-line.svg" width="100" height="100">
	</a>
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

