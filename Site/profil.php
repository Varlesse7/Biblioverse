<?php
$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "profil";

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
			echo '<a href="#" onclick="history.back()"><img src="images/arrow-go-back-line.svg" width="100" height="100" alt=""></a>';
		} elseif ($style_actuel == 'style_nuit.css') {
			echo '<a href="#" onclick="history.back()"><img src="images/arrow-go-back-line-nuit.svg" width="100" height="100" alt=""></a>';
		}
	?>
        <div class='spacing'>
            <h1>Voici l'historique de vos 5 dernières recherches:</h1>
			<?php
			afficher_5_derniers();
			?>
			<br>
			<span class="span-profil">Nos recommandations:</span>
			<br>
			<div class="container slider">
                <div class="book-container">
					<a href="book.php?isbn=2070212009"><img src="images/l'Etranger.jpg" alt=""/></a>
      
                    <div>

                        <span>L'Etranger</span>
                        <span>Albert Camus</span>
                        <span><strong>Avis le plus aimé :</strong>

                             L'Etranger " d'Albert Camus est un roman existentiel qui raconte l'histoire de Meursault, un homme indifférent à la vie qui est accusé d'avoir tué un Arabe. Le livre explore les thèmes de l'absurdité de la vie, de la mort et de la justice. À travers le personnage de Meursault, Camus expose les conséquences de l'aliénation et de la solitude dans un monde qui manque de sens. </span>
                    </div>
                </div>
                <div class="book-container">
				
					<a href="book.php?isbn=2702436331"><img src="images/L'orient-Express.jpg" alt=""/></a>
                    <div>
                        <span>L'orient-Express</span>
                        <span>Agatha Christie</span>
                        <span><strong>Avis le plus aimé :</strong>

                            Le roman "Le Crime de l'Orient-Express" d'Agatha Christie suit le célèbre détective Hercule Poirot alors qu'il enquête sur le meurtre d'un passager à bord de l'Orient-Express, un luxueux train de voyageurs. Avec un groupe hétéroclite de suspects, chacun ayant un alibi apparemment étanche, Poirot doit démêler les mensonges et les secrets pour trouver le coupable avant qu'il ne frappe à nouveau. Le livre est un classique du genre policier, connu pour son intrigue astucieuse et sa fin surprenante. </span>
                    </div>
					
                </div>
				<div class="book-container">
					<a href="book.php?isbn=9781781101049"><img src="images/harryp.jpg" alt=""/></a>
                    <div>
                        <span>Harry Potter et la Chambre des Secrets</span>
                        <span>J.K. Rowling</span>
                        <span><strong>Avis le plus aimé :</strong>

                             Harry Potter et la Chambre des Secrets" est un livre captivant qui nous emmène dans un univers magique riche en aventures, en mystères et en personnages fascinants. L'intrigue est bien construite, les rebondissements sont nombreux et les descriptions sont immersives. On ressent la tension qui règne à Poudlard et l'on se prend rapidement au jeu de résoudre les énigmes qui se présentent à Harry et ses amis. </span>
                    </div>
                </div>
				<div class="book-container">
					<a href="book.php?isbn=9782754056861"><img src="images/progprnull.jpg" alt=""/></a>
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
</main>

<?php require("./include/footer.inc.php"); ?>
</html>