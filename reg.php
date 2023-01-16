<?php
include 'path.php';
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
        <form class="row justify-content-center" method="post" action="reg.php">
            <h2 class="col-12"> Authorization </h2>
            <div class="mb-3 col-12 col-md-4 err">
                <!-- Array output with errors -->
                <?php include("app/helps/errorInfo.php"); ?>
            </div>
            <div class=" w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="formGroupExampleInput" class="form-label"> Your login </label>
                <input name="login" value="<?= $login ?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="enter your login...">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" value="<?= $email ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your email...">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="enter your password...">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword2" class="form-label">Repeat your password</label>
                <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="repeat your password...">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <button type="submit" class="btn btn-secondary" name="button-reg">Register</button>
                <a href="log.php"> Log in </a>
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