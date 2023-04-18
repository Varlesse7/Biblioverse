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
        <form method="GET" action="recherche.php">
		<label for="search">Recherche de livres:</label>
		<input type="text" name="search" id="search">
		<br>
		<input type="radio" id="title" name="searchby" value="title">
		<label for="title">Recherche par titre</label>
		<br>
		<input type="radio" id="author" name="searchby" value="author">
		<label for="author">Recherche par auteur</label>
		<br>
		<center><label for="genre">Genre :</label>
		<select name="genre" id="genre">
			<option value="">-- Sélectionnez un genre --</option>
			<option value="tennis rules">Règles sur Le Tenis (Test)</option>
			<option value="scifi">Science fiction</option>
			<option value="Fantastique">Fantastique</option>
			<option value="horror">Horreur</option>
			<option value="fantasy">Fantasy</option>
		</select></center>
		<br>
		<center><button type="submit">Rechercher</button></center>
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

