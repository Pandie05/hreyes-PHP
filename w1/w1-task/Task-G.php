<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    // function to check number
    function fizzBuzz($num) {
    
        // use mod opperator to check stuff
        if ($num % 6 == 0) {

            return "Fizz Buzz";

        } elseif ($num % 2 == 0) {

            return "Fizz";

        } elseif ($num % 3 == 0) {

            return "Buzz";

        } else {

            return $num;

        }
    }

    // display numbers 1-100 and fizz buzz if meets conditions
    for ($i = 1; $i <= 100; $i++) {
        echo fizzBuzz($i) . "<br>";
    }
?>

</body>
</html>