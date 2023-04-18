<?php

function search()
{
    global $item_count;
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $type = $_GET['type'] ?? '';

        $url = "https://www.googleapis.com/books/v1/volumes?q=";

        if ($type == 'author') {
            $url .= "inauthor:" . urlencode($search);
        } else {
            $url .= "intitle:" . urlencode($search);
        }
        if (isset($_GET['page'])) {
            $url .= '&startIndex=' . $_GET['page'] . '&maxResults=30&key=AIzaSyCs1ePjCy_8Wkd1UrWYho8PHIfTEOU754E';
        } else {
            $url .= '&startIndex=0&printType=books&maxResults=30&key=AIzaSyCs1ePjCy_8Wkd1UrWYho8PHIfTEOU754E';

        }
        $json = file_get_contents($url);

        $data = json_decode($json, true);


        if (isset($data['items'])) {
            $book = "\t\t\t" . '<div class="container">' . "\n";
            foreach ($data['items'] as $item) {
                $thumbnail = $item['volumeInfo']['imageLinks']['thumbnail'] ?? '';

                $title = $item['volumeInfo']['title'] ?? '';

                $authors = isset($item['volumeInfo']['authors'])
                    ? implode(", ", $item['volumeInfo']['authors'])
                    : '';
                $publisher = $item['volumeInfo']['publisher'] ?? '';

                $publishedDate = $item['volumeInfo']['publishedDate'] ?? '';

                $pageCount = $item['volumeInfo']['pageCount'] ?? '';

                $description = $item['volumeInfo']['description'] ?? '';
                if ($thumbnail) {

                    $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
                    $book .= "\t\t\t\t" . "<img src='" . $thumbnail . "'>" . "\n";

                    $book .= "\t\t\t\t" . "<div class='information_book'>" . "\n";
                    $book .= "\t\t\t\t\t" . "<strong>" . $title . "</strong>" . "\n";
                    $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
                    $book .= "\t\t\t\t" . "</div>" . "\n";


                    $book .= "\t\t\t\t" . "</div>" . "\n";


                } else {
                    $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
                    $book .= "\t\t\t\t" . "<img src='" . "images/placeholder.png" . "'>" . "\n";

                    $book .= "\t\t\t\t" . "<div class='information_book'>" . "\n";
                    $book .= "\t\t\t\t\t" . "<strong>" . $title . "</strong>" . "\n";
                    $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
                    $book .= "\t\t\t\t" . "</div>" . "\n";


                    $book .= "\t\t\t\t" . "</div>" . "\n";
                }
            }
            return array($data['totalItems'], $book);
        } else {
            return "Aucun livre trouvé.";
        }
    }
    return null;

}

?>