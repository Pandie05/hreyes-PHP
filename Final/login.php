<?php include 'includes/header.php'; ?>


<div class="container">
    <div class="col-sm-12">
        <h1>Login</h1>

        <form method="post" action="login.php">
            <div class="form-group">
                <label for="username">Username: </label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">

                <label for="password">Password: </label>
                <input type="password" class="form-control" id="password" name="password">

            </div>
        
            <button type="submit" class="btn btn-primary">Login</button>

        </form>
    </div>
</div>


<?php include 'includes/footer.php'; ?>