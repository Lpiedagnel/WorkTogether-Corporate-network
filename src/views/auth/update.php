<div class="container">
    <div class="grid">
        <!-- Upload avatar -->
        <article class="mx-2">
            <img class="radius-5" src="https://picsum.photos/800"" alt="Avatar de l'utilisateur">
            <form action="index.php?controller=user&action=upload" method="post"></form>
            <input type="file" name="file" require>
            <button type="submit">Changer votre photo de profil</button>
        </article>
        <!-- Form -->
        <form action="index.php?controller=user&action=update" method="post">
            <h1 class="my-1">Modifier votre profil</h1>
            <div>
                <label for="firstName">Prénom
                    <input type="text" name="firstName" placeholder="Votre prénom" aria-label="first name" autocomplete="firstname" required>
                </label>
                <label for="lastName">
                    Nom
                    <input type="text" name="lastName" placeholder="Votre nom de famille" aria-label="last name" autocomplete="lastname" required>
                </label>
                <label for="job">
                    Fonction dans l'entreprise
                    <input type="text" name="job" placeholder="Votre poste dans l'entreprise" aria-label="job" autocomplete="job">
                </label>
                <label for="email">
                    Email
                    <input type="email" name="email" placeholder="Votre adresse mail" aria-label="mail" autocomplete="mail" required>
                </label>
                <label for="password">
                    Modifier votre mot de passe
                    <input type="password" name="password" placeholder="Votre mot de passe" aria-label="Password" autocomplete="current-password" required>
                </label>
                <label for="passwordConfirmation">
                    Confirmer la modification d'un mot de passe
                    <input type="password" name="passwordConfirmation" placeholder="Confirmez votre mot de passe" aria-label="password confirmation" autocomplete="current-password" required>
                </label>
            </div>
            <button type="submit">Modifier votre profil</button>
        </form>
    </div>
    <!-- Followers -->
    <article>
        <h2 class="my-1">Ils vous suivent</h2>
        <div class="grid-auto">
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" href="#">Suivre</a>
            </div>
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" class="outline" href="#">Suivi</a>
            </div>
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" class="outline" href="#">Suivi</a>
            </div>
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" href="#">Suivre</a>
            </div>
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" href="#">Suivre</a>
            </div>
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" href="#">Suivre</a>
            </div>
        </div>
    </article>
    <!-- Following -->
    <article>
        <h2 class="my-1">Vous suivez</h2>
        <div class="grid-auto">
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" class="outline" href="#">Suivi</a>
            </div>
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" class="outline" href="#">Suivi</a>
            </div>
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" class="outline" href="#">Suivi</a>
            </div>
            <div class="text-center">
                <img class="radius-5" src="https://picsum.photos/100" alt="Photo de l'utilisateur">
                <h5 class="my-0">Jane Doe</h5>
                <a role="button" class="outline" href="#">Suivi</a>
            </div>
        </div>
    </article>
</div>