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
                <div class="grid">
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
                </div>
                <details>
                    <summary>Commentaires (2)</summary>
                    <ul>
                        <li class="list-none">
                            <form>
                                <h4>Votre commentaire</h4>
                                <input type="text" name="comment">
                                <a href="#" role="button">Commenter</a>
                            </form>
                        </li>
                        <li class="list-none my-2">
                            <div class="grid grid-25">
                                <img src="https://picsum.photos/75" alt="Photo de profil de l'utilisateur" class="radius-5"> 
                                <h4 class="text-center">Jane Doe</h4>
                            </div>
                            <p class="my-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium debitis numquam fugiat explicabo cupiditate velit facilis non maiores sint eos exercitationem harum illum fugit consequuntur, temporibus iste deserunt ipsa cumque.</p>
                        </li>
                        <li class="list-none my-2">
                            <div class="grid grid-25">
                                <img src="https://picsum.photos/75" alt="Photo de profil de l'utilisateur" class="radius-5"> 
                                <h4 class="text-center">Jane Doe</h4>
                            </div>
                            <p class="my-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium debitis numquam fugiat explicabo cupiditate velit facilis non maiores sint eos exercitationem harum illum fugit consequuntur, temporibus iste deserunt ipsa cumque.</p>
                        </li>
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