<?php

function headOrTails(){
    if(mt_rand(0,1) == 0) return "heads";
    return "tails";
}

function calcGrade($grade){
    if($grade >= 90){
        return "A";
    }
    else if($grade >= 80){
        return "B";
    }
}

function calcPoints($wins, $ot_losses){
    return ($wins * 2) + $ot_losses;
}

function age ($bdate) {
    $date = new DateTime($bdate);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
}
 
function isDate($dt) {
    $date_arr  = explode('-', $dob);
    return checkdate($date_arr[1], $date_arr[2], $date_arr[0]);
}
 
function bmi ($ft, $inch, $weight) {
    $height = ($ft * 12) + $inch;
    return round(($weight / ($height * $height)) * 703, 2);
}
 
function bmiDescription ($bmi) {
    if ($bmi < 18.5) {
        return "Underweight";
    } else if ($bmi >= 18.5 && $bmi <= 24.9) {
        return "Normal weight";
    } else if ($bmi >= 25 && $bmi <= 29.9) {
        return "Overweight";
    } else {
        return "Obese";
    }
}