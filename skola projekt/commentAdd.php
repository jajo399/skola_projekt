<?php

//session_start();

if(!isset($_COOKIE['commentCookie'])) {
    $uniqueCoookie = bin2hex(random_bytes(15));
    setcookie('commentCookie', $uniqueCoookie, time() + (3 * 365 * 24 * 60 * 60), "/");
    $_COOKIE['commentCookie'] = $uniqueCoookie;
}

$commentCookie  = $_COOKIE['commentCookie'];

DB::insert('comments', [
    'name' => $_POST['name'],
    'comment' => $_POST['comment'],
    'post_id' => $_POST['postId'],
    'cookie' => $commentCookie
]);



redirect("/blog/{$_POST['postId']}");