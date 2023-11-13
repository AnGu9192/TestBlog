<?php
session_start();
ini_set("error_reporting",E_ALL);
ini_set("display_errors",1);
include dirname(__DIR__) . "/config/constants.php";
include dirname(__DIR__) . "/config/functions.php";


$userId = @$_SESSION["userId"];
$comments = selectOne('comment',['userId' => $userId]);
$posts = selectOne('post',['postId' => $userId]);




// var_dump($posts);


?>
<!-- <p><?php echo $post['name'];?></p> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test | Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">


    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>

<body>

<div class="container">
    <div class="action_btn pt-5">
        <a href="<?php echo BASE_URL; ?>pages/upload.php"><button class="btn btn-dark btn-sm" name="submit" >Загрузит</button>
        <a href="<?php echo BASE_URL; ?>pages/search.php"> <button class="btn btn-dark btn-sm" name="submit">Найти</button></a>
    </div>


