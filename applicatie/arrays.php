<?php 
$landen = ['Nederland', 'Duitsland'];
$landen[] = 'Peru';

$fruit = ['Appel', 'Peer'];


$knop =[
    'hoogte' => 100,
    'breedte' => 200,
    'tekst' => 'Jijweeniewieikben',
    'knop-radius' => '5%'
];
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
    echo var_dump($landen);
    ?>
    <br>
    <?php
    echo $fruit[1];
    ?>
    <br>
    <?php
    echo var_dump($knop);
    ?>
</body>
</html>