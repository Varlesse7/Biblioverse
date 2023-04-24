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
	<?php
	session_start();
	$search = isset($_SESSION['search']) ? $_SESSION['search'] : '';
	$genre = isset($_SESSION['genre']) ? $_SESSION['genre'] : '';
	$autheur = isset($_SESSION['autheur']) && $_SESSION['autheur'] ? 'checked' : '';
	?>
    <div class="seach-bar">
        <form method="GET" action="recherche.php">
		<center><input type="text" name="search" id="search" placeholder="Un mot-clé, un titre ou un auteur" style="width: 250px;border: 1px solid #ccc;" value="<?php echo $search; ?>">
		<input type="checkbox" name="autheur" value="autheur" <?php echo $autheur; ?>> Autheur</center>
		<br>
		<center><label for="genre">Genre :</label>
		<select name="genre" id="genre">
			<option value="" <?php if($genre == ''){echo 'selected';} ?>>Tous les genres</option>
			<option value="art" <?php if($genre == 'art'){echo 'selected';} ?>>Art</option>
			<option value="biography" <?php if($genre == 'biography'){echo 'selected';} ?>>Biographie</option>
			<option value="comics" <?php if($genre == 'comics'){echo 'selected';} ?>>BD</option>
			<option value="computers" <?php if($genre == 'computers'){echo 'selected';} ?>>Informatique</option>
			<option value="cooking" <?php if($genre == 'cooking'){echo 'selected';} ?>>Cuisine</option>
			<option value="education" <?php if($genre == 'education'){echo 'selected';} ?>>Éducation</option>
			<option value="fiction" <?php if($genre == 'fiction'){echo 'selected';} ?>>Fiction</option>
			<option value="history" <?php if($genre == 'history'){echo 'selected';} ?>>Histoire</option>
			<option value="medical" <?php if($genre == 'medical'){echo 'selected';} ?>>Médecine</option>
			<option value="music" <?php if($genre == 'music'){echo 'selected';} ?>>Musique</option>
			<option value="nature" <?php if($genre == 'nature'){echo 'selected';} ?>>Nature</option>
			<option value="poetry" <?php if($genre == 'poetry'){echo 'selected';} ?>>Poésie</option>
			<option value="religion" <?php if($genre == 'religion'){echo 'selected';} ?>>Religion</option>
			<option value="science" <?php if($genre == 'science'){echo 'selected';} ?>>Science</option>
			<option value="travel" <?php if($genre == 'travel'){echo 'selected';} ?>>Voyages</option>
			
		</select>
		</center>
		<br>
		<center><button type="submit">Rechercher</button></center>
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
        <span>Biblioverse</span>
        <a href="index.php"><img src="./images/petit_Icon.png"></a>
    </div>
</header>

