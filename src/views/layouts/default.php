<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Artbox' ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <a href="/">
            <img src="/img/logo.png" alt="Logo Artbox" id="logo">
        </a>
        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/ajouter">Ajouter une œuvre</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <p>© 2024 Artbox - Tous droits réservés</p>
    </footer>
</body>
</html> 