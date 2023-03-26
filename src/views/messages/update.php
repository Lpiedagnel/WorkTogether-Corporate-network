<main class="container">
    <h1>Modifier votre message</h1>
    <article>
        <form action="index.php?controller=message&action=edit" method="POST">
            <label for="text">Votre message</label>
            <textarea name="text" cols="50" rows="2" placeholder="Qu'est-ce que vous allez raconter à vos collègues?" required><?= $post['text'] ?></textarea>
            <label for="file">Téléchargez une image
                <input type="file" name="file">
            </label>
            <button type="submit">Modifier votre message</button>
        </form>
    </article>
</main>