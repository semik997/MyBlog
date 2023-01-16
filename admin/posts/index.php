<?php
include '../../path.php';
include "../../app/controllers/posts.php";
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
                <h2 class="mb-4">Post Management</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Title</div>
                <div class="col-2">Autor</div>
                <div class="col-4">Control</div>
            </div>
            <?php foreach ($postsAdm as $key => $post): ?>
                <div class="row post">
                    <div class="id col-1"><?= $key + 1; ?></div>
                    <div class="title col-5"><?=mb_substr($post['title'], 0, 60, 'UTF-8') . ' ...'?></div>
                    <div class="autor col-2"><?= $post['username']; ?></div>
                    <div class="red col-1"> <a href="edit.php?id=<?=$post['id'];?>">Edit</a></div>
                    <div class="dell col-1"> <a href="edit.php?delete_id=<?=$post['id'];?>">Delete</a></div>
                    <?php if ($post['status']): ?>
                    <div class="status col-2"> <a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">To drafts</a></div>
                    <?php else: ?>
                    <div class="status col-2"> <a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Publish</a></div>
                    <?php endif; ?>
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