<?php

if(!isset($_SESSION))
{
    session_start();
}
require 'connect.php';
//include 'path.php';

function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

// Checking the execution of a query to the database 
function dbCheckError($query)
{
    $errorInfo = $query->errorInfo();
    if ($errorInfo[0] !== PDO::ERR_NONE) {
        echo $errorInfo[2];
        exit();
    }
    return true;
}


// Query to get data from one table
function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// Query to get one row from table
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}


// Writing to a database table
function insert($table, $params)
{
    global $pdo;
    $i = 0;
    $col = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $col = $col . "$key";
            $mask = $mask . "'" . "$value" . "'";
        } else {
            $col = $col . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}


// Update row in tablse
function update($table, $id, $params)
{
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}


// Delete row in tables
function delete($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM $table WHERE id =" . $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Selection of posts with the author in the admin panel
function selectAllFromPostsWithUsers($table1, $table2) {
    global $pdo;
    $sql = "
    SELECT 
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_topic,
    t1.created_date,
    t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id
    ";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Selection of posts with the author to main screen
function selectAllFromPostsWithUsersOnIndex($table1, $table2, $limit, $offset) {
    global $pdo;
    $sql = " SELECT p.*, u.username  FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1 LIMIT $limit OFFSET $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Selection top topics posts with the author to main screen
function selectTopTopicsFromPostsOnIndex($table1) {
    global $pdo;
    $sql = " SELECT * FROM $table1 WHERE id_topic = 15";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Search functions (eazy)
function searchInTitleAndContent($text, $table1, $table2) {
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = " SELECT 
    p.*, u.username 
    FROM $table1 AS p
    JOIN $table2 AS u 
    ON p.id_user = u.id 
    WHERE p.status=1
    AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Selection post from single.php
function selectPostFromPostsWithUsersOnSingle($table1, $table2, $id) {
    global $pdo;
    $sql = " SELECT p.*, u.username  FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}


// Selection post from page
function countRow($table) {
    global $pdo;
    $sql = " SELECT COUNT(*) FROM $table WHERE status = 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}