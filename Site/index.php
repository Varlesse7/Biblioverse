<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "index";

require("include/header.inc.php")

?>
<main>
    <section class="black_background">
        <div class='spacing'>
            <h1>Notre séléction de livre </h1>
            <div class="container">
                <div class="book-container">
                    <img src="images/l'Etranger.jpg">
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
        </div>
    </section>
    <section class="orange_background">
        <div class='spacing'>
            <h2>Rentrez dans l'univers des livres</h2>
            <div class="biblioverse-container">
                <img src="images/BiblioverseOriginal.png" alt="Biblioverse">
                <p class="center">Vous êtes sur un site pour la recherche de livre, vous pourrez trouver ici tous les
                    livres
                    qui vous
                    intéressent, mais aussi d'autre fonctionnalité pour rendre votre parcours sur notre site le plus
                    simple
                    possible. Notre but sera de vous aider à trouver de nouvelles livres à lire, mais aussi de, vous
                    laissez parler des livres que vous connaissez pour vous permettre d'aider nos autres utilisateurs à
                    faire leur première impression.
                </p>
            </div>
        </div>
    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

