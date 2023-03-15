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
        <div><img src="https://picsum.photos/800" alt="Random img"></div>
    </article>
</main>
