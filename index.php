<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "index";

require("include/header.inc.php")

?>
<main class="black_background">
    <article class="black_background">
        <h1>Notre séléction de livre </h1>
        <div class="container">
            <div class="book-container">
                <img src="images/L'Etranger.jpg">
                <div>
                    <span>L'Etranger</span>
                    <span>Albert Camus</span>
                    <span><strong>Avis le plus aimé :</strong>

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut nulla nec dolor placerat tempus a
                            vitae nisi. In laoreet at lorem eget iaculis. Proin fringilla elit nec sapien laoreet, a pretium sem
                            elementum. Quisque vitae congue odio. Vivamus congue massa </span>
                </div>
            </div>
            <div class="book-container">
                <img src="images/L'orient-Express.jpg">
                <div>
                    <span>L'orient-Express</span>
                    <span>Agatha Christie</span>
                    <span><strong>Avis le plus aimé :</strong>

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut nulla nec dolor placerat tempus a
                            vitae nisi. In laoreet at lorem eget iaculis. Proin fringilla elit nec sapien laoreet, a pretium sem
                            elementum. Quisque vitae congue odio. Vivamus congue massa </span>
                </div>
            </div>
        </div>




    </article>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

