<section>
    <h1>Inscription</h1>
    <form action="" method="post">
        <input type="text" name="lastname" placeholder="Le Nom de Famille">
        <input type="text" name="firstname" placeholder="Le Prénom">
        <input type="text" name="email" placeholder="L'Email'">
        <input type="password" name="password" placeholder="Le Mot de Passe">
        <input type="submit" name="submitSignUp" value="S'inscrire">
    </form>
    <p><?php echo isset($message) ? $message : ''; ?></p>
</section>

<section>
    <h1>Connexion</h1>
    <form action="" method="post">
        <input type="text" name="email" placeholder="Votre email">
        <input type="password" name="password" placeholder="Votre mot de passe">
        <input type="submit" name="submitlogin" value="Se connecter">
    </form>
    <p><?php echo isset($messagelogin) ? $messagelogin : ''; ?></p>
</section>



<section>
    <h1>Liste d'Utilisateurs</h1>
    <ul>
    <?php echo isset($listUsers) ? $listUsers : ''; ?>
    </ul>
</section>