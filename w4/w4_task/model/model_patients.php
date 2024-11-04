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

function getPatientById($id) {
    global $db;

    $stmt = $db->prepare("SELECT * FROM patients WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addPatient($tpatientFirstName, $tpatientLastName, $tpatientMarried, $tpatientBirthDate){
    global $db;

    $result = "";

   
    $date = DateTime::createFromFormat('Y-m-d', $tpatientBirthDate);
    if ($date === false) {
        return "Invalid date format";
    }
    $formattedDate = $date->format('Y-m-d');

    
    $marriedStatus = ($tpatientMarried == 'yes') ? 1 : 0;

    $sql = "INSERT INTO patients (patientFirstName, patientLastName, patientMarried, patientBirthDate) 
            VALUES (:f, :l, :m, :b)";

    $stmt = $db->prepare($sql);

    $binds = array(
        ":f" => $tpatientFirstName,
        ":l" => $tpatientLastName,
        ":m" => $marriedStatus,
        ":b" => $formattedDate
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = "Data Added";
    }

    return $result;
}

function updatePatient($id, $firstName, $lastName, $married, $birthDate) {
    global $db;

    //make married an int
    $marriedStatus = ($married == 'yes') ? 1 : 0;

    //convert da date bc its better
    $date = DateTime::createFromFormat('Y-m-d', $birthDate);
    if ($date === false) {
        return "Invalid date format";
    }
    $formattedDate = $date->format('Y-m-d');

    $sql = "UPDATE patients SET patientFirstName = :f, patientLastName = :l, patientMarried = :m, patientBirthDate = :b WHERE id = :id";
    $stmt = $db->prepare($sql);

    $binds = array(
        ":id" => $id,
        ":f" => $firstName,
        ":l" => $lastName,
        ":m" => $marriedStatus,
        ":b" => $formattedDate
    );

    return $stmt->execute($binds);
}

function deletePatient($id) {
    global $db;

    $stmt = $db->prepare("DELETE FROM patients WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}
?>