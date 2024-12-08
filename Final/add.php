<?php
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    // Process the form data here
    echo "Thank you for your submission, " . htmlspecialchars($name) . "!";
}
?>

        <form name="customer" method="post">
            <input type="" name="id" value="<?= htmlspecialchars($patient['id']); ?>">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?= htmlspecialchars($patient['patientFirstName']); ?>">
            </div>
        

<?php include 'includes/footer.php'; ?>