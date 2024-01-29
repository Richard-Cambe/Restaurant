<?php
$query = $bdd->prepare('SELECT * FROM categories ORDER BY id');
$query->execute();
require 'views/home.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cat_pic = ($_POST['cat_pic']);
    $cat_name = htmlspecialchars($_POST['cat_name']);
    $cat_desc = htmlspecialchars($_POST['cat_desc']);

    $req = $bdd->prepare('INSERT INTO categories (cat_pic, cat_name,cat_desc) VALUES(:cat_pic, :cat_name, :cat_desc)');
    $req->execute([
        ':cat_pic' => $cat_pic,
        ':cat_name' => $cat_name,
        ':cat_desc' => $cat_desc,
    ]);
}
