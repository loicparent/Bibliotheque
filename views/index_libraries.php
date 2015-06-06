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
    
    <article class="indexations">
        <h3>Les bibliothèques</h3>
        <ul>
        <?php $libraries = $data['libraries'];
        foreach ($libraries as $library) : ?>
            <li>
                <a href="./index.php?a=view&e=libraries&id=<?php echo $library -> id; ?>" class="indexations-liste"><?php echo $library -> name; ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
    </article>
    
    <footer class="footer">
        
    </footer>
</section>