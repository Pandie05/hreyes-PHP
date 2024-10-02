<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- making Array -->
    <?php
        $animals = array("dog", "cat", "crocodile", "panda", "parrot"); 
    ?>

    <ul>
        <!-- for loop -->
        <?php foreach($animals as $animal): ?>
            <li><?= $animal; ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>