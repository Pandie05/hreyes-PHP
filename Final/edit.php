<?php
include 'includes/header.php';
include 'model/model_customers.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $review = getCustomerById($id);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $date_of_visit = filter_input(INPUT_POST, 'date_of_visit', FILTER_SANITIZE_STRING);
        $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
        $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT);
        $cashier = filter_input(INPUT_POST, 'cashier', FILTER_VALIDATE_INT);
        $fitting_room = filter_input(INPUT_POST, 'fitting_room', FILTER_VALIDATE_INT);
        $online_order = filter_input(INPUT_POST, 'online_order', FILTER_VALIDATE_INT);
        $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);

        // Ensure age is valid
        if ($age === false) {
            $error = "Invalid age value";
        } else {
            updateCustomer($id, $age, $gender, $date_of_visit, $location, $rating, $cashier, $fitting_room, $online_order, $comments);
            header('Location: index.php');
            exit;
        }
    }
}
?>

<div class="container">
    <div class="col-sm-12">
        <h1>Edit Review</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post" action="edit.php?id=<?= htmlspecialchars($id); ?>">
            <div class="form-group">
                <label for="age">Age: </label>
                <input type="number" class="form-control" id="age" name="age" value="<?= htmlspecialchars($review['age']); ?>" required min="1">
            </div>
            <div class="form-group">
                <label for="gender">Gender: </label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male" <?= $review['gender'] == 1 ? 'selected' : ''; ?>>Male</option>
                    <option value="female" <?= $review['gender'] == 2 ? 'selected' : ''; ?>>Female</option>
                    <option value="other" <?= $review['gender'] == 3 ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_of_visit">Date of Visit: </label>
                <input type="date" class="form-control" id="date_of_visit" name="date_of_visit" value="<?= htmlspecialchars($review['date_of_visit']); ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Location: </label>
                <input type="text" class="form-control" id="location" name="location" value="<?= htmlspecialchars($review['location']); ?>" required>
            </div>
            <div class="form-group">
                <label for="rating">Rating: </label>
                <input type="number" class="form-control" id="rating" name="rating" value="<?= htmlspecialchars($review['rating']); ?>" required min="1" max="5">
            </div>
            <div class="form-group">
                <label for="cashier">Cashier: </label>
                <input type="number" class="form-control" id="cashier" name="cashier" value="<?= htmlspecialchars($review['cashier']); ?>" required min="1" max="5">
            </div>
            <div class="form-group">
                <label for="fitting_room">Fitting Room: </label>
                <input type="number" class="form-control" id="fitting_room" name="fitting_room" value="<?= htmlspecialchars($review['fitting_room']); ?>" required min="1" max="5">
            </div>
            <div class="form-group">
                <label for="online_order">Online Order: </label>
                <input type="number" class="form-control" id="online_order" name="online_order" value="<?= htmlspecialchars($review['online_order']); ?>" required min="1" max="5">
            </div>
            <div class="form-group">
                <label for="comments">Comments: </label>
                <textarea class="form-control" id="comments" name="comments" required><?= htmlspecialchars($review['comments']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Review</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>