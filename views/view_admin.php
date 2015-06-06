<section>
    <h2>Administration</h2>
    <article class="addBook">
        <h3>Ajouter un livre</h3>
        <?php if (isset ($_GET['error'])): ?>
            <p class="warning"><span>!</span>ATTENTION: Veuillez compléter tous les champs</p>
        <?php endif ?>
        <form action="index.php?a=create&e=books" method="post" enctype="multipart/form-data">
            <label for="title">Titre&nbsp;:</label>
            <input type="text" id="title" name="title" placeholder="Entrez un titre">
            
            <label for="author">Auteur&nbsp;:</label>
            <select name="author" id="author">
                <?php foreach ($data['authors'] as $author ): ?>
                <option value="<?= $author->id ?>"><?= $author->name ?></option>
                <?php endforeach; ?>
            </select>

            <label for="edition">&Eacute;ditions&nbsp;:</label>
            <select name="edition" id="edition">
                <?php foreach ($data['editions'] as $edition ): ?>
                <option value="<?= $edition->id ?>"><?= $edition->name ?></option>
                <?php endforeach; ?>
            </select>

            <label for="category">Catégorie&nbsp;:</label>
            <select name="category" id="category">
                <?php foreach ($data['categories'] as $category ): ?>
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                <?php endforeach; ?>
            </select>

            <label for="library" title="Maintenez enfoncé la touche commande (ou controle sur PC) pour sélectionner plusieurs bibliothèques">Bibliothèque&nbsp;: (&nbsp;maintenez enfoncer ctrl/cmd pour sélectionner plusieurs éléments&nbsp;)</label>
            <select name="library[]" id="library" multiple="multiple" size="10">
                <?php foreach ($data['libraries'] as $library ): ?>
                <option value="<?= $library->id ?>"><?= $library->name ?></option>
                <?php endforeach; ?>
            </select>

            <label for="language">Langue&nbsp;:</label>
            <input type="text" name="language" id="language" placeholder="indiquez la langue du livre">

            <label for="length">Longueur&nbsp;:</label>
            <input type="number" name="length" id="length" placeholder="indiquez le nombre de page du livre">

            <label for="year">année&nbsp;:</label>
            <input type="number" name="year" id="year" placeholder="indiquez l'année de sortie du livre" step="10" value="1970">

            <label>disponibilité&nbsp;:</label>
            <label class="radio" for="available">Oui&nbsp;:</label>
            <input type="radio" name="disponibility" value="1" id="available">
            <label class="radio" for="notAvailable">Non&nbsp;:</label>
            <input type="radio" name="disponibility" value="0" id="notAvailable">

            <label title="Correspond au ‘livre de la semaine’, mis en avant sur la page d’accueil">sélection de la semaine&nbsp;:</label>
            <label title="en cochant cette case, ce livre est mis en avant sur la page d’accueil et remplace ‘le livre de la semaine’ précédent" class="checkbox" for="bookOfWeek">Oui</label>
            <input title="en cochant cette case, ce livre est mis en avant sur la page d’accueil et remplace ‘le livre de la semaine’ précédent" type="checkbox" name="bookOfWeek" id="bookOfWeek" value="1">

            <label for="img_file">Image&nbsp;:</label>
            <input type="file" id="img_file" name="img_file" placeholder="Entrez une image">

            <label for="description">Description&nbsp;: (&nbsp;maximum 1250 caractères&nbsp;)</label>
            <textarea name="description" id="description" cols="30" rows="10" maxlength="1250"></textarea>

            <input type="submit" value="Valider">
        </form>
    </article>

    <article class="othersFunctions">
        <a href="index.php?a=ad&e=authors" title="Ajuter un auteur à la base de donnée">Ajouter un auteur</a>

        <a href="index.php?a=ad&e=editions" title="Ajuter un éditeur à la base de donnée">Ajouter un éditeur</a>

        <a href="index.php?a=ad&e=categories" title="Ajuter un genre à la base de donnée">Ajouter un genre</a>

        <a href="index.php?a=ad&e=libraries" title="Ajuter une bibliothèque à la base de donnée">Ajouter une bibliothèque</a>

        <a href="index.php?a=ad&e=users" title="Ajuter une bibliothèque à la base de donnée">Définir un administrateur</a>
    </article>
</section>