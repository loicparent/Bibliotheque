<?php $book = $data['book'];
      if (!isset($book -> title)) {
          header('location: index.php?a=view&e=errors&type=404');
      }
      $book_libraries = $data['book_libraries']; ?>
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
    
    <article class="livre">
        <h3>Livre <?= $book -> title; ?></h3>
        <div class="infoDuHaut">
            <h4>De <a href="./index.php?a=view&e=authors&id=<?= $book -> author_id;?>"><?= $book -> authors_name; ?></a> Par les éditions <a href="./index.php?a=view&e=editions&id=<?= $book -> edition_id;?>"><?= $book -> editions_name; ?></a></h4>
            <img class="visu" src="./img/covers/<?= $book -> img_file; ?>" alt="<?= $book -> title; ?>">
            <ul class="info-droites">
                <li>Emplacement: 
                    <?php foreach ($book_libraries as $library) : ?>
                    <span><a href="./index.php?a=view&e=libraries&id=<?= $library -> library_id;?>"><?= $library -> library_name; ?></a></span>    
                    <?php endforeach; ?>
                </li>
                <li>Genre littéraire: <span><a href="./index.php?a=view&e=categories&id=<?= $book -> category_id;?>"><?= $book -> categories_name; ?></a></span></li>
                <li>Langue: <span><?= $book -> langage; ?></span></li>
                <li>Nombre de pages: <span><?= $book -> length; ?></span></li>
                <li>Année de publication: <span><?= $book -> year; ?></span></li>
                <li>Disponible: <span><a href="./index.php?a=index&e=disponibilities"><?= $book -> disponibility == 1 ? "oui" : "non";  ?></a></span></li>
            </ul>
            <?php if( isset($_SESSION['connected']) && $_SESSION['isAdmin'] == '0' ): ?>
                <?php if ( $data['isInFavourites'] == false) : ?>
                    <a href="index.php?a=addfave&e=books&id=<?= $book -> book_id ?>" class="ajoutFavorit">Ajouter ce livre à mes favoris</a>
                <?php else: ?>
                    <a href="index.php?a=removefave&e=books&id=<?= $book -> book_id ?>" class="ajoutFavorit">Supprimer le livre de mes favoris</a>
                <?php endif; ?>        
            <?php endif; ?>

            <?php if( isset($_SESSION['connected']) && $_SESSION['isAdmin'] == '1' ): ?>
                    <a href="index.php?a=delete&e=books&id=<?= $book -> book_id; ?>&img_file=<?= $book -> img_file; ?>" title="ATTENTION, cette action est irréversible" class="ajoutFavorit">Supprimer ce livre</a>
                    <a href="index.php?a=edit&e=books&id=<?= $book -> book_id ?>" class="ajoutFavorit">Modifier ce livre</a>                            
            <?php endif; ?>

            <div class="clearing"></div>
        </div>
        <div class="resume">
            <h4>Petit résumé</h4>
            <div class="texte">
                <p><?= $book -> description; ?></p>
            </div>
        </div>
        <div class="autreslivres">
            <div class="premium other">
                <?php 
				$books = $data['sameCategory'];
                if ($books != null) : ?>
                <h4>Dans le même genre</h4>
                    <?php foreach ($books as $book) : ?>
                <div class="premium-item">
                    <a href="./index.php?a=view&e=books&id=<?php echo $book -> id; ?>"><img src="./img/covers/<?php echo $book -> img_file; ?>" alt="<?php echo $book -> title; ?>"></a>
                    <a href="./index.php?a=view&e=books&id=<?php echo $book -> id; ?>"><?= $book -> title; ?></a>
                </div>
                <?php endforeach; 
                endif; ?>
                <div class="clearing"></div>
            </div>
        </div>
    </article>
</section>