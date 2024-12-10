<?php
include 'includes/header.php';
include 'model/model_customers.php';

$reviews = getCustomers();
?>

<div class="container">
    <div class="col-sm-12">
        <h1>Reviews</h1>

        <a href="add.php" class="btn btn-primary">Add New Review</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date of Visit</th>
                    <th>Location</th>
                    <th>Rating</th>
                    <th>Cashier</th>
                    <th>Fitting Room</th>
                    <th>Online Order</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr>
                        <td><?= htmlspecialchars($review['id']); ?></td>
                        <td><?= htmlspecialchars($review['date_of_visit']); ?></td>
                        <td><?= htmlspecialchars($review['location']); ?></td> 
                        <td><?= htmlspecialchars($review['rating']) . '/5'; ?></td> 
                        <td><?= htmlspecialchars($review['cashier']). '/5'; ?></td>
                        <td><?= htmlspecialchars($review['fitting_room']). '/5'; ?></td>
                        <td><?= htmlspecialchars($review['online_order']). '/5'; ?></td>
                        <td><?= htmlspecialchars($review['comments']); ?></td>
                        <td>
                            <a href="edit.php?id=<?= $review['id']; ?>" class="btn btn-primary">Update</a>
                            <a href="delete.php?id=<?= $review['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>