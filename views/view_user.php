<section>
    <h2>Bienvenue cher <span class="nomUtilisateur"><?= $_SESSION['user']; ?></span> dans votre compte</h2>
    <article class="favourite">
        <h3>Mes favoris</h3>
        <ul class="userBooksList">
            <?php $books = $data['books'];
            foreach( $books as $book ) : ?>
            <li>
                <a href="./index.php?a=view&e=books&id=<?php echo $book -> book_id; ?>" class="favourite-list-image"><img src="./img/covers/<?= $book -> img_file; ?>" alt=""></a>
                <div class="favourite-sideInfo">
                    <h4>
                        <a href="./index.php?a=view&e=books&id=<?php echo $book -> book_id; ?>" class="favourite-list-title"><?= $book -> title; ?></a>
                    </h4>
                    <a href="index.php?a=removefave&e=books&id=<?= $book -> book_id ?>&dir=user" class="favourite-list-remove">Retirer de mes favorits</a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </article>
</section>