<?php
include "path.php";
include "app/controllers/users.php";
?>
<!doctype html>
<html lang="en">

<?php include("app/include/head.php"); ?>

<body>

    <!-- Header -->
    <?php include("app/include/header.php"); ?>
    <!-- Header end -->

    <!-- Form -->
    <div class="container reg_form">
        <form class="row justify-content-center" method="post" action="log.php">
            <h2 class="col-12"> Authorization </h2>
            <div class="mb-3 col-12 col-md-4 err">
                <!-- Array output with errors -->
                <?php include("app/helps/errorInfo.php"); ?>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="formGroupExampleInput" class="form-label"> Your email </label>
                <input name="email" value="<?= $email ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your email...">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="enter your password...">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <button type="submit" name="button-log" class="btn btn-secondary">Sign in</button>
                <a href="reg.php"> Register </a>
            </div>
        </form>
    </div>
    <!-- Form end -->

    <!-- Footer -->
    <?php include("app/include/footer.php"); ?>
    <!-- Footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>