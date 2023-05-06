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
            $book .= "\t\t\t\t" . "<a href='" . "book.php?isbn=" . $isbn . "'><img src='" . $thumbnail . "'/></a>" . "\n";
        } else {

            $book .= "\t\t\t\t" . "<a href='" . "book.php?isbn=" . $isbn . "'><img src='" . "images/placeholder.png" . "'/></a>" . "\n";

        }


        $book .= "\t\t\t\t" . "<div class='information_book'>" . "\n";
        $book .= "\t\t\t\t\t" . "<strong>" . $title . "</strong>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t" . "</div>" . "\n";


        $book .= "\t\t\t\t" . "</div>" . "\n";


    }
    return [$book, $page_count];
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
    if ($thumbnail) {
        $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        $book .= "\t\t\t\t" . "<img src='" . $thumbnail . "'>" . "\n";

        $book .= "\t\t\t\t" . "<div class='solo_book_container'>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";

        $book .= "\t\t\t\t" . "</div>" . "\n";
        $book .= "\t\t\t" . "</div>" . "\n";


    } else {
        $book = "\t\t\t\t\t" . "<h1>" . $title . "</h1>" . "\n";

        $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
        $book .= "\t\t\t\t" . "<img src='" . "images/placeholder.png" . "'>" . "\n";

        $book .= "\t\t\t\t" . "<div class='solo_book_container'>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
        $book .= "\t\t\t\t\t" . "<span>Description: " . $description . "</span>" . "\n";

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
    $top_searches = array_slice($search_counts, 0, 5);
    echo "<table>";
    echo "<thead><tr><th>Recherche</th><th>Nombre de fois</th></tr></thead>";
    echo "<tbody>";
    foreach($top_searches as $search_term => $count){
        echo "<tr><td>$search_term</td><td>$count</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
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


function cookie () : string{

}
?>