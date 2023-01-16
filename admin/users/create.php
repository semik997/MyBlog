<?php
session_start();
    include '../../path.php';
    include "../../app/controllers/users.php";
?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("../../app/include/head-admin.php"); ?>
<!-- Head-->

<body>

<!-- Header -->
<?php include("../../app/include/header-admin.php"); ?>
<!-- Header end -->

<div class="container">
    <div class="row">
        <?php include("../../app/include/sidebar-admin.php"); ?>
        <div class="posts col-9">
            <?php include("../../app/include/admin-button.php"); ?>
            <div class="row title-table">
                <h2>Create Users</h2>
            </div>
            <div class="row add-post">
                <!-- Array output with errors -->
                <div class="mb-12 col-12 col-md-12 err">
                    <?php include("../../app/helps/errorInfo.php"); ?>
                </div>
                <form action="create.php" method="post">
                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label"> Your login </label>
                        <input name="login" type="text" class="form-control" id="formGroupExampleInput" placeholder="enter your login...">
                    </div>
                    <div class="col mt-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your email...">
                    </div>
                    <div class="col mt-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="enter your password...">
                    </div>
                    <div class="form-check mt-4">
                        <input name="admin" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Admin
                        </label>
                    </div>
                    <div class="col mt-4">
                        <button name="create_user" type="submit" class="btn btn-primary mb-3">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>



<!-- Footer -->
<?php include("../../app/include/footer.php"); ?>
<!-- Footer end -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>