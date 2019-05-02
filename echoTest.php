<?php
    $a = "1";
    $b = "2";
    $d = 3;
    $c = "mysql:host=$a; dbname=$b";
    printf('<p><b>Title:</b> %s </p>
            <p><b>Author:</b> %s </p>
            <p><b>Edition:</b> %s </p>
            <p><b>Price:</b> $%d </p>
            <p><b>Year:</b> %d </p>
            <p><b>ISBN:</b> %s </p>
            <p><b>Publisher:</b> %s </p>',
            $a, $a, $a,
            $d, $d, $a, $a);
    if (isset($e))
        echo ('$e is set <br>');
    else
        echo ('$e is not set <br>');
    echo('done');
?>
