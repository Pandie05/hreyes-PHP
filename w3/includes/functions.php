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