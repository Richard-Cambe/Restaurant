<?php

$query = $bdd->prepare('DELETE FROM products WHERE id = :id');
$query->execute(([
    ':id' => $_POST['id']
]));

require './views/products.php';
