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
    <link rel="icon" href="./images/book.ico" type="image/icon"/>
</head>
<body>
<header>
    <p>Profil</p>
    <div class="seach-bar">
        <form class="filtre" method="get" action="index.php">
            <button>Filtre</button>
        </form>

        <form class="barre_de_recherche" method="get" action="index.php">
            <label>
                <input type="search" name="q" placeholder="Recherche"/>
            </label>
        </form>
    </div>
    <div class="icon">
        <p class="title">Biblioverse</p>
        <img src="./images/petit_Icon.png">


    </div>
</header>

