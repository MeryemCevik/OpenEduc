<?php
   session_start();
   //réf a login.php, si le login a été bien fait en va a la page login
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   // Récupération de l'ID de l'utilisateur
   $id_utilisateur = $_SESSION["id_utilisateur"];
   ?>

<!DOCTYPE html>
<html lang="fr">
<?php
include "header.php";
?>
   <body><!--on execute le formulaire de la page login.php-->
      <?php
      include "menu.php";
      ?>
      <h1>Page de session</h1>
      
      <a href="Profil.php">Mon profil</a>
      <a href="deconnexion.php">Se déconnecter</a> <!--un lien qui réference à la page deonnexion-->
      <p>Identifiant de l'utilisateur : <?php echo $id_utilisateur; ?></p>
   <?php
    include "footer.php";
    ?>
   </body>
</html>