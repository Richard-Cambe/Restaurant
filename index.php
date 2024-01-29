<?php
session_start();

require 'data/dataconnect.php';
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}
$availableRoutes = [
    'login', 'products', 'orders', 'contact', 'profil', 'register', 'catprod', 'deconnection', 'platdelete', 'catdelete', 'mycart'
];

if (isset($_GET['path']) && in_array($_GET['path'], $availableRoutes)) {
    $_SESSION['page']['path'] = $_GET['path'];
    switch ($_SESSION['page']['path']) {
        case 'deconnection':
            unset($_SESSION['user']);
            session_destroy();
            $_SESSION['page']['path'] = 'home';
            header('location: index.php');
    }
} else {
    $_SESSION['page']['path'] = 'home';
}

require 'layout.php';
