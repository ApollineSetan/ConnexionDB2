<section>
    <h1>Mon compte</h1>
    <p>Nom : <?php echo $_SESSION['user']['lastname']; ?></p>
    <p>Prénom : <?php echo $_SESSION['user']['firstname']; ?></p>
    <p>Email : <?php echo $_SESSION['user']['email']; ?></p>

</section>