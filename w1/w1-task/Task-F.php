<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    function checkAge($age) {

        return $age >= 21;

    }

    $Person = [

        "name" => "Bob",
        "age" => 21,

    ];

    if (checkAge($Person["age"])) {

        echo $Person["name"] . " can come in!";

    } else {

        echo $Person["name"] . " GET OUT! you're not 21 and over!";

    }
?>

</body>
</html>