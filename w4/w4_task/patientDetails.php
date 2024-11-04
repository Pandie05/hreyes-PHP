<?php
include 'includes/header.php';
include 'model/model_patients.php';

$error = "";
$patient = [
    'id' => '',
    'patientFirstName' => '',
    'patientLastName' => '',
    'patientMarried' => '',
    'patientBirthDate' => ''
];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $patient = getPatientById($id);
    $patient['patientMarried'] = $patient['patientMarried'] ? 'yes' : 'no';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['storePatient'])) {
        $patientFirstName = filter_input(INPUT_POST, 'firstName');
        $patientLastName = filter_input(INPUT_POST, 'lastName');
        $patientMarried = filter_input(INPUT_POST, 'married');
        $patientBirthDate = filter_input(INPUT_POST, 'birthDate');

        if ($patientFirstName == "") $error .= "<li>Please provide patient first name</li>";
        if ($patientLastName == "") $error .= "<li>Please provide patient last name</li>";
        if ($patientMarried == "") $error .= "<li>Please provide patient married status</li>";
        if ($patientBirthDate == "") $error .= "<li>Please provide patient birth date</li>";

        if ($error == "") {
            if ($patient['id']) {
                updatePatient($patient['id'], $patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
            } else {
                addPatient($patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
            }
            header('Location: viewPatients.php');
            exit;
        }
    } elseif (isset($_POST['deletePatient'])) {
        deletePatient($patient['id']);
        header('Location: viewPatients.php');
        exit;
    }
}
?>

<div class="container">
    <div class="col-sm-12">
        <a class='mar12' href="viewPatients.php">Back to View All Patients</a>
        <h2 class='mar12'><?= $patient['id'] ? 'Edit' : 'Add' ?> Patient</h2>
        <form name="patients" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($patient['id']); ?>">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?= htmlspecialchars($patient['patientFirstName']); ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?= htmlspecialchars($patient['patientLastName']); ?>">
            </div>
            <div class="form-group">
                <label for="married">Married</label>
                <select class="form-control" id="married" name="married">
                    <option value="yes" <?= $patient['patientMarried'] == 'yes' ? 'selected' : ''; ?>>Yes</option>
                    <option value="no" <?= $patient['patientMarried'] == 'no' ? 'selected' : ''; ?>>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birthDate">Birth Date</label>
                <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?= htmlspecialchars($patient['patientBirthDate']); ?>">
            </div>
            <button type="submit" name="storePatient" class="btn btn-primary"><?= $patient['id'] ? 'Update' : 'Add' ?> Patient</button>
            <?php if ($patient['id']): ?>
                <button type="submit" name="deletePatient" class="btn btn-danger">Delete Patient</button>
            <?php endif; ?>
        </form>
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <ul><?= $error ?></ul>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>