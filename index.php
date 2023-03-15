
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

    <!-- Custom styles for this example -->
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
    </nav><!-- ./ Nav -->

    <!-- Main -->
    <main class="container">
      <article class="grid">
        <div>
          <hgroup>
            <h1>Se connecter</h1>
            <h2>Bienvenue sur WorkTogether !</h2>
          </hgroup>
          <form>
            <input type="email" name="email" placeholder="Votre adresse mail" aria-label="mail" autocomplete="mail" required>
            <input type="password" name="password" placeholder="Votre mot de passe" aria-label="Password" autocomplete="current-password" required>
            <fieldset>
              <label for="remember">
                <input type="checkbox" role="switch" id="remember" name="remember">
                Se souvenir de moi
              </label>
            </fieldset>
            <button type="submit" class="contrast" onclick="event.preventDefault()">Se connecter</button>
          </form>
        </div>
        <div><img src="https://picsum.photos/1000" alt="Random img"></div>
      </article>
    </main>
    <!-- ./ Main -->

  </body>

</html>
