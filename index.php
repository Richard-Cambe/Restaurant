<?php
session_start();
// session_destroy();
require 'data/dataconnect.php';
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}
$availableRoutes = [
    'login', 'products', 'panier', 'contact', 'profil'
];

if (isset($_GET['path']) && in_array($_GET['path'], $availableRoutes)) {
    $_SESSION['page']['path'] = $_GET['path'];
    switch ($_SESSION['page']['path']) {
        case 'deconnection':
            unset($_SESSION['user']);
            $_SESSION['page']['path'] = 'home';
            header('location: index.php');
    }
} else {
    $_SESSION['page']['path'] = 'home.php';
}

require 'layout.php';
