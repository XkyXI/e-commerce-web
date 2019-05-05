<?php
    require_once "dbconnect.php";
    if (isset($_GET['q'])) {
        $query = $_GET['q'];
        // title, author, isbn(exact), category
        $sql = "SELECT * FROM `ZipCode` WHERE `zip` = :q";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['q' => $query]);
        $res = $stmt->fetch();

        $resp = new stdClass();
        $resp->city = "";
        $resp->state = "";
        if (isset($res['state']) && isset($res['city'])) {
            $resp->city = $res['state'];
            $resp->state = $res['city'];
        }
        echo json_encode($resp);
    }
?>
