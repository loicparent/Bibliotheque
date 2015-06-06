<?php $book = $data['books']; ?>
<section>
    <h2>Modifier l’image du livre <?= $book -> title ;?></h2>
    <article class="addBook">
        <?php if (isset ($_GET['error'])): ?>
            <p class="warning"><span>!</span>ATTENTION: Veuillez compléter tous les champs</p>
        <?php endif ?>
        <form action="index.php?a=replaceImg&e=books&id=<?= $book -> book_id ;?>&img=<?= $book -> img_file ;?>" method="post" enctype="multipart/form-data">

            <label for="img_file">Photo&nbsp;:</label>
            <input type="file" id="img_file" name="img_file" placeholder="Entrez une photo">

            <input type="submit" value="Valider">
        </form>
    </article>

    <article class="othersFunctions">
        <a href="index.php?a=edit&e=books&id=<?= $book -> book_id ;?>" title="Annuler et retourné à la page d’administration">Annuler</a>
    </article>
</section>