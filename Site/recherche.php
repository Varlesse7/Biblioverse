<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "recherche";

require("include/header.inc.php")

?>
<main>
    <section class="black_background">
        <div class='spacing'>
            <h1>Résultat(s) de la recherche:</h1>
            <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $type = isset($_GET['type']) ? $_GET['type'] : '';

                $url = "https://www.googleapis.com/books/v1/volumes?q=";

                if ($type == 'author') {
                    $url .= "inauthor:" . urlencode($search);
                } else {
                    $url .= "intitle:" . urlencode($search);
                }

                $url .= "&startIndex=0&maxResults=40&key=AIzaSyCs1ePjCy_8Wkd1UrWYho8PHIfTEOU754E";

                $json = file_get_contents($url);

                $data = json_decode($json, true);

                if (isset($data['items'])) {
                    echo("\t\t\t" . '<div class="container">' . "\n");
                    foreach ($data['items'] as $item) {
                        $thumbnail = $item['volumeInfo']['imageLinks']['thumbnail'] ?? '';
                        $title = $item['volumeInfo']['title'] ?? '';
                        $authors = isset($item['volumeInfo']['authors'])
                            ? implode(", ", $item['volumeInfo']['authors'])
                            : '';
                        $publisher = isset($item['volumeInfo']['publisher'])
                            ? $item['volumeInfo']['publisher']
                            : '';
                        $publishedDate = isset($item['volumeInfo']['publishedDate'])
                            ? $item['volumeInfo']['publishedDate']
                            : '';
                        $pageCount = isset($item['volumeInfo']['pageCount'])
                            ? $item['volumeInfo']['pageCount']
                            : '';
                        $description = isset($item['volumeInfo']['description'])
                            ? $item['volumeInfo']['description']
                            : '';
                        if ($thumbnail) {

                            $book = "\t\t\t\t" . '<div class="book-container">' . "\n";
                            $book .= "\t\t\t\t" . "<img src='" . $thumbnail . "'>" . "\n";

                            $book .= "\t\t\t\t"."<div class='information_book'>"."\n";
                            $book .= "\t\t\t\t\t" . "<strong>" . $title . "</strong>" . "\n";
                            $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
                            $book .= "\t\t\t\t"."</div>"."\n";


                            $book .= "\t\t\t\t" . "</div>" . "\n";



                        }else {
                            $book = "\t\t\t\t" . '<div class="book-container">' . "\n";
                            $book .= "\t\t\t\t" . "<img src='" . "images/placeholder.png" . "'>" . "\n";

                            $book .= "\t\t\t\t"."<div class='information_book'>"."\n";
                            $book .= "\t\t\t\t\t" . "<strong>" . $title . "</strong>" . "\n";
                            $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
                            $book .= "\t\t\t\t"."</div>"."\n";


                            $book .= "\t\t\t\t" . "</div>" . "\n";

                        }

                        echo($book);

                    }
                    echo ("\t\t\t" . "</div>" . "\n");
                } else {
                    echo "Aucun livre trouvé.";
                }
            }
            ?>
        </div>
    </section>
    <section class="orange_background">

    </section>
</main>

<?php require("./include/footer.inc.php"); ?>
</html>

