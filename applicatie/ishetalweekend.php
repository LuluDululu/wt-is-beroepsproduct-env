<?php
$dag = $_GET['dag'];

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

    switch($dag){
        case 1: 
        case 2:
            echo 'Nee, nog lang niet!';
            break;
        case 3:
        case 4:
            echo 'Nog even wachten';
            break;
        case 5:
            echo 'Nog een dag!';
            break;
        case 6:
        case 0:
            echo 'Ja, het is weekend!';
            break;

    }
  
    ?>
</body>
</html>