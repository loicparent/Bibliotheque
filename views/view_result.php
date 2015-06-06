<section>
    <div class="hautPage">
        <h2>Bienvenue sur la bibliothèque en ligne&nbsp;!</h2>
        <p class="intro">Cherchez, découvrez, re-découvrez le livre qui vous fait envie.</p>
        <p class="intro">Bonne visite&nbsp;!</p>

        <div class="recherche">
            <?php if( isset( $_GET['error'] ) && $_GET['error'] == 1 ): ?>
                <p class="warning"><span>!</span>ATTENTION: Pour effectuer une recherche, vous devez compléter le champ de recherche.</p>
            <?php endif; ?>
            <?php if( isset( $_GET['error'] ) && $_GET['error'] == 2 ): ?>
                <p class="warning"><span>!</span>ATTENTION: Vous devez entrer au moins trois caractères.</p>
            <?php endif; ?>
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

    <article class="search-result">
        <h3>Tous les résultats</h3>
        <?php if ( isset( $data['resultBooks'] ) && $data['resultBooks'] ): ?>
        <ul class="results results-books">
            <h4>Les livres correspondants&nbsp;:</h4>
            <?php foreach ($data['resultBooks'] as $book) :?>
            <li class="result">    
                <div>
                    <a class="result-img" href="index.php?a=view&e=books&id=<?= $book -> id; ?>"><img src="./img/covers/<?= $book -> img_file; ?>" alt=""></a>
                    <a href="index.php?a=view&e=books&id=<?= $book -> id; ?>" class="result-title"><?= $book -> title; ?></a> -
                    <a href="index.php?a=view&e=authors&id=<?= $book -> author_id; ?>" class="result-author"><?= $book -> author_name; ?></a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
            <?php $noBooks = 1; ?>
        <?php endif; ?>

        <?php if ( isset( $data['resultAuthors'] ) && $data['resultAuthors'] ): ?>
        <ul class="results results-authors">
            <h4>Les auteurs correspondants&nbsp;:</h4>
            <?php foreach ($data['resultAuthors'] as $author) :?>
            <li class="result">    
                <div>
                    <a class="result-img" href="index.php?a=view&e=authors&id=<?= $author -> id; ?>"><img src="./img/authors/<?= $author -> img_file; ?>" alt=""></a>
                    <a href="index.php?a=view&e=authors&id=<?= $author -> id; ?>" class="result-title"><?= $author -> name; ?></a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
            <?php $noAuthors = 1; ?>
        <?php endif; ?>

        <?php if ( isset( $data['resultEditions'] ) && $data['resultEditions'] ): ?>
        <ul class="results results-authors">
            <h4>Les éditions correspondants&nbsp;:</h4>
            <?php foreach ($data['resultEditions'] as $edition) :?>
            <li class="result">    
                <div>
                    <a class="result-img" href="index.php?a=view&e=editions&id=<?= $edition -> id; ?>"><img src="./img/editions/<?= $edition -> img_file; ?>" alt=""></a>
                    <a href="index.php?a=view&e=editions&id=<?= $edition -> id; ?>" class="result-title"><?= $edition -> name; ?></a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
            <?php $noEditions = 1; ?>
        <?php endif; ?>

        <?php if ( isset( $data['resultCategories'] ) && $data['resultCategories'] ): ?>
        <ul class="results results-authors">
            <h4>Les genres correspondants&nbsp;:</h4>
            <?php foreach ($data['resultCategories'] as $category) :?>
            <li class="result">    
                <div>
                    <a class="result-img" href="index.php?a=view&e=categories&id=<?= $category -> id; ?>"><img src="./img/categories/<?= $category -> img_file; ?>" alt=""></a>
                    <a href="index.php?a=view&e=categories&id=<?= $category -> id; ?>" class="result-title"><?= $category -> name; ?></a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
            <?php $noCategories = 1; ?>
        <?php endif; ?>

        <?php if ( isset( $data['resultLibraries'] ) && $data['resultLibraries'] ): ?>
        <ul class="results results-authors">
            <h4>Les bibliothèques correspondants&nbsp;:</h4>
            <?php foreach ($data['resultLibraries'] as $library) :?>
            <li class="result">    
                <div>
                    <a class="result-img" href="index.php?a=view&e=libraries&id=<?= $library -> id; ?>"><img src="./img/libraries/<?= $library -> img_file; ?>" alt=""></a>
                    <a href="index.php?a=view&e=libraries&id=<?= $library -> id; ?>" class="result-title"><?= $library -> name; ?></a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
            <?php $noLibraries = 1; ?>
        <?php endif; ?>

        <?php if ( isset( $noBooks ) && isset( $noAuthors ) && isset( $noEditions ) && isset( $noCategories ) && isset( $noLibraries ) && !isset( $_GET['error'] ) ): ?>
            <h4 class="nothing">Aucun éléments ne correspond à votre recherche</h4>
        <?php endif ?>
    </article>
</section>