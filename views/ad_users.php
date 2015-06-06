<section>
    <h2>Définir un administrateur</h2>
    <article class="addBook">
            <ul class="user-item">
                <?php foreach ($data['users'] as $user) : ?>
                <li class="user-item-list">
                    <span class="user-item-name"><?= $user -> username; ?>&nbsp;:</span>
                    <?php if ($user -> isAdmin == 1): ?>
                        <?php if ($user -> id == 1) :?>
                            <span class="user-item-admin">Administrateur Principale</span>
                        <?php else: ?>
                        <a class="user-item-admin user-item-link" href="index.php?a=setUser&e=users&id=<?= $user -> id; ?>">Définir comme utilisateur</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a class="user-item-user user-item-link" href="index.php?a=setAdmin&e=users&id=<?= $user -> id; ?>">Définir comme administrateur</a>
                    <?php endif ?>
                    <?php if ($user -> id !== $_SESSION['id'] && $user -> id != 1): ?>
                        <a class="user-item-delete user-item-link" title="ATTENTION!!! cette action est irréversible." href="index.php?a=delete&e=users&id=<?= $user -> id; ?>">Supprimer</a>
                    <?php endif ?>
                </li>
                <?php endforeach; ?>
            </ul>
    </article>

    <article class="othersFunctions">
        <a href="index.php?a=admin&e=pages" title="Annuler et retourné à la page d’administration">Retour</a>
    </article>
</section>