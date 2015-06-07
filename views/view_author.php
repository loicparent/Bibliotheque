<?php $author = $data['book']; 
      if (!isset($author -> authors_name)) {
          header('location: index.php?a=view&e=errors&type=404');
      }?>
<section>
    <div class="hautPage">
        <div class="recherche">
            <form action="index.php?a=search&e=pages" method="post">
                <label for="main-search">
                    Rechercher un livre
                </label>
                <input type="text" class="main-search" name="main-search" id="main-search" placeholder="Chercher un livre, un auteur, etc."><input type="submit" value="Chercher" class="main-search-submit">
            </form>
            <div class="recherche-categorie">
                <a href="./index.php?a=index&e=authors" class="categorie categorie-auteur">Afficher tous les auteurs</a>
                <a href="./index.php?a=index&e=editions" class="categorie categorie-edition">Afficher toutes les éditions</a>
                <a href="./index.php?a=index&e=categories" class="categorie categorie-genre">Afficher tous les genres</a>
                <div class="clearing"></div>
            </div>
        </div>
    </div>
    <article class="infoAuteur infoGeneral">
        <h3><?= $author -> authors_name; ?></h3>
        <div class="infosDuhaut">
            <div class="infosDuHaut gauche">
                <img src="./img/authors/<?= $author -> img_file; ?>" alt="Photo de <?= $author -> authors_name; ?>" class="description">
            </div>
            
            <p class="biographie">
                <?= $author -> authors_biography; ?>
            </p>
        </div>
        <div class="infoDuBas clearing">
        
            <?php $books = $data['books'];
            if ($books != null) : ?>
            <div class="livres premium">
                <h3>Les livres de <?= $author -> authors_name; ?></h3>
                <?php foreach ($books as $book) : ?>
                <div class="premium-item">
                    <a href="./index.php?a=view&e=books&id=<?= $book -> id; ?>"><img src="./img/covers/<?= $book -> img_file; ?>" alt="<?= $book -> title; ?>"></a>
                    <a href="./index.php?a=view&e=books&id=<?= $book -> id; ?>"><?= $book -> title; ?></a>
                </div>
                <?php endforeach; ?>
                <div class="clearing"></div>
            </div>
            <?php endif; ?>
        </div>
    </article>
</section>