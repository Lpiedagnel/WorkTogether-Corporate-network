<!doctype html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <link rel="shortcut icon" href="https://picocss.com/favicon.ico">
    <link rel="canonical" href="https://picocss.com/examples/sign-in/">

    <!-- Pico.css -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">

    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
<!-- Nav -->
<nav class="container-fluid">
    <ul>
        <li><a href="./" class="contrast" onclick="event.preventDefault()"><strong>WorkTogether</strong></a></li>
    </ul>
    <ul>
        <li><a href="index.php?controller=message&action=feed">Accueil</a></li>
        <?php if (isset($_SESSION['is_connected'])): ?>
            <li><a href="index.php?controller=user&action=logout">Déconnexion</a></li>
            <li><a href="index.php?controller=user&action=update" role="button">Profil</a></li>
        <?php else: ?>
            <li><a href="index.php">Se connecter</a></li>
            <li><a href="index.php?controller=user&action=signup" role="button">Inscription</a></li>
       <?php endif ?> 
    </ul>
</nav>
<!-- Main -->
<?= $pageContent ?>
</body>
</html>
