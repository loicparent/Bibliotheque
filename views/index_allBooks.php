<section>
    <div class="hautPage">
        <h2>Bienvenue sur la bibliothèque en ligne&nbsp;!</h2>
        <p class="intro">Cherchez, découvrez, re-découvrez le livre qui vous fait envie.</p>
        <p class="intro">Bonne visite&nbsp;!</p>

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

    <div class="premium">
        <h3>Tous les livres</h3>
        <?php 
		$books = $data['books'];
		foreach ($books as $book) : ?>
        <div class="premium-item">
            <a href="./index.php?a=view&e=books&id=<?php echo $book -> id; ?>"><img src="./img/covers/<?php echo $book -> img_file; ?>" alt="<?php echo $book -> title; ?>"></a>
            <a href="./index.php?a=view&e=books&id=<?php echo $book -> id; ?>"><?php echo $book -> title; ?></a>
        </div>
        <?php endforeach; ?>
        <div class="clearing"></div>
        <div class="paginateNumberBox">
            <?php for( $i=0; $i < $data['totalPages']; ++$i ): ?>
            <a href="?a=pagination&e=books&page=<?= $i+1 ?>" class="paginateNumber" ><?= $i+1 ?></a>
            <?php endfor; ?>
        </div>
    </div>
</section>