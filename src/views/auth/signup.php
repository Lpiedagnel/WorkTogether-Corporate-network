<main class="container">
    <article class="grid">
            <div>
                <hgroup>
                <h1>S'inscrire</h1>
                <h2>Rejoignez vos collègues sur WorkTogether !</h2>
                </hgroup>
                
                <?php if ($message === "Enregistrement du compte réussi !"): ?>
                    <p class="text-success"><?= $message ?></p>
                <?php elseif ($message !== ""): ?>
                    <p class="text-alert"><?= $message ?></p>
                <?php endif ?>

                <form action="index.php?controller=user&action=signup" method="POST"> 
                    <div class="grid">
                        <div>
                            <input type="text" name="firstName" placeholder="Votre prénom" aria-label="first name" autocomplete="firstname" required>
                            <input type="text" name="lastName" placeholder="Votre nom de famille" aria-label="last name" autocomplete="lastname" required>
                            <input type="text" name="job" placeholder="Votre poste dans l'entreprise" aria-label="job" autocomplete="job">
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Votre adresse mail" aria-label="mail" autocomplete="mail" required>
                            <input type="password" name="password" placeholder="Votre mot de passe" aria-label="Password" autocomplete="current-password" required>
                            <input type="password" name="passwordConfirmation" placeholder="Confirmez votre mot de passe" aria-label="password confirmation" autocomplete="current-password" required>
                        </div>
                    </div>
                    <fieldset>
                        <label for="terms">
                                <input type="checkbox" id="terms" name="terms" required>
                                J'accepte la politique de confidentialité
                        </label>
                    </fieldset>
                    <button type="submit">S'inscrire</button>
                </form>
            </div>
    </article>
</main>
