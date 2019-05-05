<?php
    require_once "dbconnect.php";
    if (isset($_GET['q'])) {
        $query = $_GET['q'];
        // title, author, isbn(exact), category
        $sql = "SELECT DISTINCT `title` AS suggest FROM `Books` WHERE UPPER(`title`) LIKE UPPER(:ql)
                UNION
                SELECT DISTINCT `author` AS suggest FROM `Books` WHERE UPPER(`author`) LIKE UPPER(:ql)
                UNION
                SELECT DISTINCT `ISBN` AS suggest FROM `Books` WHERE `ISBN` = :q
                UNION
                SELECT DISTINCT `category` AS suggest FROM `Categories` WHERE UPPER(`category`) LIKE UPPER(:ql)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['q' => $query, 'ql' => "$query%"]);
        $res = $stmt->fetchAll();

        $slist = [];
        foreach ($res as $row)
            array_push($slist, $row['suggest']);

        $resp = new stdClass();
        $resp->suggestions = $slist;
        echo json_encode($resp);
    }
?>
