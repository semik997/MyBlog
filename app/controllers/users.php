<?php
include SITE_ROOT . '/app/database/db.php';

$errorMsg = [];

function loginUser($array)
{
    $_SESSION['id'] = $array['id'];
    $_SESSION['login'] = $array['username'];
    $_SESSION['admin'] = $array['admin'];
    if ($_SESSION['admin']) {
        header('location:' . BASE_URL . "admin/users/index.php");
    } else {
        header('location:' . BASE_URL);
    }
}

$users = selectAll('users');

//Code for registration form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if ($login === '' || $email === '' || $passF === '') {
        array_push($errorMsg, "Not all fields are filled!");
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errorMsg, "The login field is shorter than 2 characters");
    } elseif ($passF !== $passS) {
        array_push($errorMsg, "Passwords in both fields must match");
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            array_push($errorMsg, "User with this email is already registered");
        } else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];

            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            loginUser($user);
        }
    }
} else {
    $login = '';
    $email = '';
}


// Code for the authorization form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if ($email === '' || $pass === '') {
        array_push($errorMsg, "Not all fields are filled!");
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($pass, $existence['password'])) {
            loginUser($existence);
        } else {
            array_push($errorMsg, "Email or password entered is incorrect");
        }
    }
} else {
    $email = '';
}


// Code for registration in admin panel
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass-first']);

    if ($login === '' || $email === '' || $pass === '') {
        array_push($errorMsg, "Not all fields are filled!");
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errorMsg, "The login field is shorter than 2 characters");
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            array_push($errorMsg, "User with this email is already registered");
        } else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];

            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);
            header('location:' . BASE_URL . "admin/users/index.php");
        }
    }
} else {
    $login = '';
    $email = '';
}



// Edit user
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $user = selectOne('users',['id' => $_GET['edit_id']]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {

    $id = $_POST['id'];
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $pass = $_POST['pass-first'];
    $admin = isset($_POST['admin']) ? 0 : 1;

    if ($login === '') {
        array_push($errorMsg, "Not all fields are filled!");
    } elseif (mb_strlen($login, 'UTF-8') < 2) {
        array_push($errorMsg, "Login must be more than 2 characters!");
    } else {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) $admin = 1;
        $user = [
            'admin' => $admin,
            'username' => $login,
            'password' => $pass
        ];

        $user = update('users', $id, $user);
        header('location:' . BASE_URL . "admin/users/index.php");
    }

} else {
    $login = '';
    $email = '';
}

//
//if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
//    $id = $_GET['pub_id'];
//    $publish = $_GET['publish'];
//    $postID = update('posts', $id, ['status' => $publish]);
//    header('location:' . BASE_URL .'admin/posts/index.php');
//    exit();
//}





// Delete user
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location:' . BASE_URL .'admin/users/index.php');
}