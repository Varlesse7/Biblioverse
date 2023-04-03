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
		<button id="filter-btn">Filtrer</button>

		<div id="filter-popover">
		  <form method="post" action="index.php">
			<label for="filter">Filtrer par:</label>
			<select name="filter" id="filter">
			  <option value="">--Choisir--</option>
			  <option value="title">Titre</option>
			  <option value="author">Auteur</option>
			  <option value="genre">Genre</option>
			</select>
			<input type="submit" value="Filtrer">
		  </form>
		</div>
		<script src="script.js"></script>
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$filter = $_POST['filter'];
		}
		?>


        <form method="GET" action="">
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
        <img src="./images/petit_Icon.png">
        
    </header>

