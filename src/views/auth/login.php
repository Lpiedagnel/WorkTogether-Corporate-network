<main class="container">
    <article class="grid">
        <div>
            <hgroup>
            <h1>Se connecter</h1>
            <h2>Bienvenue sur WorkTogether !</h2>
            </hgroup>

            <?php if ($message !== ''): ?>
                <p class="text-alert"><?= $message ?></p>
            <?php endif ?>

            <form method="POST" action="index.php" >
                <input type="email" name="email" placeholder="Votre adresse mail" aria-label="mail" autocomplete="mail" required>
                <input type="password" name="password" placeholder="Votre mot de passe" aria-label="Password" autocomplete="current-password" required>
                <fieldset>
                    <label for="remember">
                    <input type="checkbox" role="switch" id="remember" name="remember">
                    Se souvenir de moi
                    </label>
                </fieldset>
                <button type="submit" class="contrast">Se connecter</button>
            </form>
        </div>
        <div><img src="https://picsum.photos/800" alt="Random img"></div>
    </article>
</main>
 