<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>string concat</h1>

<?php
    $sword1 = "Hello";
    $sword2 = "World!";
?> 

<p><?php echo $sword1 . '' . $sword2; ?></p>

<p><?php echo $sword1 . $sword2; ?></p>

<p><?php echo "$sword1 $sword2"; ?></p>

</body>
</html>