<?php
include 'includes/header.php';
include 'model/model_customers.php';

$error = "";
$customer = [
    'id' => '',
    'age' => '',
    'gender' => '',
    'date_of_visit' => '',
    'location' => '',
    'rating' => '',
    'cashier' => '',
    'fitting_room' => '',
    'online_order' => '',
    'comments' => ''
];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $customer = getCustomerById($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['storeCustomer'])) {
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $date_of_visit = filter_input(INPUT_POST, 'date_of_visit', FILTER_SANITIZE_STRING);
        $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
        $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT);
        $cashier = filter_input(INPUT_POST, 'cashier', FILTER_VALIDATE_INT);
        $fitting_room = filter_input(INPUT_POST, 'fitting_room', FILTER_VALIDATE_INT);
        $online_order = filter_input(INPUT_POST, 'online_order', FILTER_VALIDATE_INT);
        $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);

        if ($age === false) $error .= "<li>Please provide a valid age</li>";
        if ($gender == "") $error .= "<li>Please provide a gender</li>";
        if ($date_of_visit == "") $error .= "<li>Please provide a date of visit</li>";
        if ($location == "") $error .= "<li>Please provide a location</li>";
        if ($rating === false) $error .= "<li>Please provide a valid rating</li>";
        if ($cashier === false) $error .= "<li>Please provide a valid cashier rating</li>";
        if ($fitting_room === false) $error .= "<li>Please provide a valid fitting room rating</li>";
        if ($online_order === false) $error .= "<li>Please provide a valid online order rating</li>";

        // Convert gender to integer
        $gender = strtolower($gender) == 'male' ? 1 : (strtolower($gender) == 'female' ? 2 : 3);

        if ($error == "") {
            if ($customer['id']) {
                updateCustomer($customer['id'], $age, $gender, $date_of_visit, $location, $rating, $cashier, $fitting_room, $online_order, $comments);
            } else {
                addCustomer($age, $gender, $date_of_visit, $location, $rating, $cashier, $fitting_room, $online_order, $comments);
            }
            header('Location: index.php');
            exit;
        }
    } elseif (isset($_POST['deleteCustomer'])) {
        deleteCustomer($customer['id']);
        header('Location: index.php');
        exit;
    }
}
?>

<form name="customer" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($customer['id']); ?>">

    <div class="form-group">
        <label for="age">Age: </label>
        <input type="number" class="form-control" id="age" name="age" value="<?= htmlspecialchars($customer['age']); ?>">
    </div>

    <div class="form-group">
        <label for="gender">Gender: </label>
        <select class="form-control" id="gender" name="gender">
            <option value="male" <?= $customer['gender'] == 1 ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?= $customer['gender'] == 2 ? 'selected' : ''; ?>>Female</option>
            <option value="other" <?= $customer['gender'] == 3 ? 'selected' : ''; ?>>Other</option>
        </select>
    </div>

    <div class="form-group">
        <label for="date_of_visit">Date of Visit: </label>
        <input type="date" class="form-control" id="date_of_visit" name="date_of_visit" value="<?= htmlspecialchars($customer['date_of_visit']); ?>">
    </div>

    <div class="form-group">
        <label for="location">Location: </label>
        <input type="text" class="form-control" id="location" name="location" value="<?= htmlspecialchars($customer['location']); ?>">
    </div>

    <div class="form-group">
        <label for="rating">Rating: </label>
        <input type="number" class="form-control" id="rating" name="rating" value="<?= htmlspecialchars($customer['rating']); ?>">
    </div>

    <div class="form-group">
        <label for="cashier">Cashier: </label>
        <input type="number" class="form-control" id="cashier" name="cashier" value="<?= htmlspecialchars($customer['cashier']); ?>">
    </div>

    <div class="form-group">
        <label for="fitting_room">Fitting Room: </label>
        <input type="number" class="form-control" id="fitting_room" name="fitting_room" value="<?= htmlspecialchars($customer['fitting_room']); ?>">
    </div>

    <div class="form-group">
        <label for="online_order">Online Order: </label>
        <input type="number" class="form-control" id="online_order" name="online_order" value="<?= htmlspecialchars($customer['online_order']); ?>">
    </div>

    <div class="form-group">
        <label for="comments">Comments: </label>
        <textarea class="form-control" id="comments" name="comments"><?= htmlspecialchars($customer['comments']); ?></textarea>
    </div>

    <button type="submit" name="storeCustomer" class="btn btn-primary"><?= $customer['id'] ? 'Update' : 'Add' ?> Customer</button>
    <?php if ($customer['id']): ?>
        <button type="submit" name="deleteCustomer" class="btn btn-danger">Delete Customer</button>
    <?php endif; ?>
</form>

<?php if ($error): ?>
    <div class="alert alert-danger">
        <ul><?= $error ?></ul>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>