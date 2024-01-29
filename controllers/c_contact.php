<?php
require "./views/contact.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $date = ($_POST['date']);

    // Insertion dans la database
    $req = $bdd->prepare('INSERT INTO messages (m_title, m_content) VALUES(:title, :content)');
    $req->execute([
        ':title' => $title,
        ':content' => $content
    ]);

    // Rediriger vers la page d'accueil après ajout dans la database
    header('location: index.php');
    exit();
}
