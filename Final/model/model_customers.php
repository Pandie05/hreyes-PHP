<?php

include (__DIR__ . '/db.php');

function getCustomer() {
    global $db;

    $results = [];

    $sql = "SELECT * FROM feedback";

    $stmt = $db->prepare($sql);

    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

function addCustomer($age, $gender, $DOV, $location, $rating, $cashier, $FT, $OO, $comments) {
    global $db;

    $result = "";

    $date = DateTime::createFromFormat('Y-m-d', $DOV);
    if ($date === false) {
        return "Invalid date format";
    }
    $formattedDate = $date->format('Y-m-d');
    
    $sql = "INSERT INTO feedback (age, gender, DOV, location, rating, cashier, FT, OO, comments) 

        VALUES (:a, :g, :d, :l, :r, :c, :f, :o, :cm)";

    $stmt = $db->prepare($sql);

    $binds = array(
        ":a" => $age,
        ":g" => $gender,
        ":d" => $formattedDate,
        ":l" => $location,
        ":r" => $rating,
        ":c" => $cashier,
        ":f" => $FT,
        ":o" => $OO,
        ":cm" => $comments
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = "Data Added";
    }

    return $result;

}