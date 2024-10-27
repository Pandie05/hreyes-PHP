<?php
    include 'includes/header.php';
    include 'model/model_patients.php';

    $error = "";
    $patientFirstName = "";
    $patientLastName = "";
    $patientMarried = "";
    $patientBirthDate = "";

    if (isset($_POST['storePatient'])) {
        $patientFirstName = filter_input(INPUT_POST, 'firstName');
        $patientLastName = filter_input(INPUT_POST, 'lastName');
        $patientMarried = filter_input(INPUT_POST, 'married');
        $patientBirthDate = filter_input(INPUT_POST, 'birthDate');
        
        if ($patientFirstName == "") $error .= "<li>Please provide patient first name</li>";
        if ($patientLastName == "") $error .= "<li>Please provide patient last name</li>";
        if ($patientMarried == "") $error .= "<li>Please provide patient married status</li>";
        if ($patientBirthDate == "") $error .= "<li>Please provide patient birth date</li>";
        
        if ($error == ""){
            addPatient ($patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
            header('Location: viewPatients.php');
        }
    }
?>


<div class="container">
    <div class="col-sm-12"> 
        <a class='mar12' href="viewPatients.php">Back to View All Patients</a>
        <h2 class='mar12'>Add Patient</h2>
        <form name="patients" method="post">
            <?php
                if ($error != ""):
            ?>   

            <div class="error">
                <p>Please fix the following and resubmit</p>
                <ul style="color: red;">
                    <?php echo $error; ?>
                </ul>
            </div>

            <?php
                endif;
            ?>

            <div class="wrapper">
                <div class="form-group">
                    <div class="label">
                        <label for="patientFirstName" style="color: black;">First Name:</label>
                    </div>
                    <div>
                        <input type="text" id="patientFirstName" name="firstName" class="form-control" value="<?= $patientFirstName; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="label">
                        <label for="patientLastName" style="color: black;">Last Name:</label>
                    </div>
                    <div>
                        <input type="text" id="patientLastName" name="lastName" class="form-control" value="<?= $patientLastName; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="label">
                        <label for="patientMarried" style="color: black;">Married:</label>
                    </div>
                    <div>
                        <input type="text" id="patientMarried" name="married" class="form-control" value="<?= $patientMarried; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="label">
                        <label for="patientBirthDate" style="color: black;">Birth Date:</label>
                    </div>
                    <div>
                        <input type="text" id="patientBirthDate" name="birthDate" class="form-control" value="<?= $patientBirthDate; ?>" />
                    </div>
                </div>

                <div>
                    &nbsp;
                </div>

                <div>
                    <input type="submit" name="storePatient" value="Add Patient" class="btn btn-primary" />
                </div>  

            </div>
        </form>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>