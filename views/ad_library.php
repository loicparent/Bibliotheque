<section>
    <h2>Ajouter une bibliothèque</h2>
    <article class="addBook">
        <?php if (isset ($_GET['error'])): ?>
            <p class="warning"><span>!</span>ATTENTION&nbsp;: Veuillez compléter tous les champs</p>
        <?php endif ?>
        <form action="index.php?a=create&e=libraries" method="post" enctype="multipart/form-data">
            <label for="name">Nom&nbsp;:</label>
            <input type="text" id="name" name="name" placeholder="Entrez un nom">

            <label for="img_file">Photo&nbsp;:</label>
            <input type="file" id="img_file" name="img_file" placeholder="Entrez une photo">

            <label for="phone">Téléphone&nbsp;:</label>
            <input type="tel" name="phone" id="phone" placeholder="Entrez un numéro de téléphone">

            <label for="address">Adresse&nbsp;:</label>
            <textarea name="address" id="address" cols="30" rows="10"></textarea>

            <input type="submit" value="Valider">
        </form>
    </article>

    <article class="othersFunctions">
        <a href="index.php?a=admin&e=pages" title="Annuler et retourné à la page d’administration">Annuler</a>
    </article>
</section>