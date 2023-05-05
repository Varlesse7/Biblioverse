
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
            <div class="container slider">
                <div class="book-container">
					<a href="book.php?isbn=2070212009"><img src="images/l'Etranger.jpg"/></a>
      
                    <div>

                        <span><?php if (isset($_COOKIE['style'])){
                                echo ($_COOKIE['style']);
                            }?>L'Etranger</span>
                        <span>Albert Camus</span>
                        <span><strong>Avis le plus aimé :</strong>

                             L'Etranger " d'Albert Camus est un roman existentiel qui raconte l'histoire de Meursault, un homme indifférent à la vie qui est accusé d'avoir tué un Arabe. Le livre explore les thèmes de l'absurdité de la vie, de la mort et de la justice. À travers le personnage de Meursault, Camus expose les conséquences de l'aliénation et de la solitude dans un monde qui manque de sens. </span>
                    </div>
                </div>
                <div class="book-container">
				
					<a href="book.php?isbn=2702436331"><img src="images/L'orient-Express.jpg"/></a>
                    <div>
                        <span>L'orient-Express</span>
                        <span>Agatha Christie</span>
                        <span><strong>Avis le plus aimé :</strong>

                            Le roman "Le Crime de l'Orient-Express" d'Agatha Christie suit le célèbre détective Hercule Poirot alors qu'il enquête sur le meurtre d'un passager à bord de l'Orient-Express, un luxueux train de voyageurs. Avec un groupe hétéroclite de suspects, chacun ayant un alibi apparemment étanche, Poirot doit démêler les mensonges et les secrets pour trouver le coupable avant qu'il ne frappe à nouveau. Le livre est un classique du genre policier, connu pour son intrigue astucieuse et sa fin surprenante. </span>
                    </div>
					
                </div>
				<div class="book-container">
					<a href="book.php?isbn=9781781101049"><img src="images/harryp.jpg"/></a>
                    <div>
                        <span>Harry Potter et la Chambre des Secrets</span>
                        <span>J.K. Rowling</span>
                        <span><strong>Avis le plus aimé :</strong>

                             Harry Potter et la Chambre des Secrets" est un livre captivant qui nous emmène dans un univers magique riche en aventures, en mystères et en personnages fascinants. L'intrigue est bien construite, les rebondissements sont nombreux et les descriptions sont immersives. On ressent la tension qui règne à Poudlard et l'on se prend rapidement au jeu de résoudre les énigmes qui se présentent à Harry et ses amis. </span>
                    </div>
                </div>
				<div class="book-container">
					<a href="book.php?isbn=9782754056861"><img src="images/progprnull.jpg"/></a>
                    <div>
                        <span>Programmation HTML5 avec CSS3 Pour les Nuls</span>
                        <span>Chris MINNICK, Ed TITTEL</span>
                        <span><strong>Avis le plus aimé :</strong>

                            Ce livre est une excellente ressource pour les débutants en programmation web qui cherchent à apprendre HTML5 et CSS3. Les auteurs expliquent clairement les concepts de base et fournissent de nombreux exemples pratiques pour aider les lecteurs à comprendre comment créer des pages web avec HTML et CSS. </span>
                    </div>
					
                </div>
				
            </div>
        </div>
    </section>
    <section class="orange_background">
        <div class='spacing'>
            <h2 class="bers">Rentrez dans l'univers des livres</h2>
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
	<?php
// Ouvre le fichier visites.txt
$file = fopen("visites.txt", "a+");
// Récupère la date du jour
$date = date("Y-m-d");
// Initialise le nombre de visites à 0
$visites = 0;
// Parcourt le fichier pour trouver le nombre de visites pour la date du jour
while (!feof($file)) {
    $line = fgets($file);
    $data = explode("|", $line);
    if ($data[0] == $date) {
        $visites = intval($data[1]);
        break;
    }
}
// Incrémente le nombre de visites
$visites++;
// Écrit la nouvelle ligne dans le fichier
rewind($file);
$newData = "$date|$visites\n";
$found = false;
while (!feof($file)) {
    $line = fgets($file);
    $data = explode("|", $line);
    if ($data[0] == $date) {
        $found = true;
        $line = $newData;
    }
    $newFile .= $line;
}
if (!$found) {
    $newFile .= $newData;
}
ftruncate($file, 0);
fwrite($file, $newFile);
fclose($file);
?>

</main>


<?php require("./include/footer.inc.php"); ?>
</html>

