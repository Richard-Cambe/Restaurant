<?php
$reqplat = $bdd->prepare('SELECT * FROM products WHERE id = :cat_id');
$reqplat->execute();
require './views/catproducts.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $pro_pic = ($_POST['pro_pic']);
    $pro_name = htmlspecialchars($_POST['pro_name']);
    $pro_desc = htmlspecialchars($_POST['pro_desc']);
    $pro_price = $_POST['pro_price'];
}