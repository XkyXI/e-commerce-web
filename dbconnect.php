<?php
    require $_SERVER['DOCUMENT_ROOT'].'/../dbconfig.php';
    $hostname = HOSTNAME;
    $dbname = DBNAME;
    $username = USERNAME;
    $password = PASSWORD;
    try {
        $pdo = new PDO("mysql:host=$hostname; dbname=$dbname", $username, $password);
        // see the "errors" folder for details
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare for common statements to execute
        $cty_stmt = $pdo->prepare('SELECT cid, category FROM Categories');
    } catch (Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
?>
