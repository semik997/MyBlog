<?php
include 'path.php';
include 'app/controllers/topics.php';
$posts = selectAll('posts', ['id_topic' => $_GET['id']]);
$topTopic = selectTopTopicsFromPostsOnIndex('posts');
$category = selectOne('topics', ['id' => $_GET['id']]);

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
            <div class="main-content col-md-9 col-12">
                <h2> <small> Posts from category: </small> <b><?=$category['name'];?></b></h2>
                <h3 class="mb-4"> <small> Category description: </small> <b><?=$category['description'];?></b></h3>
                <?php if (empty($posts)): ?>
                <h3 class="mb-4"> There are currently no posts in this category </h3>
                <?php else: ?>
                <?php foreach ($posts as $post): ?>
                <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="<?=BASE_URL . "assets/images/posts/" . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <a href="<?=BASE_URL . 'single.php?post=' . $post['id']?>"><?=mb_substr($post['title'], 0, 80, 'UTF-8') . ' ...'?></a>
                        </h3>
<!--                        <i class="far fa-user"> --><?php //=$post['username']?><!-- </i>-->
                        <i class="far fa-calendar"> <?=$post['created_date']?> </i>
                        <p class="preview-text">
                            <?=mb_substr($post['content'], 0, 150, 'UTF-8') . ' ...'?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- sidebar Content -->
            <div class="sidebar col-md-3 col-12">
                <div class="section search">
                    <h3>Search</h3>
                    <form action="search.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Enter a search term...">
                    </form>
                </div>
                <div class="section topics">
                    <h3>Categories</h3>
                    <ul>
                        <?php foreach ($topics as $key => $topic):?>
                        <li>
                            <a href="<?=BASE_URL . 'category.php?id=' . $topic['id'];?>"><?=$topic['name'];?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
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