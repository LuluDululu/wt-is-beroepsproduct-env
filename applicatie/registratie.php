<?php

require_once 'db_connectie.php';

$melding = '';

function sanitize($value){
    return htmlspecialchars(strip_tags($value));
}

if (isset($_POST['registreren'])) {
    $username = isset($_POST['naam']) ? sanitize($_POST['naam']) : null;
    $password = isset($_POST['wachtwoord']) ? sanitize($_POST['wachtwoord']) : null;

    if ($username === null || $password === null) {
        $melding = 'Missing username or password';
    } else {
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
        $db = maakVerbinding(); // Zorg ervoor dat deze functie correct is geïmplementeerd.
        $sql = 'INSERT INTO logins (username, password) VALUES (:username, :password)';
        $query = $db->prepare($sql);
        $succes = $query->execute(array(
            'username' => $username,
            'password' => $passwordhash,
        ));

        if ($succes) {
            $melding = 'Login toegevoegd';
        } else {
            $melding = 'Registratie mislukt';
        }
    }
}

// stappenplan
// gebruiker wilt registreren
// als de gebruiker de gegevens bevestigd heeft door op verzenden te drukken
// gegevens worden gelokaliseerd naar een variabele met een $_POST superglobal, en gesanitized door de functie sanitize waarin htmlspecialchars zit, en ook worden ze gecontroleerd met htmlspecialchars
// als alles klopt, password hashen
// sql query schrijven
// sql query voorbereiden met prepare
// sql query executen met execute
//melding tonen





//controleren of data verstuurd is dmv isset($_POST['gegevens'])



echo $melding;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratieformulier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f9;
        }
        form {
            max-width: 400px;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .melding {
            margin-top: 15px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h1>Registratieformulier</h1>

<form action="registratie.php" method="POST">
    <label for="naam">Gebruikersnaam:</label>
    <input type="text" id="naam" name="naam" placeholder="Voer je gebruikersnaam in" required>
    
    <label for="wachtwoord">Wachtwoord:</label>
    <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Voer je wachtwoord in" required>
    
    <button type="submit" name="registreren">Registreren</button>
</form>

<!-- Dit is optioneel voor het weergeven van meldingen -->
<?php if (!empty($melding)): ?>
    <div class="melding">
        <?php echo htmlspecialchars($melding); ?>
    </div>
<?php endif; ?>

</body>
</html>

