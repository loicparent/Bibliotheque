<?php $book = $data['books'];
      $book_libraries = $data['book_libraries']; ?>
<section>
    <h2>Modifier le livre <?= $book -> title; ?></h2>
    <article class="addBook">
        <?php if (isset ($_GET['error'])): ?>
            <p class="warning"><span>!</span>ATTENTION&nbsp;: Veuillez compléter tous les champs</p>
        <?php endif ?>
        <form action="index.php?a=change&e=books" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $book -> book_id ;?>">

            <label >Image actuelle&nbsp;:</label>
            <div class="sticker">
                <a href="index.php?a=editImg&e=books&id=<?= $book -> book_id ;?>"><img src="./img/covers/<?= $book -> img_file ;?>" alt=""></a>
                <a href="index.php?a=editImg&e=books&id=<?= $book -> book_id ;?>" class="changeImg">Changer l’image</a>
            </div>

            <label for="title">Titre&nbsp;:</label>
            <input type="text" id="title" name="title" placeholder="Entrez un titre" value="<?= $book -> title; ?>">
            
            <label for="author">Auteur&nbsp;:</label>
            <select name="author" id="author">
                <?php foreach ($data['authors'] as $author ): ?>
                <option value="<?= $author->id ?>" <?php if ($book -> author_id == $author->id) : ?>
                selected="selected"
                <?php endif; ?>><?= $author->name ?></option>
                <?php endforeach; ?>
            </select>

            <label for="edition">&Eacute;ditions&nbsp;:</label>
            <select name="edition" id="edition">
                <?php foreach ($data['editions'] as $edition ): ?>
                <option value="<?= $edition->id ?>" <?php if ($book -> edition_id == $edition->id) : ?>
                selected="selected"
                <?php endif; ?>><?= $edition->name ?></option>
                <?php endforeach; ?>
            </select>

            <label for="category">Catégorie&nbsp;:</label>
            <select name="category" id="category">
                <?php foreach ($data['categories'] as $category ): ?>
                <option value="<?= $category->id ?>" <?php if ($book -> category_id == $category->id) : ?>
                selected="selected"
                <?php endif; ?>><?= $category->name ?></option>
                <?php endforeach; ?>
            </select>

            <label for="library" title="Maintenez enfoncé la touche commande (ou controle sur PC) pour sélectionner plusieurs bibliothèques">Bibliothèque&nbsp;: (&nbsp;maintenez enfoncer ctrl/cmd pour sélectionner plusieurs éléments&nbsp;)</label>
            <select name="library[]" id="library" multiple="multiple" size="10">
                <?php foreach ($data['libraries'] as $library ): ?>
                <option value="<?= $library->id; ?>"<?php foreach ($data['book_libraries'] as $key ): ?>
                    <?php if ( $library->id == $key -> library_id ): ?>
                        selected="selected"
                    <?php endif; ?>
                <?php endforeach; ?>
                ><?= $library->name ?></option>
                <?php endforeach; ?>
            </select>

            <label for="language">Langue&nbsp;:</label>
            <input type="text" name="language" id="language" placeholder="indiquez la langue du livre" value="<?= $book -> langage; ?>">

            <label for="length">Longueur&nbsp;:</label>
            <input type="number" name="length" id="length" placeholder="indiquez le nombre de page du livre" value="<?= $book -> length; ?>">

            <label for="year">année&nbsp;:</label>
            <input type="number" name="year" id="year" placeholder="indiquez l'année de sortie du livre" value="<?= $book -> year; ?>">

            <label>disponibilité&nbsp;:</label>
            <label class="radio" for="available">Oui&nbsp;:</label>
            <input type="radio" name="disponibility" value="1" id="available"
            <?php if ($book -> disponibility == 1): ?>
                checked=checked;
            <?php endif ?>>
            <label class="radio" for="notAvailable">Non&nbsp;:</label>
            <input type="radio" name="disponibility" value="0" id="notAvailable"
            <?php if ($book -> disponibility == 0): ?>
                checked="checked"
            <?php endif; ?>>

            <label title="Correspond au ‘livre de la semaine’, mis en avant sur la page d’accueil">sélection de la semaine&nbsp;:</label>
            <label title="en cochant cette case, ce livre est mis en avant sur la page d’accueil et remplace ‘le livre de la semaine’ précédent" class="checkbox" for="bookOfWeek">Oui</label>
            <input title="en cochant cette case, ce livre est mis en avant sur la page d’accueil et remplace ‘le livre de la semaine’ précédent" type="checkbox" name="bookOfWeek" id="bookOfWeek" value="1"
            <?php if ($book -> selection == 1): ?>
                checked="checked"
            <?php endif; ?>>                                

            <label for="description">Description&nbsp;: (&nbsp;maximum 1250 caractères&nbsp;)</label>
            <textarea name="description" id="description" cols="30" rows="10" maxlength="1250"><?= $book -> description ;?></textarea>

            <input type="submit" value="Valider">
        </form>
    </article>

    <article class="othersFunctions">
        <a href="index.php?a=view&e=books&id=<?= $book -> book_id ;?>" title="Annuler et retourné à la page d’administration">Annuler</a>
    </article>
</section>