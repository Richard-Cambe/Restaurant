<?php
require 'data/dataconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST['email'])) {
        echo 'The e-mail is empty';
    } elseif (empty($_POST['password'])) {
        echo 'The password is empty';
    } elseif (strlen($_POST['password']) < 8) {
        echo 'The password is too short';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo $_POST['email'] . 'Is not a valid email address.';
    } else {
        $email = $_POST['email'];
       
        $query = "SELECT * FROM users AS u WHERE u.email=:email";
        $response = $bdd->prepare($query);
        $response->execute([
            ":email" => $email,
        ]);
        $data = $response->fetch();

        if (!empty($data)) {
            if(password_verify($_POST['password'],$data['password'])){
                $_SESSION['user']['id'] = $data['id'];
                $_SESSION['user']['is_admin'] = $data['admin'];
                header('location: index.php');
                exit();
            }
        }
    }
}

require 'views/' . $_SESSION['page']['path'] . '.php';