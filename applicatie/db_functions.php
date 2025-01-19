<?php
function toonTabelInhoud($dataset){
    $html = '';

    $html .= '<table>';
    foreach($dataset AS $row){
        //var_dump($row['titel']);
        $html .= '<tr>';
        for($i = 0; $i < (count($row)/2); $i++){
            $html .= '<td>' . $row[$i] . '</td>';
        }
    }
    $html .= '</table>';
    return $html;
}

function toonTabel($db, $tabelNaam){
    $sql = "select * from {$tabelNaam}"; 
    $dataset = $db->query($sql);

    $html = "<h2>{$tabelNaam}</h2>";
    $html .= toonTabelInhoud($dataset);
    return $html;
}
?>
