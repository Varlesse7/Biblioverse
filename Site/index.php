
<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "index";

require("include/header.inc.php");
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

                             L'Etranger " d'Albert Camus est un roman existentiel qui raconte l'histoire de Meursault, un homme indifférent à la vie qui est accusé d'avoir tué un Arabe. Le livre explore les thèmes de l'absurdité de la vie, de la mort et de la justice. À travers le personnage de Meursault, Camus expose les conséquences de l'aliénation et de la solitude dans un monde qui manque de sens. </span>
                    </div>
                </div>
                <div class="book-container">
                    <img src="images/L'orient-Express.jpg">
                    <div>
                        <span>L'orient-Express</span>
                        <span>Agatha Christie</span>
                        <span><strong>Avis le plus aimé :</strong>

                            Le roman "Le Crime de l'Orient-Express" d'Agatha Christie suit le célèbre détective Hercule Poirot alors qu'il enquête sur le meurtre d'un passager à bord de l'Orient-Express, un luxueux train de voyageurs. Avec un groupe hétéroclite de suspects, chacun ayant un alibi apparemment étanche, Poirot doit démêler les mensonges et les secrets pour trouver le coupable avant qu'il ne frappe à nouveau. Le livre est un classique du genre policier, connu pour son intrigue astucieuse et sa fin surprenante. </span>
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

