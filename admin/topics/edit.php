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
<?php include'../../app/include/header-admin.php'; ?>
<!-- Header end -->

<div class="container">
    <div class="row">
        <?php include("../../app/include/sidebar-admin.php"); ?>
        <div class="posts col-9">
            <?php include("../../app/include/admin-button.php"); ?>
            <div class="row title-table">
                <h2>Update category</h2>
            </div>
            <div class="row add-post mt-4">
                <div class="mb-12 col-12 col-md-12 err">
                    <?php include("../../app/helps/errorInfo.php"); ?>
                </div>
                <form action="edit.php" method="post">
                    <input name="id" value="<?=$id;?>" type="hidden"
                    <div class="col">
                        <input name="name" value="<?=$name;?>" type="text" class="form-control" placeholder="Category name" aria-label="Category name">
                    </div>
                    <div class="col mt-4">
                        <label for="content" class="form-label">Description category</label>
                        <textarea name="description" class="form-control" id="content" rows="2" placeholder="Enter category description..."><?=$description;?></textarea>
                    </div>
                    <div class="col mt-4">
                        <button name="topic-edit" type="submit" class="btn btn-primary mb-3">Update category</button>
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