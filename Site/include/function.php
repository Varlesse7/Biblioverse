<?php
function search()
{
    global $docs_count;
	$url = "https://openlibrary.org/search.json?";
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
		$url.="q=".urlencode($search);
	}
    if(isset($_GET['type'])){
		$type = $_GET['type'];
        if ($type == 'author') {
            $url .= "&author=". urlencode($search)."&sort=new";
        }
		if($type=="title") {
            $url .= "&title=" . urlencode($search);
        }
	}
	if(isset($_GET['genre']) && !empty($_GET['genre'])) {
		$genre = $_GET['genre'];
		$url .="&subject=".urlencode($genre);
		}
		echo $url;
        $json = file_get_contents($url);

        $data = json_decode($json, true);


        if (isset($data['docs'])) {
            $book = "\t\t\t" . '<div class="container">' . "\n";
            foreach ($data['docs'] as $docs) {
                $isbn = $docs['isbn']?? '';

                $title = $docs['title'] ?? '';
                $authors = isset($docs['author_name'])
                    ? implode(", ", $docs['author_name'])
                    : '';
                $description = $docs['volumeInfo']['description'] ?? '';
                if ($isbn) {
					$isbn = $isbn[0];
					$thumbnail="https://covers.openlibrary.org/b/isbn/".$isbn."-M.jpg";
                    $book .= "\t\t\t\t" . '<div class="book-container">' . "\n";
                    $book .= "\t\t\t\t" . "<img src='" . $thumbnail . "'>" . "\n";
					
                    $book .= "\t\t\t\t" . "<div class='information_book'>" . "\n";
                    $book .= "\t\t\t\t\t" . "<strong>" . $title . "</strong>" . "\n";
                    $book .= "\t\t\t\t\t" . "<span>Auteur: " . $authors . "</span>" . "\n";
                    $book .= "\t\t\t\t\t" . "<span>" . $thumbnail . "</span>" . "\n";
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
            return $book;
        } else {
            return "Aucun livre trouvé.";
        }
    }



?>