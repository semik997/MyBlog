<?php
include 'path.php';
include 'app/controllers/topics.php';

$page = isset($_GET['page']) ? $_GET['page']: 1;
$limit = 3;
$offset = $limit * ($page - 1);
$total_pages = round(countRow('posts') / $limit, 0);

$posts = selectAllFromPostsWithUsersOnIndex('posts', 'users', $limit, $offset);
$topTopic = selectTopTopicsFromPostsOnIndex('posts');
?>

<!doctype html>
<html lang="en">

<?php include("app/include/head.php"); ?>

<body>

    <!-- Header -->
    <?php include("app/include/header.php"); ?>
    <!-- Header end -->


    <!-- Carousel start -->
    <div class="container">
        <div class="row">
            <h2 class="slider-title">Best publications</h2>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($topTopic as $post1): ?>
                <div class="carousel-item active">
                    <img src="<?=BASE_URL . "assets/images/posts/" . $post1['img'] ?>" alt="<?=$post1['title']?>" class="d-block w-100">
                    <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                        <h5>
                            <a href="<?=BASE_URL . 'single.php?post=' . $post1['id']?>"><?=mb_substr($post1['title'], 0, 50, 'UTF-8') . ' ...'?></a>
                        </h5>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel end -->


    <!-- Main -->
    <div class="container">
        <div class="content row">
            <div class="main-content col-md-9 col-12">
                <h2>Latest publications</h2>
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
                <!-- Navigation -->
                <?php include("app/include/pagination.php"); ?>
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