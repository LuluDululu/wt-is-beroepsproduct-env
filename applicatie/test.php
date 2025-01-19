<?php
require_once 'db_connectie.php';
require_once 'db_functions.php';

$db = maakVerbinding();
?>

<body>
<?php
echo toonTabel($db, 'stuk');
echo toonTabel($db, 'componist');
?>
</body>

