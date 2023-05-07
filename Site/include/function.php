<?php
function search_google(): array
{
    $page_count = 0;
    $i = 0;
    if (empty($_POST['API'])){
	if (isset($_GET['autheur']) && isset($_GET['search'])){
	while ($i < 5) {
            $url = "https://www.googleapis.com/books/v1/volumes?q=inauthor:". urlencode($_GET['search']) . "&max_results=20&startIndex=" . $i * 20 ."&key=AIzaSyCs1ePjCy_8Wkd1UrWYho8PHIfTEOU754E";
			//echo $url;
            $json = file_get_contents($url);

            $items = json_decode($json, true);
            if (isset($items['items'])) {
                file_put_contents("page" . $i . ".json", $json);
                $i++;
                $page_count++;
            } else {
                $i = 5;
            }
        }
        $_POST['API'] = urlencode($_GET['search']);
	} 
	elseif (!empty($_GET['search'])) {
    while ($i < 5) {
        $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($_GET['search']) . "&max_results=20&startIndex=" . $i * 20 ."&key=AIzaSyCs1ePjCy_8Wkd1UrWYho8PHIfTEOU754E";
        $json = file_get_contents($url);
        $items = json_decode($json, true);
        if (isset($items['items'])) {
            file_put_contents("page" . $i . ".json", $json);
            $i++;
            $page_count++;
        } else {
            $i = 5;
        }
    }
    $_POST['API'] = urlencode($_GET['search']);
}

	elseif (isset($_GET['genre']) && empty($_GET['search'])) {

        while ($i < 5) {
            $url = "https://www.googleapis.com/books/v1/volumes?q=subject:" . urlencode($_GET['genre']) . "&max_results=20&startIndex=" . $i * 20 . "&key=AIzaSyCs1ePjCy_8Wkd1UrWYho8PHIfTEOU754E";
			//echo $url;
            $json = file_get_contents($url);

            $items = json_decode($json, true);
            if (isset($items['items'])) {
                file_put_contents("page" . $i . ".json", $json);
                $i++;
                $page_count++;
            } else {
                $i = 5;
            }
        }
        $_POST['API'] = urlencode($_GET['genre']);
    }
	elseif (isset($_GET['genre']) && !empty($_GET['search'])) {

        while ($i < 5) {
            $url = "https://www.googleapis.com/books/v1/volumes?q=intitle:". urlencode($_GET['search'])."+genre:".urlencode($_GET['genre'])."&max_results=20&startIndex=" . $i * 20 . "&key=AIzaSyCs1ePjCy_8Wkd1UrWYho8PHIfTEOU754E";
			//echo $url;
            $json = file_get_contents($url);

            $items = json_decode($json, true);
            if (isset($items['items'])) {
                file_put_contents("page" . $i . ".json", $json);
                $i++;
                $page_count++;
            } else {
                $i = 5;
            }
        }
        $_POST['API'] = urlencode($_GET['genre']);
    }
	
	}
	
	
    if (isset($_GET['page_count'])) {
        $page_count = $_GET['page_count'];
    }
    if (isset($_GET['page'])) {
        $json = file_get_contents("page" . ($_GET['page'] - 1) . ".json");
    } else {
        $json = file_get_contents("page0.json");
    }

    $items = json_decode($json, true);

    $book = "\t\t\t" . '<div class="container">' . "\n";
    foreach ($items['items'] as $data) {
        $title = $data['volumeInfo']['title'] ?? '';
        $authors = isset($data['volumeInfo']['authors'])
            ? implode(", ", $data['volumeInfo']['authors'])
            : '';
        $thumbnail = $data['volumeInfo']['imageLinks']['thumbnail'] ?? '';
        $isbn = $data['volumeInfo']['industryIdentifiers']['0']['identifier'] ?? '';

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        if ($thumbnail) {
            $book .= "\t\t\t\t" . "<a href='" . "book.php?isbn=" . $isbn . "'><img src='" . $thumbnail . "' alt='book'/></a>" . "\n";
        } else {

            $book .= "\t\t\t\t" . "<a href='" . "book.php?isbn=" . $isbn . "'><img src='" . "images/placeholder.png" . "' alt='book'/></a>" . "\n";

        }


        $book .= "\t\t\t\t" . "<div class='information_book'>" . "\n";
        $book .= "\t\t\t\t\t" . "<strong>" . $title . "</strong>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t" . "</div>" . "\n";


        $book .= "\t\t\t" . "</div>" . "\n";


    }
    $book .= "</div>";
    return [$book, $page_count];
}


