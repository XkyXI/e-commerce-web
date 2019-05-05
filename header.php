<?php require_once "dbconnect.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bookeater</title>
        <link rel="stylesheet" href="/css/style.css">
        <script type="text/javascript" src="/formScript.js"></script>
        <script type="text/javascript" src="/searchSuggest.js"></script>
    </head>
    <body>
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
                        <input type="text" name="search" onkeyup="javascript:updateSuggestion(this.value)"
                                required="" list="suggestList" placeholder="Type here to search...">
                    </form>
                    <datalist id="suggestList"></datalist>
                </div>
            </nav>
        </header>
