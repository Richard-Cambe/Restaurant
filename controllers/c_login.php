<?php
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
        $password = md5($_POST['password']);
        $query = "SELECT * FROM users AS s WHERE s.email=:email and s.password=:password";
        $response = $bdd->prepare($query);
        $response->execute([
            ":email" => $email,
            ":password" => $password
        ]);
        $data = $response->fetch();

        if (!empty($data)) {
            if ($data['email'] === $email && $data['password'] === $password) {
                $_SESSION['user']['id'] = $data['id'];
                $_SESSION['user']['is_admin'] = $data['is_admin'];
                header('location: index.php');
                exit();
            }
        }
    }
}

require 'views/' . $_SESSION['page']['path'] . '.php';