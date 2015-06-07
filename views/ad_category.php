<section>
    <h2>Ajouter un genre littéraire</h2>
    <article class="addBook">
        <?php if (isset ($_GET['error'])): ?>
            <p class="warning"><span>!</span>ATTENTION&nbsp;: Veuillez compléter tous les champs</p>
        <?php endif ?>
        <form action="index.php?a=create&e=categories" method="post">
            <label for="name">Nom&nbsp;:</label>
            <input type="text" id="name" name="name" placeholder="Entrez un nom">

            <label for="description">Description&nbsp;:</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>

            <input type="submit" value="Valider">
        </form>
    </article>

    <article class="othersFunctions">
        <a href="index.php?a=admin&e=pages" title="Annuler et retourné à la page d’administration">Annuler</a>
    </article>
</section>