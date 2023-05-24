<main class="container">

    <!-- Test Version -->
        <h4 class="my-0">Bienvenue sur la version de test de WorkTogether !</h4>
        <p class="my-1">Nous vous invitons à vous connecter ci-dessous avec ce compte de test où vous pouvez poster des messages, liker et commenter. Certaines fonctionnalités sont bloquées dans la version de test mais nous vous invitons à <a href="https://github.com/Lpiedagnel/WorkTogether-Corporate-network" target="_blank">consulter le code sur Github et d'installer la version complète.</a></p>

    <article class="grid">
        <div>
            <hgroup>
            <h1>Se connecter</h1>
            <h2>Bienvenue sur WorkTogether !</h2>
        </hgroup>
        
        <?php if (isset($message['text']) && !$message['success']): ?>
            <p class="text-alert"><?= $message['text'] ?></p>
            <?php endif ?>
            
            <form method="POST" action="index.php" >
                <input type="email" name="email" placeholder="Votre adresse mail" aria-label="mail" autocomplete="mail" value="test@gmail.com" required>
                <input type="password" name="password" placeholder="Votre mot de passe" aria-label="Password" autocomplete="current-password" value="test1" required>
                <button type="submit" class="contrast">Se connecter</button>
            </form>
        </div>
        <div><img src="https://picsum.photos/800" alt="Random img"></div>
    </article>
</main>
 