<?php

$title = "Biblioverse";
$description = "Vous pouvez rentrer dans le monde des livres";
$currentPage = "stats";

require("include/header.inc.php");
?>
<main>
    <h1>Statistiques des visites</h1>
    
	<?php
    $visites = 0;
    if (file_exists("visites.txt")) {
        $lines = file("visites.txt");
        foreach ($lines as $line) {
            $data = explode("|", trim($line));
            $visites += intval($data[1]);
        }
    }
?>
<p>Nombre total de visites : <?php echo $visites; ?></p>


<?php
$lines = file('visites.txt');

$labels = array();
$values = array();

foreach ($lines as $line) {
    $parts = explode('|', $line);
    $labels[] = $parts[0];
    $values[] = $parts[1];
}

$max_value = max($values);

$svg_width = 1000;
$svg_height = 600;

$bar_width = $svg_width / count($values);
$bar_padding = $bar_width * 0.2;

$svg = '<svg width="' . $svg_width . '" height="' . $svg_height . '">';

for ($i = 0; $i < count($values); $i++) {
    $x = $i * $bar_width + $bar_padding;
    $y = $svg_height - $values[$i] * $svg_height / $max_value;
    $height = $values[$i] * $svg_height / $max_value;

    $svg .= '<rect x="' . $x . '" y="' . $y . '" width="' . ($bar_width - 2 * $bar_padding) . '" height="' . $height . '" fill="#0077CC" />';
    $svg .= '<text x="' . ($x + ($bar_width - 2 * $bar_padding) / 2) . '" y="' . ($y - 5) . '" text-anchor="middle" fill="#000000">' . $labels[$i] . '('.$values[$i].')</text>';
}

$svg .= '</svg>';
echo $svg;
?>
<main>

<?php require("./include/footer.inc.php"); ?>
</html>

