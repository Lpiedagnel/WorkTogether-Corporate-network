<main class="container">
    <div class="grid seed">
        <!-- Feed -->
        <section>
            <hgroup>
                <h1>Bienvenue John Doe !</h1>
                <h2>Quoi de neuf chez vos collègues ?</h2>
            </hgroup>
            <article class="grid">
                <form>
                    <label for="message">Votre message</label>
                    <textarea name="message" cols="50" rows="2" placeholder="Qu'est-ce que vous allez raconter à vos collègues?" required></textarea>
                    <label for="file">Téléchargez une image
                        <input type="file" name="file">
                    </label>
                    <button type="submit" onclick="event.preventDefault()">Envoyez votre message</button>
                </form>
            </article>
            <!-- Feed message -->
            <article class="feed__message">
                <header class="grid">
                    <img src="https://picsum.photos/100" alt="Random img">
                    <h3>John Doe</h3>
                </header>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio sequi earum eum eligendi at. Ipsum neque totam sequi sapiente expedita vitae accusamus, minima nobis, voluptate iste enim commodi. Facilis, soluta?</p>
                <footer class="grid">
                    <a href="#">Commenter</a>
                    <aside>
                        <a href="#">J'aime</a>
                        2
                    </aside>
                </footer>
            </article>
            <!-- Feed message -->
            <article class="feed__message">
                <header class="grid">
                    <img src="https://picsum.photos/100" alt="Random img">
                    <h3>John Doe</h3>
                </header>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio sequi earum eum eligendi at. Ipsum neque totam sequi sapiente expedita vitae accusamus, minima nobis, voluptate iste enim commodi. Facilis, soluta?</p>
                <footer class="grid">
                    <a href="#">Commenter</a>
                    <aside>
                        <a href="#">J'aime</a>
                        2
                    </aside>
                </footer>
            </article>
            <!-- Feed message -->
            <article class="feed__message">
                <header class="grid">
                    <img src="https://picsum.photos/100" alt="Random img">
                    <h3>John Doe</h3>
                </header>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio sequi earum eum eligendi at. Ipsum neque totam sequi sapiente expedita vitae accusamus, minima nobis, voluptate iste enim commodi. Facilis, soluta?</p>
                <footer class="grid">
                    <a href="#">Commenter</a>
                    <aside>
                        <a href="#">J'aime</a>
                        2
                    </aside>
                </footer>
            </article>
        </section>
        <!-- Aside --> 
        <aside>
            <article>
               <header>
               <hgroup>
                    <h2>Vos amis</h2>
                    <h3>Vous pouvez devenir ami avec des collègues !</h3>
                </hgroup>
               </header> 
            </article>
        </aside>
    </div>
</main>