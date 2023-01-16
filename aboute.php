<?php
//include 'app/database/db.php';
include 'path.php';
include 'app/controllers/topics.php';
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
                <h2> Post about me</h2>

                <div class="about row">
                    <div class="about_text col-12">
                        <p> Hello, my name is Sam, I'm a beginner developer.</p>
                        <p> I am always ready to receive new knowledge, perform complex and
                            interesting tasks. I started learning programming with HTML and CSS, then I took an introductory Java course, and then I
                            started learning Swift in Xcode and have some experience in a commercial company.</p>
                        <p> Now I am engaged in a closer study of HTML, CSS, PHP, MySQL, JS.
                            This blog page was written using a video course on <a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/playlist?list=PLMB6wLyKp7lVtihXKn-D3yHSLCjaIxliH">YouTube</a>.</p>
                        <p><a target="_blank" rel="noopener noreferrer" href="https://drive.google.com/file/d/1RUN3AfZ-_A3DyuayaiZxDZdPmg-yozuO/view?usp=share_link">Link to my CV</a></p>

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
                                <a href=""><?=$topic['name'];?></a>
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