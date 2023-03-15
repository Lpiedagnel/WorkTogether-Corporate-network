<!doctype html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WorkTogether - Le réseau social d'entreprise</title>
    <meta name="description" content="WorkTogether est le réseau social pour votre entreprise !">
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
        <li><a href="#">Se connecter</a></li>
        <li><a href="#" role="button">Inscription</a></li>
    </ul>
</nav>
<!-- Main -->
<?= $pageContent ?>
</body>
</html>
