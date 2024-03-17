    <?php
    session_start();
    // Vérifie si l'utilisateur est autorisé
    if($_SESSION["autoriser"]!="oui"){
        header("location:login.php");
        exit();
    }
    ?>

<!---------------------partie html---------------------->
    <!DOCTYPE html>
    <html lang="fr">
    <?php include "header.php"; ?>
    <body>
        <?php include "menu.php"; ?>
        <h2><?php echo $message; ?></h2>
        <div>
            <h3>Informations de profil :</h3>
            <p>Nom complet : <?php echo $prenomNom; ?></p>
            <p>Email : <?php echo $email; ?></p>
        </div>
        <?php include "footer.php"; ?>
    </body>
    </html>
