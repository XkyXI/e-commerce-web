<h1 id="title"> <a href="index.html">Bookeater</a> </h1>
<header>
    <nav>
        <li> <a href="index.html">Home</a> </li>
        <?php
            // query all the different categories and put them in a li
            if (!isset($cty_id)) $cty_id = "";
            
            $res = $pdo->query('SELECT cid, category FROM Categories');
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                echo ('<div class="headerDivider"></div>');
                echo ('<li> <a href="category.php?category=' . $row['cid'] . '"');
                if ($row['cid'] == $cty_id)
                    echo (' class="active"');
                echo('>' . $row['category'] . '</a> </li>');
            }
        ?>
    </nav>
</header>
