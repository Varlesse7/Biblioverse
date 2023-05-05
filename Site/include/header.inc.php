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
    <link href="style_<?php
    if (isset($_GET['style'])) {
        echo($_GET['style']);
    } else if (isset($_COOKIE['style'])) {
        setcookie('style', $_COOKIE['style'], time() + 3600);
        echo($_COOKIE['style']);
    } else {
        echo('nuit');
    }
    ?>.css" rel="stylesheet"/>
    <link rel="icon" href="./images/petit_Icon.ico" type="image/icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
          integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
          integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<header>
    <a href="profil.php">Profil</a>
    <?php
    session_start();

    $genre = isset($_SESSION['genre']) ? $_SESSION['genre'] : '';
    ?>

    <div class="seach-bar">
        <form method="GET" action="recherche.php">
            <input type="text" name="search" id="search" placeholder="Un mot-clé, un titre ou un auteur"
                   style="width: 250px;border: 1px solid #ccc;" value="<?php
            if (isset($_GET['search'])) {
                echo($_GET['search']);
            } ?>">
            <input type="checkbox" name="autheur" value="autheur" <?php
            if (isset($_GET['autheur'])) {
                echo($_GET['search']);
            } ?>> Autheur</center>

            <label for="genre">Genre :</label>
            <select name="genre" id="genre">
                <option value="" <?php if ($genre == '') {
                    echo 'selected';
                } ?>>Tous les genres
                </option>
                <option value="art" <?php if ($genre == 'art') {
                    echo 'selected';
                } ?>>Art
                </option>
                <option value="biography" <?php if ($genre == 'biography') {
                    echo 'selected';
                } ?>>Biographie
                </option>
                <option value="comics" <?php if ($genre == 'comics') {
                    echo 'selected';
                } ?>>BD
                </option>
                <option value="computers" <?php if ($genre == 'computers') {
                    echo 'selected';
                } ?>>Informatique
                </option>
                <option value="cooking" <?php if ($genre == 'cooking') {
                    echo 'selected';
                } ?>>Cuisine
                </option>
                <option value="education" <?php if ($genre == 'education') {
                    echo 'selected';
                } ?>>Éducation
                </option>
                <option value="fiction" <?php if ($genre == 'fiction') {
                    echo 'selected';
                } ?>>Fiction
                </option>
                <option value="history" <?php if ($genre == 'history') {
                    echo 'selected';
                } ?>>Histoire
                </option>
                <option value="medical" <?php if ($genre == 'medical') {
                    echo 'selected';
                } ?>>Médecine
                </option>
                <option value="music" <?php if ($genre == 'music') {
                    echo 'selected';
                } ?>>Musique
                </option>
                <option value="nature" <?php if ($genre == 'nature') {
                    echo 'selected';
                } ?>>Nature
                </option>
                <option value="poetry" <?php if ($genre == 'poetry') {
                    echo 'selected';
                } ?>>Poésie
                </option>
                <option value="religion" <?php if ($genre == 'religion') {
                    echo 'selected';
                } ?>>Religion
                </option>
                <option value="science" <?php if ($genre == 'science') {
                    echo 'selected';
                } ?>>Science
                </option>
                <option value="travel" <?php if ($genre == 'travel') {
                    echo 'selected';
                } ?>>Voyages
                </option>

            </select>
            <button type="submit">Rechercher</button>
        </form>

        <?php
        /*
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $filter = $_POST['filter'];
        }
        */
        ?>

    </div>
    <div class="end-header">
        <?php
        parse_str($_SERVER['QUERY_STRING'], $args);
        $argument = "";
        if (!empty($args)) {
            foreach ($args as $arg => $valeur) {
                /*print_r(" a=" . $arg);
                print_r(" v=" . $valeur);*/


                if ($arg != "style") {
                    $argument .= "&" . $arg . "=" . $valeur;
                }
            }
        }

        if (isset($_GET['style']) && $_GET['style'] == "nuit") {

            setcookie('style', 'nuit', time() + 3600);

            $a = '<a href="' . $currentPage . '.php?style=jour' . $argument . '">Mode jour</a>';

        } else if (isset($_GET['style'])) {
            setcookie('style', 'jour', time() + 3600);

            $a = '<a href="' . $currentPage . '.php?style=nuit' . $argument . '">Mode nuit</a>';

        } else if (isset($_COOKIE['style']) && $_COOKIE['style'] == 'nuit') {

            setcookie('style', 'nuit', time() + 3600);

            $a = '<a href="' . $currentPage . '.php?style=jour' . $argument . '">Mode jour</a>';

        } else if (isset($_COOKIE['style'])){

            setcookie('style', 'jour', time() + 3600);

            $a = '<a href="' . $currentPage . '.php?style=nuit' . $argument . '">Mode nuit</a>';

        } else{

            $a = '<a href="' . $currentPage . '.php?style=jour' . $argument . '">Mode jour</a>';

        }
        echo($a);
        ?>
        <span>Biblioverse</span>
        <a href="index.php"><img src="./images/petit_Icon.png"></a>
    </div>
</header>

