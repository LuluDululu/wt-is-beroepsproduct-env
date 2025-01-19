<?php
require_once 'db_connectie.php';

$db = maakVerbinding();
$sql = 'SELECT * FROM Componist';
$dataset = $db->query($sql);

function toonTabelInhoud($dataset){
$html = '';

$html .= '
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    table, th, td {
        border: 1px solid black;
    }
    th {
        background-color: black;
        color: white;
    }
    td {
        padding: 8px;
        text-align: left;
    }
</style>';

$html .= '<table>';

$headers = array_keys($dataset->fetch(PDO::FETCH_ASSOC)); 

$html .= '<thead><tr>';

foreach($headers as $head){
$html .= '<th>' . $head . '</th>';
}

$html .= '</tr></thead>';
foreach($dataset as $row){
$html .= '<tr>';

for($i = 0; $i < count($row)/2; $i++){
    $html .= '<td>' . $row[$i] . '</td>';
        }
    }

    $html .= '</tr></table>';
    return $html;
}

function voegInhoudAanTabelToe($db, $tabelNaam, $data){

}

echo toonTabelInhoud($dataset);

?>