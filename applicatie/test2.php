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
    
    foreach($header as $headers){
    $html .= '<th>' . $headers . '</th>';
    }

    $html .= '</tr></thead>';

    foreach($dataset as $row){ 
        $html .= '<tr>';

        for($i = 0; $i < (count($row)/2); $i++){
            $html .= '<td>' . $row[$i] . '</td>';
        }
    }
    $html .= '</table>';
    return $html;
}

echo toonTabelInhoud($dataset);

?>