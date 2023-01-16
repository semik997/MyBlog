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

<!-- Header -->
<?php include("../../app/include/header-admin.php"); ?>
<!-- Header end -->

<div class="container">
    <div class="row">
        <?php include("../../app/include/sidebar-admin.php"); ?>
        <div class="posts col-9">
            <?php include("../../app/include/admin-button.php"); ?>
            <div class="row title-table">
                <h2 class="mb-4">Users</h2>
                <div class="col-1">ID</div>
                <div class="col-2">Login</div>
                <div class="col-5">Email</div>
                <div class="col-2">Role</div>
                <div class="col-2">Control</div>
            </div>
            <?php foreach ($users as $key => $user): ?>
            <div class="row post">
                <div class="id col-1"><?=$user['id'];?></div>
                <div class="title col-2"><?=$user['username'];?></div>
                <div class="title col-5"><?=$user['email'];?></div>
                <?php if($user['admin'] == 1): ?>
                <div class="autor col-2">Admin</div>
                <?php else: ?>
                <div class="autor col-2">User</div>
                <?php endif; ?>
                <div class="red col-1"> <a href="edit.php?edit_id=<?=$user['id']?>">Edit</a></div>
                <div class="dell col-1"> <a href="index.php?delete_id=<?=$user['id']?>">Delete</a></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>



<!-- Footer -->
<?php include("../../app/include/footer.php"); ?>
<!-- Footer end -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>