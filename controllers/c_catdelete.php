<?php

$query = $bdd->prepare('DELETE FROM categories WHERE id = :id');
$query->execute(([
    ':id' => $_POST['id']
]));

require './views/home.php';
