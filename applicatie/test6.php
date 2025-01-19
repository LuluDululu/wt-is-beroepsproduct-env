<?php

require_once 'db_connectie.php';

try {
    $db = maakVerbinding();

    // Overhevelen van POST-data naar variabelen met validatie
    $componistId = $_POST['componistId'] ?? 12; // Default waarde als POST leeg is
    $naam = $_POST['naam'] ?? null;
    $geboortedatum = $_POST['geboortedatum'] ?? null;
    $schoolId = $_POST['schoolId'] ?? null;

    if (!$naam || !$geboortedatum || !$schoolId) {
        throw new Exception('Alle velden moeten worden ingevuld.');
    }

    // Controleer of schoolId bestaat in de tabel Muziekschool
    $checkSql = 'SELECT COUNT(*) FROM dbo.Muziekschool WHERE schoolId = :schoolId';
    $checkStmt = $db->prepare($checkSql);
    $checkStmt->execute([':schoolId' => $schoolId]);
    $exists = $checkStmt->fetchColumn();

    if (!$exists) {
        throw new Exception("De opgegeven schoolId ($schoolId) bestaat niet in de tabel Muziekschool.");
    }

    $checkSql3 = 'SELECT componistId FROM Componist WHERE componistId = :componistId';
    $checkStmt3 = $db->prepare($checkSql);
    $checkStmt3->execute([':componistId' => $componistId]);
    $componistIdExists = $checkStmt3->fetchcolumn();

    if($componistIdExists){
        $checkSql2 = 'SELECT MAX(componistId) + 1 AS nextId FROM Componist';
        $checkStmt2 = $db->query($checkSql2);
        $newComponistId = $checkStmt2->fetchcolumn();

        $insertSql = 'INSERT INTO Componist (componistId, naam, geboortedatum, schoolId)
        VALUES (:componistId, :naam, :geboortedatum, :schoolId)';
        $insertStmt = $db->prepare($insertSql);
        $success = $insertStmt->execute([
        ':componistId' => $newComponistId,
        ':naam' => $naam,
        ':geboortedatum' => $geboortedatum,
        ':schoolId' => $schoolId,
        ]);
    }

 

    // Insert query met placeholders
    $sql = 'INSERT INTO componist (componistId, naam, geboortedatum, schoolId)
            VALUES (:componistId, :naam, :geboortedatum, :schoolId);';

    $stmt = $db->prepare($sql);

    // Data array voor de query
    $data = [
        ':componistId' => $componistId,
        ':naam' => $naam,
        ':geboortedatum' => $geboortedatum,
        ':schoolId' => $schoolId,
    ];

    // Uitvoeren van de query
    $succes = $stmt->execute($data);

    if ($succes) {
        echo 'Gegevens zijn opgeslagen in de database.';
    } else {
        echo 'Er ging iets fout bij het opslaan.';
    }
} catch (PDOException $e) {
    echo 'Databasefout: ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Fout: ' . $e->getMessage();
}
?>

<html lang="nl"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componinst - nieuw</title>
    <link href="normalize.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <form action="01-componist-new.php" method="post">
        <label for="componistId">ComponistId</label>
        <input type="number" id="componistId" name="componistId"><br>
        <label for="naam">naam</label>
        <input type="text" id="naam" name="naam" fdprocessedid="es09ff"><br>

        <label for="geboortedatum">geboortedatum</label>
        <input type="date" id="geboortedatum" name="geboortedatum"><br>

        <label for="schoolId">schoolId</label>
        <input type="text" id="schoolId" name="schoolId" fdprocessedid="dejvtd"><br>

        <input type="reset" id="reset" name="reset" value="wissen">
        <input type="submit" id="opslaan" name="opslaan" value="opslaan" fdprocessedid="fmr3jc">    
    </form>


<span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span></body></html>