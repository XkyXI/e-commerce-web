    <?php require_once "header.php"; ?>

        <section>
            <?php
                if (isset($_GET['search']))
                    $query = $_GET['search'];
                else
                    exit('<div class="cells-title"><span>Error</span></div>');

                $min_query_length = 3;
                if (strlen($query) >= $min_query_length) {
                    // query title, author, ISBN(exact), and category
                    $sql = "SELECT DISTINCT `title`, `author`, `price`, `ISBN`, `img` FROM `Books`, `Categories` WHERE (
                                UPPER(`Books`.`title`) LIKE UPPER(:ql) or UPPER(`Books`.`author`) LIKE UPPER(:ql) or
                                (`Books`.`ISBN` = :q) or `Categories`.`cid` = `Books`.`category` AND
                                UPPER(`Categories`.`category`) LIKE UPPER(:ql))";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['ql' => "%$query%", 'q' => $query]);
                    $res = $stmt->fetchAll();

                    if (sizeof($res) > 0) { // display items if there are more than one
                        printf('<div class="cells-title"><span>%d results</span></div>', sizeof($res));
                        echo('<div class="cells">');
                        foreach ($res as $row) {
                            printf ('<div class="cell">
                                <a href="detail.php?pid=%s"><img src="%s"></a>
                                <div class="book-title cell-text">%s</div>
                                <div class="book-author cell-text">by %s</div>
                                <div class="book-price cell-text">$%.2f</div>
                                </div>', $row['ISBN'], $row['img'], $row['title'],
                                $row['author'], $row['price']);
                        }
                        echo("</div>");
                    } else {
                        echo('<div class="cells-title"><span>No results found</span></div>');
                    }
                } else {
                    echo('<div class="cells-title"><span>Minimum '. $min_query_length .' characters</span></div>');
                }
            ?>
        </section>
    </body>
</html>
