<div class="container">
    <section>
        <hgroup>
            <h1>Bienvenue sur la panneau d'administration !</h1>
            <p>Vous pouvez voir la liste des membres ici.</p>
        </hgroup>
    </section>
    <h2>Liste des membres</h2>
    <?php foreach ($users as $user): ?>
        <article class="flex-user">
            <img class="img-125" src="<?= $user['img_path'] ?>" alt="Avatar de <?= $user['first_name'] . ' ' . $user['last_name'] ?>">
            <h2 class="my-0"><?= $user['first_name'] . ' ' . $user['last_name'] ?></h2>
            <a href="javascript: void(0)" role="button" class="contrast my-1" onclick="deleteAlert(<?= $user['id'] ?>, 'user')">Supprimer ce compte</a>
        </article>
    <?php endforeach ?>
</div>