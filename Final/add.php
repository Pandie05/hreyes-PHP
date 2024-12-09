<?php
include 'includes/header.php';
include 'model/model_customers.php';

$error = "";

$customer = [
    'id' => '',
    'age' => '',
    'gender' => '',
    'DOV' => '',
    'location' => '',
    'rating' => '',
    'cashier' => '',
    'FT' => '',
    'OO' => '',
    'comments' => ''
];

/* if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $customer = getCustomerById($id);
} */


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
}
?>

        <form name="customer" method="post">

            <div class="form-group">
                <label for="age">Age: </label>
                <input type="number" class="form-control" id="age" name="age" value="">
            </div>

            <div class="form-group">
                <label for="gender">Gender: </label>
                <select class="form-control" id="gender" name="gender">
                    <option value="">Select...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div> 
               
            <div class="form-group">
                <label for="DOV">Date of Visit: </label>
                <input type="date" class="form-control" id="DOV" name="DOV" value="">
            </div>

            <div class="form-group">
                <label for="location">Location: </label>
                <input type="text" class="form-control" id="location" name="location" value="">
            </div>

            <div class="form-group">
                <label for="rating">Rating (out of 5): </label>
                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="">
            </div>

            <div class="form-group">
                <label for="cashier">Cashier (out of 5): </label>
                <input type="number" class="form-control" id="cashier" name="cashier" min="1" max="5" value="">
            </div>

            <div class="form-group">
                <label for="FT">Fitting Room (out of 5): </label>
                <input type="number" class="form-control" id="FT" name="FT" min="1" max="5" value="">
            </div>

            <div class="form-group">
                <label for="OO">Online Order (out of 5): </label>
                <input type="number" class="form-control" id="OO" name="OO" min="1" max="5" value="">
            </div>    
            
            <div class="form-group">
                <label for="comments">Comments: </label>
                <textarea class="form-control" id="comments" name="comments"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        
        </form>

<?php include 'includes/footer.php'; ?>