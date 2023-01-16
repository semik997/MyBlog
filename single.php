<?php
include 'path.php';
include 'app/controllers/topics.php';
$post = selectPostFromPostsWithUsersOnSingle('posts', 'users', $_GET['post']);
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
                <h2><?php echo $post['title']; ?></h2>
                <div class="single_post row">
                    <div class="img col-12">
                        <img src="<?=BASE_URL . "assets/images/posts/" . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
                    </div>
                    <div class="info">
                        <a href=""><i class="far fa-user"> <?=$post['username'];?> </i></a>
                        <a href=""><i class="far fa-calendar"> <?=$post['created_date'];?> </i></a>
                    </div>
                    <div class="single_post_text col-12">
                        <?=$post['content'];?>
                    </div>
                </div>
            </div>

            <!-- sidebar Content -->
            <div class="sidebar col-md-3 col-12">
                <div class="section search">
                    <h3>Search</h3>
                    <form action="index.php" method="post">
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