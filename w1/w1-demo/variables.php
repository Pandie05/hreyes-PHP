<?php

    $stuff = true;

    $stuff = 10;

    $stuff = array('bird', 'cat', 'dog', 'fish');

    $stuffLength = count($stuff);

    $title = "my php site";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
</head>
<body>
    
    <ul>
        <?php for($i = 0; $i < $stuffLength; $i++){ ?>
        <li><?= $stuff[$i]; ?><li>
        <?php } ?>
    </ul>

    <ul>
        <?php foreach($stuff as $s): ?>
            <li><?= $s; ?></li>
        <?php endforeach; ?>

    </ul>

</body>
</html>