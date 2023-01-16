<!-- Header -->

<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1> <a href="<?php echo BASE_URL ?>"> My Blog </a></h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li> <a href="<?php echo BASE_URL ?>">Home</a></li>
                    <li> <a href="<?php echo BASE_URL . 'aboute.php' ?>">About me</a></li>
                    <li>
                        <?php if (isset($_SESSION['id'])) : ?>
                            <a href="/">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <ul>
                                <?php if ($_SESSION['admin']) : ?>
                                    <li> <a href="<?php echo BASE_URL . 'admin/posts/index.php' ?>">Admin panel</a></li>
                                <?php endif; ?>
                                <li> <a href="<?php echo BASE_URL . 'logout.php' ?>">Log out</a>
                            </ul>
                        <?php else : ?>
                            <a href="/log.php">
                                <i class="fa fa-user"></i>
                                Personal Area
                            </a>
                            <ul>
                                <li> <a href="<?php echo BASE_URL . 'log.php' ?>">Sign in</a></li>
                                <li> <a href="<?php echo BASE_URL . 'reg.php' ?>">Register</a>
                            </ul>
                        <?php endif; ?>
                    </li>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Header end -->