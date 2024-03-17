<?php
/* ============================================================
 *	Page de de connexion : 
 * - Vérification si de l'identifiant et mot de passe crypté
 * - Si c'est la connexion est réussite, ouverture de la session
 *		
 *		
 *	
 * (c) 2024 CEVIK Meryem
 * ============================================================ */
/* ============================================================ */
// FONCTIONS LOCALES
// ----------------------------------------
function verifierConnexion($login, $pass){
   // Inclusion du fichier de connexion à la base de données
   include("cnx/connexion.php");

   // Hashage du mot de passe
   $pass = md5($pass);

   // Préparation de la requête SQL
   $sel = $pdo->prepare("select * from utilisateur where Email=? and Mot_de_passe=? limit 1");

   // Exécution de la requête SQL
   $sel->execute(array($login,$pass));

   // Récupération des résultats
   $tab = $sel->fetchAll();

   // Si un utilisateur correspondant est trouvé
   if (count($tab) > 0) {
      $_SESSION["id_utilisateur"] = $tab[0]["id_utilisateur"];
       // Autorisation de la session
       $_SESSION["autoriser"] = "oui";
       // Redirection vers la page de session
       header("location:session.php");
       exit();
   } else {
       // Si l'utilisateur n'est pas trouvé, retourner un message d'erreur
       return "Mauvais login ou mot de passe!";
   }
}
// ---------------------------------------------------------------
// /Fin des fonctions locales
/* ============================================================ */
// INITIALISATIONS ET TRAITEMENTS
// ---------------

// Démarrage de la session
session_start();
//déclaration erreur
$erreur = "";

// Vérification si le formulaire est soumis
if(isset($_POST["valider"])) {
    // Récupération des données du formulaire
    $login = $_POST["login"];
    $pass = $_POST["pass"];

    // Appel de la fonction de vérification de connexion
    $erreur = verifierConnexion($login, $pass);
}
// ---------------------------------------------------------------
// /Fin des traitements
/* ============================================================ */
?>
<!---------------------partie html---------------------->
<!DOCTYPE html>
<html lang="fr">
   <?php
   include "header.php";
   ?>
   <body onLoad="document.fo.login.focus()">
      <!-- Menu de la page de connexion -->
      <div class="a">
         <a href="index.php"><img src="images/logo_openeduc.jpg" alt="Logo OpenEduc" class="logo_menu_cnx"/></a>
      </div>
      <!-- ---------------------------- -->
      <br><br>
      <div class="container_cnx">
         <h1>Connexion</h1>
         <div class="erreur"><?php echo $erreur ?></div>
         <form name="connexion" method="post" action="">
            <input type="text" name="login" placeholder="Login" required="required"/><br />
            <input type="password" name="pass" placeholder="Mot de passe" required="required"/><br />
            <input  type="submit" name="valider" value="S'authentifier" />
         </form>
      </div>
      <?php
    include "footer.php";
    ?>
   </body>
</html>
