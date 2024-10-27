<?php

include (__DIR__ . '/db.php');

function getPatients(){
    global $db;

    $results = [];

    $stmt = $db->prepare("SELECT * FROM patients");

    if($stmt->execute() && $stmt->rowCount() > 0){
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

function addPatient($tpatientFirstName, $tpatientLastName, $tpatientMarried, $tpatientBirthDate){
    global $db;

    $result = "";

    //convert the date to the correct format
    $date = DateTime::createFromFormat('m/d/Y', $tpatientBirthDate);
    if ($date === false) {
        return "invalid format";
    }
    $formattedDate = $date->format('Y-m-d');

    $sql = "INSERT INTO patients (patientFirstName, patientLastName, patientMarried, patientBirthDate) 
            VALUES (:f, :l, :m, :b)";

    $stmt = $db->prepare($sql);

    $binds = array(
        ":f" => $tpatientFirstName,
        ":l" => $tpatientLastName,
        ":m" => $tpatientMarried,
        ":b" => $formattedDate
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = "Data Added";
    }

    return $result;
}
?>