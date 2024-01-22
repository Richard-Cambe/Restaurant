<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // hasher le password
    $password = password_hash($password, PASSWORD_DEFAULT);
    password_verify($_POST['password'], $password);

    // Insertion dans la base de données
    $req = $bdd->prepare('INSERT INTO users (lastname, firstname, email, password) VALUES(:lastname, :firstname, :email, :password)');
    $req->execute([
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':email' => $email,
        ':password' => $password,
    ]);

    // Rediriger vers la page d'accueil après l'ajout
    header('location: index.php');
    exit();
}
require 'views/' . $_SESSION['page']['path'] . '.php';
