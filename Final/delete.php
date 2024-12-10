<?php
include 'includes/header.php';
include 'model/model_customers.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteCustomer($id);
    header('Location: index.php');
    exit;
}
?>

<div class="container">
    <div class="col-sm-12">
        <h1>Delete Review</h1>
        <p>Review has been deleted.</p>
        <a href="index.php" class="btn btn-primary">Back to Reviews</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>