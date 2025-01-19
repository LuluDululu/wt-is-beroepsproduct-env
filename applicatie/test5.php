<?php
session_start();
if(isset($_SESSION['voornaam'])){
  $welkom = '<h3> Hartelijk welkom, ' . htmlspecialchars($_SESSION['voornaam']) . ' ' . htmlspecialchars($_SESSION['achternaam']) '</h3>';
  echo $welkom;
} else{
  ?>
  <form method="post" action="verwerk.php">
    <div>
      <label for="voornaam">Voornaam:</label>
      <input type="text" name="voornaam" id="voornaam">
    </div>
    <div>
      <label for="achternaam">Achternaam: </label>
      <input type="text" name="achternaam" id="achternaam">
    </div>
    <input type="hidden" name="oorsprong" value="formulierpagina">
    <input type="submit" name="verzenden">
  </form>
  <?php
    }
    // De sessievariabelen weer opruimen:
    unset($_SESSION['voornaam']);
    unset($_SESSION['achternaam']);
  ?>

