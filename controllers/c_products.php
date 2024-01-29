<?php
$query = $bdd->prepare('SELECT * FROM products ORDER BY id');
$query->execute();
require './views/products.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pro_pic = ($_POST['pro_pic']);
    $pro_name = htmlspecialchars($_POST['pro_name']);
    $pro_desc = htmlspecialchars($_POST['pro_desc']);
    $pro_price = $_POST['pro_price'];
    $cat_id = $_POST['cat_id'];


    $req = $bdd->prepare('INSERT INTO products (pro_pic, pro_name,pro_desc,pro_price,product_cat) VALUES(:pro_pic, :pro_name, :pro_desc, :pro_price,:cat_id)');
    $req->execute([
        ':pro_pic' => $pro_pic,
        ':pro_name' => $pro_name,
        ':pro_desc' => $pro_desc,
        ':pro_price' => $pro_price,
        ':cat_id' => $cat_id
    ]);
}
