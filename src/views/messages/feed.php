<main class="container feed">
    <div class="grid grid-75">
        <!-- Feed -->
        <section>
            <!-- Post User -->
            <hgroup>
                <h1>Bienvenue <?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?> !</h1>
                <h2>Quoi de neuf chez vos collègues ?</h2>
            </hgroup>
            <article>
                <form action="index.php?controller=message&action=add" method="POST">
                    <label for="text">Votre message</label>
                    <textarea name="text" cols="50" rows="2" placeholder="Qu'est-ce que vous allez raconter à vos collègues?" required></textarea>
                    <label for="file">Téléchargez une image
                        <input type="file" name="file">
                    </label>
                    <button type="submit">Envoyez votre message</button>
                </form>
            </article>

            <?php foreach($posts as $post): ?>
            <article>
                <div class="flex-around">
                    <img class="img-125 radius-50" src="uploads/avatars/<?= $post['authorAvatar'] ?>" alt="Photo de profil de l'utilisateur">
                    <div class="my-2">
                        <h3 class="my-0"><?= $post['authorFirstName'] . ' ' . $post['authorLastName'] ?></h3>
                        <?php if ($post['authorJob']): ?>
                            <h6 class="my-0"><?= $post['authorJob'] ?></h6>
                        <?php endif ?>
                        <small>Le <?= date('d/m/Y',strtotime($post['created_at']))   ?></small>
                    </div>
                </div>
                <p>
                    <?= $post['text'] ?>
                </p>
                <div class="my-1">
                    <a href="#">&#x1F499; J'aime ! (3)</a>
                    <?php if ($_SESSION['id'] === $post['author_id']): ?>
                        <a href="#" class="mx-2"> Éditer</a>
                        <a href="#" class="mx-2" onclick="deleteAlert(<?= $post['id'] ?>, 'message')">Supprimer</a>
                    <?php endif ?>
                </div>
                <details>
                    <summary>Commentaires (<?= count($post['comments']) ?>)</summary>
                    <ul>
                        <li class="list-none">
                            <form action="index.php?controller=comment&action=add" method="POST">
                                <h4>Votre commentaire</h4>
                                <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                                <input type="text" name="text">
                                <button type="submit">Commenter</button>
                            </form>
                        </li>
                        <?php foreach($post['comments'] as $comment): ?>
                        <li class="list-none my-2">
                            <div class="grid grid-25">
                                <img src="uploads/avatars/<?= $comment['authorAvatar'] ?>"alt="Photo de profil de l'utilisateur" class="radius-5"> 
                                <div class="text-center">
                                    <h4 class="my-0"><?= $comment['authorFirstName'] . ' ' . $comment['authorLastName'] ?> </h4>
                                    <small><?= $comment['authorJob'] . " - le " . date('d/m/Y',strtotime($comment['created_at'])) ?></small>
                                    <hr>
                                </div>
                            </div>
                            <p class="my-1">
                                <?= $comment['text'] ?>
                            </p>
                            <small>
                                <?php if ($_SESSION['id'] === $comment['author_id']): ?>
                                    <a href="#" class="mx-2"> Éditer</a>
                                    <a href="#" class="mx-2" onclick="deleteAlert(<?= $comment['id'] ?>, 'comment')">Supprimer</a>
                                <?php endif ?>
                            </small>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </details>
            </article>
            <?php endforeach ?>
        </section>
        <!-- Aside -->
        <aside>
            <h3>Vous connaissez peut-être</h3>
            <div class="my-2 flex-center">
                <img class="img-200 radius-5" src="https://picsum.photos/300/200" alt="Photo de l'utilisateur">
                <h4 class="my-0">Jane Doe</h4>
                <a class="t-center" role="button" href="#">Suivre</a>
            </div>
            <div class="my-2 flex-center">
                <img class="img-200 radius-5" src="https://picsum.photos/300/200" alt="Photo de l'utilisateur">
                <h4 class="my-0">Jane Doe</h4>
                <a class="t-center" role="button" href="#">Suivre</a>
            </div>
            <div class="my-2 flex-center">
                <img class="img-200 radius-5" src="https://picsum.photos/300/200" alt="Photo de l'utilisateur">
                <h4 class="my-0">Jane Doe</h4>
                <a class="t-center" role="button" href="#">Suivre</a>
            </div>
            <div class="my-2 flex-center">
                <img class="img-200 radius-5" src="https://picsum.photos/300/200" alt="Photo de l'utilisateur">
                <h4 class="my-0">Jane Doe</h4>
                <a class="t-center" role="button" href="#">Suivre</a>
            </div>
        </aside>
    </div>

</main>