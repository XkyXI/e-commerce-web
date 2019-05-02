<?php require_once "dbconnect.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            // change the title base on the category
            if (!isset($_GET['category'])) {
                exit("Category error");
            }
            $cty_id = $_GET['category'];
            $res = $pdo->query("SELECT category FROM Categories where cid=\"$cty_id\"");
            $row = $res->fetch(PDO::FETCH_ASSOC);
            if (!isset($row['category'])) {
                exit("Data error");
            }
            $cty_name = $row['category'];
            echo ('<title>Bookeater - ');
            echo ($cty_name);
            echo ('</title>');
        ?>
        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>
        <?php require_once "header.php"; ?>

        <section>
            <?php
                if (!(isset($cty_id) && isset($cty_name))) {
                    exit('Data error');
                }
                echo ('<div class="cells-title"><span>');
                echo ($cty_name);
                echo ('</span></div><div class="cells">');
                // query all the products associated with the category
                $stmt = $pdo->query("SELECT ISBN, title, author, price, img FROM Books WHERE category=\"$cty_id\"");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo ('<div class="cell">');
                    echo ('<a href="detail.php?pid=' . $row['ISBN'] . '"><img src="' . $row['img'] . '"></a>');
                    echo ('<div class="book-title cell-text">' . $row['title'] . '</div>');
                    echo ('<div class="book-author cell-text">by ' . $row['author'] . '</div>');
                    echo ('<div class="book-price cell-text">$' . $row['price'] . '</div>');
                    echo ('</div>');
                }
                echo ('</div>');
            ?>
        </section>
    </body>
</html>
