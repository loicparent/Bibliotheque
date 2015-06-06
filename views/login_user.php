<section>
    <?php if (isset ($_GET['error']) && $_GET['error'] == 1): ?>
        <div class="warningTop">
            <p class="warning"><span>!</span>ATTENTION: Veuillez compléter tous les champs</p>
        </div>
    <?php endif ?>
    <?php if (isset ($_GET['error']) && $_GET['error'] == 2): ?>
        <div class="warningTop">
            <p class="warning"><span>!</span>ATTENTION: Vous n'avez pas entré un bon mot de passe ou nom d'utilisateur</p>
        </div>
    <?php endif ?>
    <article class="choixCompte">
        <div class="choixCompte-header">
            <a class="lienInscription" href="index.php?a=register&e=users">Inscription</a><a class="lienConexion actif" href="index.php?a=login&e=users">Connexion</a>
        </div>
        <div class="choixCompte-content">
            <div class="connexion" id="connexion">
                <form action="index.php?a=check&e=users" method="post">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" placeholder="ex: Jaqui">

                    <label for="password-connexion">Mot de passe</label>
                    <input type="password" name="password" id="password-connexion">

                    <input class="connexion-btn-submit" type="submit" value="Se connecter">
                </form>
            </div>
        </div>
    </article>
    <footer class="footer">
        
    </footer>
</section>