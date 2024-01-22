<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body>
    <header>
        <section class="navbar">
            <a href="index.php" title="logo">
                <img class='logo' src="assets/img/logo.png" alt="restaurant">
            </a>
            <h3 class="title">"Le Coda"</h3>
            <?php if (empty($_SESSION['user'])) {
                echo '<a href="index.php?path=login" title="Se connecter">Se connecter</a>';
                echo '<a href="index.php?path=register" title="Register">Créer un compte</a>';
            } else {
                echo '<a href="index.php?path=deconnection" title="Se déconnecter">Se déconnecter</a>';
            }
            ?>
            <nav>
                <a href="index.php?path=home">Accueil</a>
                <a href="index.php?path=products">Nos Produits</a>
                <a href="index.php?path=profil">Profil</a>
                <a href="index.php?path=contact">Contactez-nous</a>
            </nav>
        </section>
    </header>

    <main>
        <?php require 'controllers/c_' . $_SESSION['page']['path'] . '.php'; ?>
    </main>

    <footer>
        <p class="mentions">Mentions légales bla bla bla blabla 2024 ©Copyrights Kappa2024</p>
    </footer>
</body>

</html>