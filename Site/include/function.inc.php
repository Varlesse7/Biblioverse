<?php
declare (strict_types=1);
function search(string $research) : string{
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
            $authors = $item['volumeInfo']['authors'] ??  '';
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

                $book .= "\t\t\t\t"."<div class='information_book'>"."\n";i
                $book .= "\t\t\t\t\t" . "<strong>" . $title . "</strong>" . "\n";
                $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
                $book .= "\t\t\t\t"."</div>"."\n";


                $book .= "\t\t\t\t" . "</div>" . "\n";

            }

            return $book;

        }
        echo ("\t\t\t" . "</div>" . "\n");
    } else {
        echo "Aucun livre trouvé.";
    }
}

?>
