<?php
include 'path.php';
include 'app/database/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])) {
    $posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
}
?>

<!doctype html>
<html lang="en">

<?php include("app/include/head.php"); ?>

<body>

    <!-- Header -->
    <?php include("app/include/header.php"); ?>
    <!-- Header end -->

    <!-- Main -->
    <div class="container">
        <div class="content row">
            <div class="main-content col-12">
                <h2>Search result</h2>
                <?php foreach ($posts as $post): ?>
                <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="<?=BASE_URL . "assets/images/posts/" . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <a href="<?=BASE_URL . 'single.php?post=' . $post['id']?>"><?=mb_substr($post['title'], 0, 80, 'UTF-8') . ' ...'?></a>
                        </h3>
                        <i class="far fa-user"> <?=$post['username']?> </i>
                        <i class="far fa-calendar"> <?=$post['created_date']?> </i>
                        <p class="preview-text">
                            <?=mb_substr($post['content'], 0, 150, 'UTF-8') . ' ...'?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Main end -->


    <!-- Footer -->
    <?php include("app/include/footer.php"); ?>
    <!-- Footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>