function bookv1($isbn)
{
    $json = "https://www.googleapis.com/books/v1/volumes?q=+isbn:" . $isbn;
    $info = file_get_contents($json);
    $info = json_decode($info, true);

    $item = $info['items']['0'];

    $thumbnail = $item['volumeInfo']['imageLinks']['thumbnail'] ?? '';
    $title = $item['volumeInfo']['title'] ?? '';
    $authors = $item['volumeInfo']['authors']['0'] ?? '';
    $description = $item['volumeInfo']['description'] ?? '';
	$bio = "";
	if (!empty($authors)) {
		$author = urlencode($authors);
		$url = "https://fr.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&titles=$author&exintro=true&explaintext=true&exsentences=5";
		$result = file_get_contents($url);
		$result = json_decode($result, true);

		$pages = $result['query']['pages'];
		foreach ($pages as $page) {
			$bio .= $page['extract'];
		}
	}

	
    if ($thumbnail) {
        $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        $book .= "\t\t\t\t" . "<img src='" . $thumbnail . "'>" . "\n";

        $book .= "\t\t\t\t" . "<div class='solo_book_container'>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Biographie de l'auteur (Attention le nom de l'autheur doit etre complet) : " . $bio . "</span>" . "\n";

        $book .= "\t\t\t\t" . "</div>" . "\n";
        $book .= "\t\t\t" . "</div>" . "\n";


    } else {
        $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        $book .= "\t\t\t\t" . "<img src='" . "images/placeholder.png" . "'>" . "\n";

        $book .= "\t\t\t\t" . "<div class='solo_book_container'>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Biographie: " . $bio . "</span>" . "\n";

        $book .= "\t\t\t\t" . "</div>" . "\n";
        $book .= "\t\t\t" . "</div>" . "\n";

    }

    return $book;
}
function bookV2($isbn)
{
    $json = "https://www.googleapis.com/books/v1/volumes?q=+isbn:" . $isbn;
    $info = file_get_contents($json);
    $info = json_decode($info, true);

    $item = $info['items']['0'];

    $thumbnail = $item['volumeInfo']['imageLinks']['thumbnail'] ?? '';
    $title = $item['volumeInfo']['title'] ?? '';
    $authors = $item['volumeInfo']['authors']['0'] ?? '';
    $description = $item['volumeInfo']['description'] ?? '';
    if ($thumbnail) {
        $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        $book .= "\t\t\t\t" . "<img src='" . $thumbnail . "' alt='"."book"."'>" . "\n";

        $book .= "\t\t\t\t" . "<div class='solo_book_container'>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";

        $book .= "\t\t\t\t" . "</div>" . "\n";
        $book .= "\t\t\t" . "</div>" . "\n";


    } else {
        $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        $book .= "\t\t\t\t" . "<img src='" . "images/placeholder.png" . "' alt='"."book"."'>" . "\n";

        $book .= "\t\t\t\t" . "<div class='solo_book_container'>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";

        $book .= "\t\t\t\t" . "</div>" . "\n";
        $book .= "\t\t\t" . "</div>" . "\n";


    }


    return $book;

}	
function bookV3($isbn)
{
    $json = "https://www.googleapis.com/books/v1/volumes?q=+isbn:" . $isbn;
    $info = file_get_contents($json);
    $info = json_decode($info, true);

    $item = $info['items']['0'];

    $thumbnail = $item['volumeInfo']['imageLinks']['thumbnail'] ?? '';
    $title = $item['volumeInfo']['title'] ?? '';
    $authors = $item['volumeInfo']['authors']['0'] ?? '';
    $description = $item['volumeInfo']['description'] ?? '';
    $author = urlencode($authors);
    $json_author = "https://www.googleapis.com/books/v1/volumes?q=+inauthor:" . $author;
    $info_author = file_get_contents($json_author);
    $info_author = json_decode($info_author, true);
    $other_books = '';
    if (isset($info_author['items'])) {
        $other_books .= "<div class='other-books-container'><h3>Autres titres de l'auteur:</h3><ul>";
        $count = 0;
        foreach ($info_author['items'] as $item) {
            if ($item['id'] == $info['items'][0]['id']) {
                continue;
            }
            $title = $item['volumeInfo']['title'];
            $book_link = $item['volumeInfo']['infoLink'];
            $other_books .= "<li><a href='" . $book_link . "'>" . $title . "</a></li>";
            $count++;
            if ($count == 4) {
                break;
            }
        }
        $other_books .= "</ul></div>";
    }

    if ($thumbnail) {
        $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        $book .= "\t\t\t\t" . "<img src='" . $thumbnail . "'>" . "\n";

        $book .= "\t\t\t\t" . "<div class='solo_book_container'>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";

        $book .= $other_books;

        $book .= "\t\t\t\t" . "</div>" . "\n";
        $book .= "\t\t\t" . "</div>" . "\n";
    } else {
        $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        $book .= "\t\t\t\t" . "<img src='" . "images/placeholder.png" . "'>" . "\n";

        $book .= "\t\t\t\t" ."<div class='solo_book_container'>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";

        $book .= $other_books;

        $book .= "\t\t\t\t" . "</div>" . "\n";
        $book .= "\t\t\t" . "</div>" . "\n";
        $book .= "\t\t" . "</div>" . "\n";
    }

    return $book;
}

