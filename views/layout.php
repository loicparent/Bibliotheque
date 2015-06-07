<!DOCTYPE html>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" lang="fr" content="bibliothèque, livre, bouquins, bibliothèque en ligne, roman">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Loïc Parent">
    <meta name="description" content="Travail de fin d’année en option infographie Web de la HEPL pour le cours de M. Vilain" />
    <title><?= $data['page_title']; ?></title>
    <link rel="icon" href="./img/fav.ico" />
    <link rel="stylesheet" type="text/css" href="./style/<?= $data['styleName']; ?>.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./scripte/scripte.js"></script>
</head>
<body>
    <div class="site-container">
        <div class="site-push">
            <div class="site-contenu">
                <header>
                        <a href="#" class="tinyMenu-button"></a>
                        <h1><a href="./index.php">Bibliothèque en ligne</a></h1>
                        <nav class="menuPrincipale">
                            <a href="./index.php" class="menuPrincipale-item <?php if ( $data['actifLink'] == 'index' ): ?>
                                actif
                            <?php endif ?>">Accueil</a>

                            <a href="./index.php?a=index&e=libraries" class="menuPrincipale-item <?php if ( $data['actifLink'] == 'libraries' ): ?>
                                actif
                            <?php endif ?>">Les bibliothèques</a>

                            <a href="./index.php?a=pagination&e=books" class="menuPrincipale-item <?php if ( $data['actifLink'] == 'allBooks' ): ?>
                                actif
                            <?php endif ?>">Tous les livres</a>
                            <?php if( isset($_SESSION['connected'] ) && $_SESSION['connected'] == '1' && $_SESSION['isAdmin'] == '1' ): ?>
                                <a href="index.php?a=disconnect&e=users" class="menuPrincipale-item">Se déconnecter</a>

                                <a href="index.php?a=admin&e=pages" class="menuPrincipale-item <?php if ( $data['actifLink'] == 'admin' ): ?>
                                actif
                            <?php endif ?>">Administration</a>

                            <?php elseif( isset($_SESSION['connected'] ) && $_SESSION['connected'] == '1' ): ?>
                                <a href="index.php?a=disconnect&e=users" class="menuPrincipale-item">Se déconnecter</a>

                                <a href="index.php?a=user&e=pages" class="menuPrincipale-item <?php if ( $data['actifLink'] == 'user' ): ?>
                                actif
                            <?php endif ?>"><?= $_SESSION['user']; ?></a>

                            <?php else: ?>
                                <a href="index.php?a=login&e=users" class="menuPrincipale-item <?php if ( $data['actifLink'] == 'login' ): ?>
                                actif
                            <?php endif ?>">Se connecter</a>

                                <a href="index.php?a=register&e=users" class="menuPrincipale-item <?php if ( $data['actifLink'] == 'register' ): ?>
                                actif
                            <?php endif ?>">S'inscrire</a>

                            <?php endif; ?>
                        </nav>
                        <address><a href="mailto:loic1994@hotmail.com?subject=Question concernant le site de la bibliothèque en ligne">Contacter le webmestre</a></address>
                    </header>
                    <?php include($data['view']); ?>
                </div>
            <div class="site-cache"></div>
        </div>
    </div>
</body>
</html>