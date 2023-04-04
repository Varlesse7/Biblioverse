<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "index";

require("include/header.inc.php")

?>
<main>
    <h1>Site en Attendant le projet</h1>
	

<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $type = $_GET['type'];

    $url = "https://www.googleapis.com/books/v1/volumes?q=";

    if ($type == 'author') {
        $url .= "inauthor:" . urlencode($search);
    } else {
        $url .= "intitle:" . urlencode($search);
    }

    $url .= "&startIndex=0&maxResults=20&key=AIzaSyCs1ePjCy_8Wkd1UrWYho8PHIfTEOU754E";

    $json = file_get_contents($url);

    $data = json_decode($json, true);

    if (isset($data['items'])) {
        echo "<div style='display:flex;flex-wrap:wrap;justify-content:center;'>";

        foreach ($data['items'] as $item) {
            $thumbnail = isset($item['volumeInfo']['imageLinks']['thumbnail']) ? $item['volumeInfo']['imageLinks']['thumbnail'] : '';
            $title = isset($item['volumeInfo']['title']) ? $item['volumeInfo']['title'] : '';
            $authors = isset($item['volumeInfo']['authors']) ? implode(", ", $item['volumeInfo']['authors']) : '';
            $publisher = isset($item['volumeInfo']['publisher']) ? $item['volumeInfo']['publisher'] : '';
            $publishedDate = isset($item['volumeInfo']['publishedDate']) ? $item['volumeInfo']['publishedDate'] : '';
            $pageCount = isset($item['volumeInfo']['pageCount']) ? $item['volumeInfo']['pageCount'] : '';
            $description = isset($item['volumeInfo']['description']) ? $item['volumeInfo']['description'] : '';

            if ($thumbnail) {
                echo "<div style='display:flex;margin:10px;'>";
                echo "<div>";
                echo "<img src='" . $thumbnail . "' alt='Thumbnail' style='width:100%;max-width:300px;'>";
                echo "</div>";
                echo "<div style='margin-left:20px;'>";
                echo "<h2>" . $title . "</h2>";
                echo "<p><b>Auteur:</b> " . $authors . "</p>";
                echo "<p><b>Date de publication:</b> " . $publishedDate . "</p>";
                echo "<p><b>Nombre de pages:</b> " . $pageCount . "</p>";
                echo "<p>" . $description . "</p>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div style='display:flex;margin:10px;'>";
                echo "<div>";
                echo "<h2>" . $title . "</h2>";
                echo "<p><b>Auteur:</b> " . $authors . "</p>";
                echo "<p><b>Date de publication:</b> " . $publishedDate . "</p>";
                echo "<p><b>Nombre de pages:</b> " . $pageCount . "</p>";
                echo "<p>" . $description . "</p>";
                echo "</div>";
                echo "</div>";
            }
        }
        echo "</div>";
    } else {
        echo "Aucun livre trouvé.";
    }
}
?>




</main>

<?php require("./include/footer.inc.php"); ?>
</html>