function book($isbn)
{
    $json = "https://www.googleapis.com/books/v1/volumes?q=+isbn:" . $isbn;
    $info = file_get_contents($json);
    $info = json_decode($info, true);

    $item = $info['items']['0'];

    $thumbnail = $item['volumeInfo']['imageLinks']['thumbnail'] ?? '';
    $title = $item['volumeInfo']['title'] ?? '';
    $authors = $item['volumeInfo']['authors']['0'] ?? '';
    $description = $item['volumeInfo']['description'] ?? '';
    $author = urlencode($authors);
    $json_author = "https://www.googleapis.com/books/v1/volumes?q=+inauthor:" . $author;
    $info_author = file_get_contents($json_author);
    $info_author = json_decode($info_author, true);
    $other_books = '';
    if (isset($info_author['items'])) {
		$other_books .="\n";
		$other_books .="\n";
		$other_books .="\n";
		$other_books .="\n";
		$other_books .="\n";
		$other_books .="\n";
        $other_books .= "<div class='other-books-container'><h3>Autres titres de l'auteur / Autres titres du meme genre:</h3><ul>";
        $count = 0;
        foreach ($info_author['items'] as $item) {
            if ($item['id'] == $info['items'][0]['id']) {
                continue;
            }
            if (isset($item['volumeInfo']['industryIdentifiers'][0]['identifier'])) {
			$other_isbn = $item['volumeInfo']['industryIdentifiers'][0]['identifier'];
			$other_title = $item['volumeInfo']['title']; // PB ici?
			/*Partie que tu dois délete toi */
			if (preg_match('/^(97(8|9))?\d{9}(\d|X)$/', $other_isbn)) {
				$book_link = "http://massyl-oy.alwaysdata.net/book.php?isbn=" . $other_isbn;
			} else {
				$book_link = '';
			}
			/*fin de la partie que tu dois délete */
			
			/*remplace par ça toi*/
			/*
			if (preg_match('/^(97(8|9))?\d{9}(\d|X)$/', $other_isbn)) { //Fraude mais si jamais l'isbn n'est pas valide il me redirige vers le livre de base mais affiche quand mme le lien
				$book_link = "https://franck-papuchon.alwaysdata.net/book.php?isbn=" . $other_isbn;
			} else {
				$book_link = '';
			}
			*/
			$other_books .= "<li><a href='" . $book_link . "'>" . $other_title . "</a></li>";
			$count++;
			if ($count == 4) {
				break;
			}
		}
		}
        $other_books .= "</ul></div>";
    } else {
        $other_books = '';
    }

    if ($thumbnail) {
        $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        $book .= "\t\t\t\t" . "<img src='" . $thumbnail . "'>" . "\n";

        $book .= "\t\t\t\t" . "<div class='solo_book_container'>" . "\n";
           $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
    $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";

    $book .= $other_books;

    $book .= "\t\t\t\t" . "</div>" . "\n";
    $book .= "\t\t\t" . "</div>" . "\n";
} else {
    $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

    $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
    $book .= "\t\t\t\t" . "<img src='" . "images/placeholder.png" . "'>" . "\n";

    $book .= "\t\t\t\t" ."<div class='solo_book_container'>" . "\n";
    $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
    $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";

    $book .= $other_books;

    $book .= "\t\t\t\t" . "</div>" . "\n";
    $book .= "\t\t\t" . "</div>" . "\n";
}

return $book;
}
function save_5_derniers() {
    if(isset($_GET['search'])){
        $_SESSION['search'] = $_GET['search'];
        $search = $_GET['search'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $filename = 'historique/' . $ip . '.csv';
        $rows = array();
        if(file_exists($filename)){
            $file = fopen($filename, 'r');
            while (($row = fgetcsv($file)) !== false) {
                $rows[] = $row;
            }
            fclose($file);
        }

        $new_row = array(date('Y-m-d H:i:s'), $search);
        array_push($rows, $new_row);
        if(count($rows) > 5){
            array_shift($rows);
        }

        $file = fopen($filename, 'w');
        foreach($rows as $row){
            fputcsv($file, $row);
        }
        fclose($file);
    }
}

function afficher_5_derniers() {
    $ip = $_SERVER['REMOTE_ADDR'];
    $filename = 'historique/' . $ip . '.csv';
    $rows = array();
    if(file_exists($filename)){
        $file = fopen($filename, 'r');
        while (($row = fgetcsv($file)) !== false) {
            $rows[] = $row;
        }
        fclose($file);
    }
    $last_five_rows = array_slice($rows, -5);
    echo "<ul>";
    foreach ($last_five_rows as $row) {
        echo "<li>$row[0] - $row[1]</li>";
    }
    echo "</ul>";
}
function ecrire_stats() {
    if(isset($_GET['search'])){
        $search_term = $_GET['search'];
        $date = date('Y-m-d H:i:s');
        $file = fopen('log_total.csv', 'a');
        fputcsv($file, array($date, $search_term));
        fclose($file);
    }
}
function afficher_stats() {
    $file = fopen('log_total.csv', 'r');
    $search_terms = array();
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        $search_terms[] = $data[1];
    }
    $search_counts = array_count_values($search_terms);
    arsort($search_counts);
    $top_searches = array_slice($search_counts, 0, 3);

    echo '<div style="display:flex; justify-content:center;">';
    echo "<table style='border-collapse: collapse;'>";
	echo "<caption>TOP 3 des livres consultés sur Biblioverse</caption>";
    echo "<thead><tr><th style='border:1px solid black; padding:5px;'>Nom du Livre</th><th style='border:1px solid black; padding:5px;'>Nombre de fois</th></tr></thead>";
    echo "<tbody>";
    foreach($top_searches as $search_term => $count){
        echo "<tr style='border:1px solid black;'><td style='border:1px solid black; padding:5px;'>$search_term</td><td style='border:1px solid black; padding:5px;'>$count</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo '</div>';
    fclose($file);
}

function calculer_visites() {
    $visites = 0;
    if (file_exists("visites.txt")) {
        $lines = file("visites.txt");
        foreach ($lines as $line) {
            $data = explode("|", trim($line));
            $visites += intval($data[1]);
        }
    }
    return $visites;
}
function enregistrer_visites() {
    $file = fopen("visites.txt", "a+");
    $date = date("Y-m-d");
    $visites = 0;
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        if ($data[0] == $date) {
            $visites = intval($data[1]);
            break;
        }
    }
    $visites++;
    rewind($file);
    $newData = "$date|$visites\n";
    $found = false;
    $newFile = "";
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
}
function afficher_svg() {
    $lines = file('visites.txt');

    $labels = array();
    $values = array();

    foreach ($lines as $line) {
        $parts = explode('|', $line);
        $labels[] = $parts[0];
        $values[] = intval($parts[1]);
    }
    $max_value = max($values);
    $base_width = 1000;
    $base_height = 600;
    $margin_top = 70;

    $svg_width = $base_width;
    $svg_height = $base_height - $margin_top;

    $bar_width = $svg_width / count($values);
    $bar_padding = $bar_width * 0.2;

    $svg = '<svg width="' . $svg_width . '" height="' . $svg_height . '">';

    for ($i = 0; $i < count($values); $i++) {
        $x = $i * $bar_width + $bar_padding;
        $y = $svg_height - $values[$i] * $svg_height / $max_value;
        $height = $values[$i] * $svg_height / $max_value;

        $svg .= '<rect x="' . $x . '" y="' . $y . '" width="' . ($bar_width - 2 * $bar_padding) . '" height="' . $height . '" fill="#0077CC" />';
        $svg .= '<text x="' . ($x + ($bar_width - 2 * $bar_padding) / 2) . '" y="' . ($y - 5) . '" text-anchor="middle" fill="#000000">' . $labels[$i] . ' (' . $values[$i] . ')</text>';
    }

    $svg .= '</svg>';
    echo $svg;
}
function photo_dynamique() {
    $chemin_dossier = "photos/";
    $liste_fichiers = scandir($chemin_dossier);
    $images = array();
    foreach ($liste_fichiers as $fichier) {
        $extension = pathinfo($fichier, PATHINFO_EXTENSION);
        if (in_array($extension, array("jpg", "jpeg", "png", "gif"))) {
            $images[] = $fichier;
        }
    }
    $image_aleatoire = $images[array_rand($images)];
    echo "<section class='orange_background'>";
    echo "<div class='spacing'>";
    echo "<h2>Rentrez dans l'univers des livres</h2>";
    echo "<div class='biblioverse-container'>";
    echo "<img class='index' src='photos/$image_aleatoire' alt='image aléatoire'>";
    echo "<p class='center'>Vous êtes sur un site pour la recherche de livre, vous pourrez trouver ici tous les livres qui vous intéressent, mais aussi d'autre fonctionnalité pour rendre votre parcours sur notre site le plus simple possible. Notre but sera de vous aider à trouver de nouvelles livres à lire, mais aussi de, vous laissez parler des livres que vous connaissez pour vous permettre d'aider nos autres utilisateurs à faire leur première impression.</p>";
    echo "</div>";
    echo "</div>";
    echo "</section>";
}

?>