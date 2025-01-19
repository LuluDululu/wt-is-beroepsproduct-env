<?php
$voornaam = "Fardad";
$achternaam = "nejad";
$naam = $voornaam . ' ' . $achternaam;
$getal = "vijftien ";

$vandaag = date_create('now');
$datum = $vandaag->format('d-F-Y');
$value = 15;
$decimal = 23.34;

$artikelen = 'blyet'

function genereerHeader($titeltekst) {
    return "<h1>{$titeltekst}</h1>";
}

$html = ""; // Zorg dat $html een startwaarde heeft
$voornaam = "Fardad"; // Of een andere waarde
$html .= genereerHeader($voornaam); // Voeg de header toe aan de $html

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>PHP voorbeeld</title>
</head>
<body>
<?php 
$boolean = is_numeric($value);
echo $boolean ? 'ja' : 'nee';

$rounded = round($decimal);

echo $rounded;
?>

<?php
echo $html;
?>

<?php 
echo 'Dit zijn ' . $artikelen . ' van ' . $naam;
echo "Dit zijn $artikelen van $naam";
echo "Dit zijn {$artikelen} van {$naam}";
?>
    <!DOCTYPE html>
<html>
<body>

<?php

?>

</body>
</html>
</body>
</html>
