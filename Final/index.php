<?php
include 'includes/header.php';

include 'model/model_customers.php';

$reviews = getCustomers();

?>

<div class="container">
    <div class="col-sm-12">
        <h1>Reviews</h1>

        <a href="add.php">Add New Review</a>

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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr>
                        <td><?= $review['id']; ?></td>
                        <td><?= $review['date_of_visit']; ?></td>
                        <td><?= $review['location']; ?></td> 
                        <td><?= $review['rating']; ?></td> 
                        <td><?= $review['cashier']; ?></td>
                        <td><?= $review['fitting_room']; ?></td>
                        <td><?= $review['online_order']; ?></td>
                        <td><?= $review['comments']; ?></td>
                        <td>
                            <a href="add.php?id=<?= $review['id']; ?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<?php
include 'includes/footer.php';
?>