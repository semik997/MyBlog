<?php
session_start();
include '../../path.php';
include "../../app/controllers/topics.php";
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
                <h2 class="mb-4">Category Management</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Title</div>
                <div class="col-4">Control</div>
            </div>
            <?php foreach ($topics as $key => $topic):?>
            <div class="row post">
                <div class="id col-1"><?=$key + 1;?></div>
                <div class="title col-5"><?=$topic['name'];?></div>
                <div class="red col-2"> <a href="edit.php?id=<?=$topic['id'];?>">Edit</a></div>
                <div class="dell col-2"> <a href="edit.php?del_id=<?=$topic['id'];?>">Delete</a></div>
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