<?php
    require_once "dbconnect.php";
    if (isset($_GET['category']))
        $cty_id = $_GET['category'];
    else
        exit("<p>Category error...</p>");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bookeater</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>
        <?php require_once "header.php"; ?>

        <section>
            <?php
                $res = $pdo->query("SELECT category FROM Categories where cid='$cty_id'");
                $row = $res->fetch(PDO::FETCH_ASSOC);
                if (!isset($row['category'])) exit("<p>Error while fetching data...</p>");
                $cty_name = $row['category'];

                printf('<div class="cells-title"><span>%s</span></div>', $cty_name);
                echo('<div class="cells">');
                // query all the products associated with the category
                $stmt = $pdo->query("SELECT ISBN, title, author, price, img FROM Books WHERE category='$cty_id'");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    printf ('<div class="cell">
                        <a href="detail.php?pid=%s"><img src="%s"></a>
                        <div class="book-title cell-text">%s</div>
                        <div class="book-author cell-text">by %s</div>
                        <div class="book-price cell-text">$%.2f</div>
                        </div>', $row['ISBN'], $row['img'], $row['title'],
                        $row['author'], $row['price']);
                }
                echo ('</div>');
            ?>
        </section>
    </body>
</html>
