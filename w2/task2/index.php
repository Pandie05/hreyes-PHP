<?php

function age($bdate) {
    $date = new DateTime($bdate);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
}

function isDate($dt) {
    $date_arr  = explode('-', $dt);
    if (count($date_arr) == 3) {
        return checkdate((int)$date_arr[1], (int)$date_arr[2], (int)$date_arr[0]);
    }
    return false;
}

function bmiDescription($bmi) {
    if ($bmi < 18.5) {
        return 'Underweight';
    } elseif ($bmi < 24.9) {
        return 'Normal weight';
    } elseif ($bmi < 29.9) {
        return 'Overweight';
    } else {
        return 'Obesity';
    }
}

$fname = '';
$lname = '';
$marry = '';
$bday = '';
$feet = '';
$inches = '';
$pounds = '';
$error = '';

// Validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (filter_input(INPUT_POST, 'fname') != '') {
        $fname = filter_input(INPUT_POST, 'fname');
    } else {
        $error .= 'Must enter a valid first name <br/>';
    }

    if (filter_input(INPUT_POST, 'lname') != '') {
        $lname = filter_input(INPUT_POST, 'lname');
    } else {
        $error .= 'Must enter a valid last name <br/>';
    }

    $marry = filter_input(INPUT_POST, 'marry');
    if ($marry != 'yes' && $marry != 'no') {
        $error .= 'Must enter a valid married status <br/>';
    }

    $bday = filter_input(INPUT_POST, 'bday');
    if ($bday != '') {
        if (!isDate($bday)) {
            $error .= 'Must enter a valid date of birth <br/>';
        }
    } else {
        $error .= 'Must enter a date of birth <br/>';
    }

    $feet = filter_input(INPUT_POST, 'feet', FILTER_VALIDATE_INT);
    $inches = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_INT);
    if ($feet === false || $feet < 0 || $feet > 8 || $inches === false || $inches < 0 || $inches >= 12) {
        $error .= 'Must enter a valid height <br/>';
    }

    $pounds = filter_input(INPUT_POST, 'pounds', FILTER_VALIDATE_FLOAT);
    if ($pounds === false || $pounds <= 0 || $pounds > 1000) {
        $error .= 'Must enter a valid weight <br/>';
    }

    if ($error == '') {
        // Convert height to cm
        $height = ($feet * 12 + $inches) * 2.54;

        // Convert weight to kg
        $weight = $pounds / 2.20462;

        // Calculate age
        $age = age($bday);

        // Calculate BMI
        $bmi = $weight / (($height / 100) ** 2);
        $bmi = round($bmi, 1);

        // Classify BMI
        $bmi_classification = bmiDescription($bmi);

        // Display confirmation page
        echo "<h1>Confirmation Page</h1>";
        echo "First Name: $fname <br/>";
        echo "Last Name: $lname <br/>";
        echo "Married: $marry <br/>";
        echo "Date of Birth: $bday <br/>";
        echo "Height: $height cm <br/>";
        echo "Weight: $weight kg <br/>";
        echo "Age: $age <br/>";
        echo "BMI: $bmi <br/>";
        echo "BMI Classification: $bmi_classification <br/>";
        exit;
    }
}


?>

<h1>Patient Form</h1>
<form method="post" action="">
    First Name: <input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>"><br/>
    Last Name: <input type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>"><br/>
    Married: 
    <select name="marry">
        <option value="yes" <?php if ($marry == 'yes') echo 'selected'; ?>>Yes</option>
        <option value="no" <?php if ($marry == 'no') echo 'selected'; ?>>No</option>
    </select><br/>
    Date of Birth: <input type="date" name="bday" value="<?php echo htmlspecialchars($bday); ?>"><br/>
    Height: <input type="text" name="feet" placeholder="Feet" value="<?php echo htmlspecialchars($feet); ?>"> ft 
            <input type="text" name="inches" placeholder="Inches" value="<?php echo htmlspecialchars($inches); ?>"> in<br/>
    Weight: <input type="text" name="pounds" placeholder="Pounds" value="<?php echo htmlspecialchars($pounds); ?>"> lbs<br/>
    <input type="submit" value="Submit">
</form>

<?php
if ($error != '') {
    echo "<div style='color: red;'>$error</div>";
}
?>
