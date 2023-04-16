<div class="container">
    <div class="grid">
        <!-- Upload avatar -->
        <article class="mx-2">
            <img class="radius-5" src="<?= $user['img_path'] ?>" alt="Avatar de l'utilisateur">
            <form action="index.php?controller=user&action=upload" method="post" enctype="multipart/form-data">
                <input type="file" name="img" accept="image/png, image/jpeg, image/jpg" required>
                <button type="submit">Changer votre photo de profil</button>
            </form>
        </article>
        <!-- Form -->
        <form action="index.php?controller=user&action=update" method="post">
            <h1 class="my-1">Modifier votre profil</h1>

            <?php if (isset($message['text']) && $message['success']): ?>
                    <p class="text-success"><?= $message['text'] ?></p>
                <?php elseif (isset($message['text']) && !$message['success']): ?>
                    <p class="text-alert"><?= $message['text'] ?></p>
                <?php endif ?>
                
            <div>
                <label for="firstName">Prénom
                    <input type="text" name="firstName" placeholder="Votre prénom" aria-label="first name" autocomplete="firstname" value="<?= $user['first_name'] ?>" required>
                </label>
                <label for="lastName">
                    Nom
                    <input type="text" name="lastName" placeholder="Votre nom de famille" aria-label="last name" autocomplete="lastname" value="<?= $user['last_name'] ?> "required>
                </label>
                <label for="job">
                    Fonction dans l'entreprise
                    <input type="text" name="job" placeholder="Votre poste dans l'entreprise" aria-label="job" autocomplete="job" value="<?= $user['job'] ?>">
                </label>
                <label for="email">
                    Email
                    <input type="email" name="email" placeholder="Votre adresse mail" aria-label="mail" autocomplete="mail" value="<?= $user['email'] ?>" required>
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
            <?php foreach ($followedUsers as $follow): ?>
                <div class="text-center">
                    <img class="radius-5 img-200" src="<?= $follow['img_path'] ?>" alt="Avatar de <?= $follow['first_name'] ?>">
                    <h5 class="my-0"><?= $follow['first_name'] ?> <?= $follow['last_name'] ?></h5>
                    <a class="outline" role="button" href="#" onclick="socialInteraction(event, 'follow', <?= $follow['id'] ?>)">Suivi</a>
                </div>
            <?php endforeach ?> 
        </div>
    </article>
</div>