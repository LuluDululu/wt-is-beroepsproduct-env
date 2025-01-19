<?php
require_once 'db_connectie.php';

$db = maakVerbinding();
$sql = 'select * from Stuk';
$dataset = $db->query($sql);

function toonTabelInhoud($dataset){
    $html = '';

    $html .= '<table>';

    $header = array_keys($dataset->fetch(PDO::FETCH_ASSOC));

    $html .= '<thead><tr>';

    foreach($header as $head){
    $html .= '<th>' . $head . '</th>';
    }

    $html .= '</tr></thead>';

    foreach($dataset as $row){
        $html .= '<tr>';

        for($i = 0; $i < (count($row)/2); $i++){
            $html .= '<td>' . $row[$i] . '</td>';
        }
    }
    $html .= '/table>';
    return $html;
}


// Functie om gegevens in te voegen
function voegDataIn($db, $tabelnaam, $data) {
    // Maak een dynamische SQL-query aan
    $kolommen = implode(', ', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));
    $sql = "INSERT INTO $tabelnaam ($kolommen) VALUES ($placeholders)";
    
    // Bereid de query voor en voer deze uit
    $stmt = $db->prepare($sql);
    
    try {
        $stmt->execute($data);
        echo "Data succesvol ingevoegd.";
    } catch (PDOException $e) {
        echo "Fout bij invoegen: " . $e->getMessage();
    }
}

// Voorbeeld: gegevens om in te voegen
$voorbeeldData = [
    'stuknr' => '11',
    'componistId' => '5',
    'titel' => 'SA',
    'stuknrOrigineel' => null,
    'genrenaam' => 'klassiek',
    'niveaucode' => 'B',
    'speelduur' => '4.0',
    'jaartal' => '1945'

];

// Roep de functie aan om gegevens in te voegen
voegDataIn($db, 'Stuk', $voorbeeldData);
echo toonTabelInhoud($dataset);
$sql = 'SELECT * FROM Stuk';
$dataset = $db->query($sql);
echo toonTabelInhoud($dataset);
?>