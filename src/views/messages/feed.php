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
                <form action="index.php?controller=message&action=add" method="POST" enctype="multipart/form-data">
                    <label for="text">Votre message</label>
                    <textarea name="text" cols="50" rows="2" placeholder="Qu'est-ce que vous allez raconter à vos collègues?" required></textarea>
                    <label for="file">Téléchargez une image
                        <input type="file" name="img">
                    </label>
                    <button type="submit">Envoyez votre message</button>
                </form>
            </article>

            <?php foreach($posts as $post): ?>
            <article>
                <div class="flex-around">
                    <img class="img-125 radius-50" src="<?= $post['authorAvatar'] ?>" alt="Photo de profil de l'utilisateur">
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
                <?php
                // If img
                if ($post['img_path'] !== null) {
                    echo '<img src="' . $post['img_path'] . '" alt="Image du message">';
                }
                
                ?>
                <div class="my-1">
                    <!-- Like button -->
                    <a href="javascript: void(0)" onclick="socialInteraction(event, 'likes', <?= $post['id'] ?>)">&#x1F499; J'aime ! <?= $post['likesNumber'] > 0 ? "({$post['likesNumber']})" : "" ?></a>
                    <?php if (($_SESSION['id'] === $post['author_id']) || ($_SESSION['is_admin'] === 1)): ?>
                       <!-- If author --> 
                        <a href="index.php?controller=message&action=update&id=<?= $post['id'] ?>" class="mx-2"> Éditer</a>
                        <a href="javascript: void(0)" class="mx-2" onclick="deleteAlert(<?= $post['id'] ?>, 'message')">Supprimer</a>
                    <?php endif ?>
                </div>
               <!-- Comments --> 
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
                                <img src="<?= $comment['authorAvatar'] ?>"alt="Photo de profil de l'utilisateur" class="radius-5"> 
                                <div class="text-center">
                                    <h4 class="my-0"><?= $comment['authorFirstName'] . ' ' . $comment['authorLastName'] ?> </h4>
                                    <small>
                                        <?= $comment['authorJob'] ? $comment['authorJob'] . ' - ' : '' ?>
                                        <?= "le " . date('d/m/Y',strtotime($comment['created_at'])) ?>
                                    </small>
                                    <hr>
                                </div>
                            </div>
                            <p class="my-1">
                                <?= $comment['text'] ?>
                            </p>
                            <small>
                                <?php if (($_SESSION['id'] === $comment['author_id']) || $_SESSION['is_admin'] === 1): ?>
                                    <a href="index.php?controller=comment&action=update&id=<?= $comment['id'] ?>" class="mx-2"> Éditer</a>
                                    <a href="javascript: void(0)" class="mx-2" onclick="deleteAlert(<?= $comment['id'] ?>, 'comment')">Supprimer</a>
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
            <?php foreach ($users as $user): ?>
            <div class="my-2 flex-center">
                <img class="img-200 radius-5" src="<?= $user['img_path'] ?>" alt="Photo de <?= $user['first_name'] ?>">
                <h4 class="my-0"><?= $user['first_name'] . ' ' . $user['last_name'] ?></h4>
                <a class="t-center" role="button" href="javascript: void(0)" onclick="socialInteraction(event, 'follow', <?= $user['id'] ?>)">Suivre</a>
            </div>
           <?php endforeach ?> 
        </aside>
    </div>

</main>