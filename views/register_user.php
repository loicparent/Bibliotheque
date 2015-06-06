<section>
    <?php if (isset ($_GET['error']) && $_GET['error'] == 1): ?>
        <div class="warningTop">
            <p class="warning"><span>!</span>ATTENTION: Veuillez compléter tous les champs</p>
        </div>
    <?php endif ?>
    <?php if (isset ($_GET['error']) && $_GET['error'] == 2): ?>
        <div class="warningTop">
            <p class="warning"><span>!</span>ATTENTION: Les mots de passes entré ne sont pas identiques</p>
        </div>
    <?php endif ?>
    <?php if (isset ($_GET['error']) && $_GET['error'] == 3): ?>
        <div class="warningTop">
            <p class="warning"><span>!</span>ATTENTION: Le nom d'utilisateur existe déjà, choisissez un autre.</p>
        </div>
    <?php endif ?>
    <article class="choixCompte">
        <div class="choixCompte-header">
             <a class="lienInscription actif" href="index.php?a=register&e=users">Inscription</a><a class="lienConexion" href="index.php?a=login&e=users">Connexion</a>
        </div>
        <div class="choixCompte-content">
            <div class="inscription" id="inscription">
                <form action="index.php?a=create&e=users" method="post">
                    <label for="username">Nom d‘utilisateur</label>
                    <input type="text" name="username" id="username" placeholder="ex: Martiti">

                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password">

                    <label for="password2">Vérification mot de passe</label>
                    <input type="password" name="password2" id="password2">

                    <input class="inscription-btn-submit" type="submit" value="S'inscrire">
                </form>
            </div>
        </div>
    </article>
    <footer class="footer">
        
    </footer>
</section>