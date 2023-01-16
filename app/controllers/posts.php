<?php

include SITE_ROOT . '/app/database/db.php';

$errorMsg = [];
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');

// Post creation code
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    $fileType = $_FILES['img']['type'];
    $imgName = time() . "_" . $_FILES['img']['name'];
    $fileTmpName = $_FILES['img']['tmp_name'];
    $destination = ROOT_PATH . "/assets/images/posts/" . $imgName;
    if (!empty($_FILES['img']['tmp_name'])) {
        $size = getimagesize($_FILES['img']['tmp_name']);
    }

    if ($title === '' || $content === '' || $topic === 'Post Category:') {
        array_push($errorMsg, "Not all fields are filled!");
    } elseif (mb_strlen($title, 'UTF-8') < 3) {
        array_push($errorMsg, "Title must be more than 3 characters!");
    } elseif (mb_strlen($content, 'UTF-8') < 10) {
        array_push($errorMsg, "Content must be more than 10 characters!");
    } elseif (empty($_FILES['img']['name'])) {
        array_push($errorMsg, "Image not added");
        // Checking for the type of uploaded file
    } elseif (strpos($fileType, 'image') === false) {
        array_push($errorMsg, "You can upload only pictures!");
    } elseif ($_FILES['img']['size'] > 4000000) {
        array_push($errorMsg, "Photo size too large");
    } elseif ($size[0] > 10000 && $size[1] > 10000) {
        array_push($errorMsg, "So big width and height");
    } else {
        $result = move_uploaded_file($fileTmpName, $destination);
        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            array_push($errorMsg, "Error file don't upload to server");
        }
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];
        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location:' . BASE_URL .'admin/posts/index.php');

    }

} else {
    $id = '';
    $title = '';
    $content = '';
    $publish = isset($_POST['publish']) ? 0 : 1;
    $topic = '';
}



// Update post
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectOne('posts',['id' => $_GET['id']]);
    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = $_POST['topic'];
    $publish = isset($_POST['publish']) ? 1 : 0;

    if (!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "/assets/images/posts/" . $imgName;


        if (strpos($fileType, 'image') === false) {
            array_push($errorMsg, "You can upload only pictures!");
        } else {
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result){
                $_POST['img'] = $imgName;
            }else{
                array_push($errorMsg, "Error file don't upload to server");
            }
        }
    } else {
        array_push($errorMsg, "Error");
    }

    if ($title === '' || $content === '') {
        array_push($errorMsg, "Not all fields are filled!");
    } elseif (mb_strlen($title, 'UTF-8') < 3) {
        array_push($errorMsg, "Title must be more than 3 characters!");
    } elseif (mb_strlen($content, 'UTF-8') < 10) {
        array_push($errorMsg, "Content must be more than 10 characters!");
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];
        $post = update('posts', $id, $post);
        header('location:' . BASE_URL .'admin/posts/index.php');
    }

} else {
    $title = '';
    $content = '';
    $publish = isset($_POST['publish']) ? 0 : 1;
    $topic = '';
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $postID = update('posts', $id, ['status' => $publish]);
    header('location:' . BASE_URL .'admin/posts/index.php');
    exit();
}



// Delete category
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location:' . BASE_URL .'admin/posts/index.php');
}