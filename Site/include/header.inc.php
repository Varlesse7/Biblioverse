<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8"/>

    <meta name="author" content="Franck-Papuchon"/>
    <meta name="description" content="<?= $description ?>"/>
    <meta name="keywords" content="Php, Franck-Papuchon Pierre, Page"/>
    <meta name="Language" content="fr"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="date" content="15/02/2023"/>
    <meta name="place" content="CYU Tech"/>
    <link href="style_jour.css" rel="stylesheet"/>
    <link rel="icon" href="./images/petit_Icon.ico" type="image/icon"/>
</head>
<body>
<header>
    <p>Profil</p>
    <div class="seach-bar">
        <form class="filtre" method="get" action="index.php">
            <button>Filtre</button>
        </form>
        <form method="GET" action="recherche.php">
            <label for="search">Recherche de livres:</label>
            <input type="text" name="search" id="search" required>
            <br>
            <input type="radio" id="title" name="searchby" value="title" checked>
            <label for="title">Recherche par titre</label>
            <br>
            <input type="radio" id="author" name="searchby" value="author">
            <label for="author">Recherche par auteur</label>
            <br>
            <button type="submit">Rechercher</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $filter = $_POST['filter'];
        }
        ?>
    </div>
    <div class="end-header">
        <span>Biblioverse</span>
        <a href="index.php"><img src="./images/petit_Icon.png"></a>
    </div>
</header>

