<?php
include '../../path.php';
include "../../app/controllers/posts.php";
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
            <div class="row title-table">
                <h2 class="mb-4">Post editing</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!-- Array output with errors -->
                    <?php include("../../app/helps/errorInfo.php"); ?>
                </div>
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <div class="col mb-4">
                        <input value="<?=$post['title'];?>" name="title" type="text" class="form-control" placeholder="Title" aria-label="Post name">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Post content</label>
                        <textarea name="content" id="editor" class="form-control" rows="10"> <?=$post['content'];?> </textarea>
                    </div>
                    <div class="input-group col mb-4 mt-4">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <select name="topic" class="form-select mb-4" aria-label="Default select example">
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?=$topic['id'];?>"> <?=$topic['name'];?> </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-check mb-4">
                        <?php if (empty($publish) && $publish == 0): ?>
                        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Publish
                        </label>
                        <?php else: ?>
                        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Publish
                        </label>
                        <?php endif; ?>
                    </div>
                    <div class="col-6">
                        <button name="edit_post" type="submit" class="btn btn-primary mb-3">Safe post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>



<!-- Footer -->
<?php include("../../app/include/footer.php"); ?>
<!-- Footer end -->

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- Adding a visual editor CK editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script src="../../assets/js/scripts.js"></script>
</body>
</html>