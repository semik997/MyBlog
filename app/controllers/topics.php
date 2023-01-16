<?php
include SITE_ROOT . '/app/database/db.php';

$errorMsg = [];
$id = '';
$name = '';
$description = '';

$topics = selectAll('topics');

//Category creation form code
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name === '' || $description === '') {
        array_push($errorMsg, "Not all fields are filled!");
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        array_push($errorMsg, "Category name must be more than 2 characters");
    } else {
        $existence = selectOne('topics', ['name' => $name]);
        if (!empty($existence['name']) && $existence['name'] === $name) {
            array_push($errorMsg, "This category is already in the database");
        } else {
            $topic = [
                'name' => $name,
                'description' => $description
            ];

            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);
            header('location:' . BASE_URL .'admin/topics/index.php');
        }
    }
} else {
    $name = '';
    $description = '';
}

// Update category
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

$id = $_GET['id'];
$topic = selectOne('topics',['id' => $id]);
$id = $topic['id'];
$name = $topic['name'];
$description = $topic['description'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name === '' || $description === '') {
        array_push($errorMsg, "Not all fields are filled!");
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        array_push($errorMsg, "Category name must be more than 2 characters");
    } else {
        $topic = [
            'name' => $name,
            'description' => $description
        ];

        $id = $_POST['id'];
        $topic_id = update('topics', $id, $topic);
        header('location:' . BASE_URL . 'admin/topics/index.php');
    }
}


// Delete category

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {

    $id = $_GET['del_id'];
    delete('topics', $id);
    header('location:' . BASE_URL .'admin/topics/index.php');
}