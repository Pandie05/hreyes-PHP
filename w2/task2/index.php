<?php 

include 'includes/header.php'; 
include 'includes/functions.php';

$fname = '';
$lname = '';
$marry = '';
$bday = '';
$height = '';
$weight = '';
$error = '';

//validation
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

if (filter_input(INPUT_POST, 'marry') != '') {
    $marry = filter_input(INPUT_POST, 'marry');
} else {
    $error .= 'Must enter a valid married status <br/>';
}



?>

<h1>Patient Form</h1>


<hr/>

<!-- NHL Standings Form --> 
<div class="form-wrapper">

    <form name="patient" method="post">

        <div class="form-control">
            <label for="fname">First Name:</label><br/>
            <input type="text" id="fname" name="fname" value="<?= $fname; ?>">
        </div>

        <div class="form-control">
            <label for="lname">Last Name:</label><br />
            <input type="text" name="lname" value="<?= $lname; ?>">
        </div>

        <div class="form-control">
            <label for="marry">Married:</label><br />
            <input type="text" name="marry" value="<?= $marry; ?>">
        </div>

        <div class="form-control">
            <label for="bday">Birthday:</label><br />
            <input type="text" name="bday" value="<?= $bday; ?>">
        </div>

        <div class="form-control">
            <label for="height">Height:</label><br />
            <input type="text" name="height" value="<?= $height; ?>">
        </div>

        <div class="form-control">
            <label for="weight">Weight:</label><br />
            <input type="text" name="weight" value="<?= $weight; ?>">
        </div>

        <div class="form-submit">
            <input type="submit" name="nhl_standings_submit" value="Submit">
        </div>

    </form>

</div>


<?php include 'includes/footer.php'; ?>
