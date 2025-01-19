<?php 
$date1 = date_create('now');
$datum = date_create($_GET['datum']);

$diff= date_diff($date1, $datum);
$omschrijving = $_GET['omschrijving'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo ' het duurt nog ' . $diff->format("%R%a days") . ' dagen tot ' . $omschrijving;
    
    ?>
</body>
</html>