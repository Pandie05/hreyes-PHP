<?php
    include 'includes/header.php';
    include 'model/model_patients.php';

    $patients = getPatients ();
?>

<div class="container">
                
    <div class="col-sm-12">
        <h1>Patients</h1>

        <a href="patientDetails.php">Add New Patient</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Marry</th>
                    <th>Birthday</th>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach ($patients as $patient):                 
            ?>
                <tr>
                    <td><?= $patient['id']; ?></td>
                    <td><?= $patient['patientFirstName']; ?></td>
                    <td><?= $patient['patientLastName']; ?></td> 
                    <td><?= $patient['patientMarried']; ?></td> 
                    <td><?= $patient['patientBirthDate']; ?></td>       
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <a href="patientDetails.php">Add New patient</a>

    </div>
</div>

<?php
    include 'includes/footer.php';
?>