<?php

$query = $bdd->prepare('SELECT * FROM products WHERE product_cat = :categorie_id ORDER BY id');
$query->execute([':categorie_id'=>$_GET['categorie_id']]);
$datas = $query->fetchAll();
require "./views/catprod.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pro_pic = ($_POST['pro_pic']);
    $pro_name = htmlspecialchars($_POST['pro_name']);
    $pro_desc = htmlspecialchars($_POST['pro_desc']);
    $pro_price = htmlspecialchars($_POST['pro_name']);


    $req = $bdd->prepare('INSERT INTO plats (pro_pic, pro_name,pro_desc,pro_price) VALUES(:pro_pic, :pro_name, :pro_desc, :pro_price)');
    $req->execute([
        ':pro_pic' => $pro_pic,
        ':pro_name' => $pro_name,
        ':pro_desc' => $pro_desc,
        ':pro_price' => $pro_price
    ]);
}
