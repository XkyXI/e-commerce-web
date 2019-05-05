<?php require_once "dbconnect.php"; ?>

<h1 id="title"> <a href="/">Bookeater</a> </h1>
<header>
    <nav>
        <?php
            // query all the different categories and put them in the nav bar
            if (!isset($cty_id)) $cty_id = "";

            if ($cty_id == "index") echo ('<a href="/" class="active">Home</a>');
            else                    echo ('<a href="/">Home</a>');

            $cty_stmt->execute();
            $res = $cty_stmt->fetchAll();
            foreach ($res as $row) {
                $active = ($row['cid'] == $cty_id) ? ' class="active"' : "";
                printf('<a href="category.php?category=%s" %s> %s </a>',
                        $row['cid'], $active, $row['category']);
            }
        ?>
        <div class="search-container">
            <form action="/search.php" method="get">
                <input type="text" name="search" required="" placeholder="Type here to search...">
            </form>
        </div>
    </nav>
</header>
