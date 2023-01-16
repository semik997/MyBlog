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
                <form action="edit.php" method="post">
                    <input name="id" value="<?=$id?>" type="hidden"
                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label"> Login </label>
                        <input name="login" value="<?=$username?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="enter your login...">
                    </div>
                    <div class="col mt-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" value="<?=$user['email'];?>" readonly type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your email...">
                    </div>
                    <div class="col mt-4">
                        <label for="exampleInputPassword1" class="form-label">Change password</label>
                        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="enter your password...">
                    </div>
                    <div class="form-check mt-4">
                        <?php if($admin == 1): ?>
                        <input name="admin" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Admin
                        </label>
                        <?php else: ?>
                        <input name="admin" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" >
                        <label class="form-check-label" for="flexCheckChecked">
                            Admin
                        </label>
                        <?php endif; ?>
                    </div>
                    <div class="col mt-4">
                        <button name="update_user" type="submit" class="btn btn-primary mb-3">Update</button>
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