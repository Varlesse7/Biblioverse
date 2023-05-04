<?php
$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "profil";

require("include/header.inc.php");
require("include/function.php");

?>
<main>
	<button onclick="history.back()">Retour temporaire</button>

    <section class="black_background">
        <div class='spacing'>
            <h1>Votre Historique si vous en avez un:</h1>
			<?php
			$ip = $_SERVER['REMOTE_ADDR'];
			$file = "historique/$ip.txt";

			if(isset($_GET['search']) && !empty(trim($_GET['search']))) {
				$search = $_GET['search'];

				if (!file_exists($file)) {
					$fh = fopen($file, 'w') or die("Can't create file");
				} else {
					$fh = fopen($file, 'a') or die("Can't open file");
				}

				fwrite($fh, date('Y-m-d H:i:s') . ' - ' . $search ."\n");

				fclose($fh);
			}

			/* Afficher toutes les recherches */
			$searches = array();
			if (file_exists($file)) {
				$lines = file($file);
				foreach ($lines as $line) {
					$searches[] = trim($line);
				}
			}

			echo "<ul>";
			foreach ($searches as $search) {
				echo "<li>$search</li>";
			}
			echo "</ul>";
			?>



        </div>
    </section>
    <section class="orange_background">

    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>