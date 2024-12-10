<?php

include (__DIR__ . '/db.php');

function getCustomers(){
    global $db;

    $results = [];

    $stmt = $db->prepare("SELECT * FROM feedback");

    if($stmt->execute() && $stmt->rowCount() > 0){
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

function getCustomerById($id) {
    global $db;

    $stmt = $db->prepare("SELECT * FROM feedback WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addCustomer($age, $gender, $date_of_visit, $location, $rating, $cashier, $fitting_room, $online_order, $comments) {
    global $db;

    $result = "";

    // Validate and sanitize inputs
    $age = filter_var($age, FILTER_VALIDATE_INT);
    $gender = strtolower($gender) == 'male' ? 1 : (strtolower($gender) == 'female' ? 2 : 3);
    $location = filter_var($location, FILTER_SANITIZE_STRING);
    $rating = filter_var($rating, FILTER_VALIDATE_INT);
    $cashier = filter_var($cashier, FILTER_VALIDATE_INT);
    $fitting_room = filter_var($fitting_room, FILTER_VALIDATE_INT);
    $online_order = filter_var($online_order, FILTER_VALIDATE_INT);
    $comments = filter_var($comments, FILTER_SANITIZE_STRING);

    $date = DateTime::createFromFormat('Y-m-d', $date_of_visit);
    if ($date === false) {
        return "Invalid date format";
    }
    $formattedDate = $date->format('Y-m-d');
    
    $sql = "INSERT INTO feedback (age, gender, date_of_visit, location, rating, cashier, fitting_room, online_order, comments) 
        VALUES (:a, :g, :d, :l, :r, :c, :f, :o, :cm)";

    $stmt = $db->prepare($sql);

    $binds = array(
        ":a" => $age,
        ":g" => $gender,
        ":d" => $formattedDate,
        ":l" => $location,
        ":r" => $rating,
        ":c" => $cashier,
        ":f" => $fitting_room,
        ":o" => $online_order,
        ":cm" => $comments
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = "Data Added";
    }

    return $result;
}

function updateCustomer($id, $age, $gender, $date_of_visit, $location, $rating, $cashier, $fitting_room, $online_order, $comments) {
    global $db;

    
    $age = filter_var($age, FILTER_VALIDATE_INT);
    $gender = strtolower($gender) == 'male' ? 1 : (strtolower($gender) == 'female' ? 2 : 3);
    $location = filter_var($location, FILTER_SANITIZE_STRING);
    $rating = filter_var($rating, FILTER_VALIDATE_INT);
    $cashier = filter_var($cashier, FILTER_VALIDATE_INT);
    $fitting_room = filter_var($fitting_room, FILTER_VALIDATE_INT);
    $online_order = filter_var($online_order, FILTER_VALIDATE_INT);
    $comments = filter_var($comments, FILTER_SANITIZE_STRING);

    $date = DateTime::createFromFormat('Y-m-d', $date_of_visit);
    if ($date === false) {
        return "Invalid date format";
    }
    $formattedDate = $date->format('Y-m-d');

    $sql = "UPDATE feedback SET age = :a, gender = :g, date_of_visit = :d, location = :l, rating = :r, cashier = :c, fitting_room = :f, online_order = :o, comments = :cm WHERE id = :id";
    $stmt = $db->prepare($sql);

    $binds = array(
        ":id" => $id,
        ":a" => $age,
        ":g" => $gender,
        ":d" => $formattedDate,
        ":l" => $location,
        ":r" => $rating,
        ":c" => $cashier,
        ":f" => $fitting_room,
        ":o" => $online_order,
        ":cm" => $comments
    );

    return $stmt->execute($binds);
}

function deleteCustomer($id) {
    global $db;

    $stmt = $db->prepare("DELETE FROM feedback WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}
?>
