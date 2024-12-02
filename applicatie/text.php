<?php
$voornaam = "Fardad";
$achternaam = "nejad";
$naam = '{voornaam} {achternaam}';

$vandaag = date_create('now');
$datum = $vandaag->format('d-F-Y');

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>PHP voorbeeld</title>
</head>
<body>
    Hallo <?= $naam ?>.<br>
    Het is vandaag <?= $datum ?>.
    
    <!DOCTYPE html>
<html>
<body>

<?php
$date1=date_create('now');
$date2=date_create("2024-12-05");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");
?>

</body>
</html>
</body>
</html>
