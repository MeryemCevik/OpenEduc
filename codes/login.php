<?php
//partie php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   //oN gère les erreurs
   if(isset($valider)){ //si valider est défini
      include("cnx/connexion.php"); //on se connecte a la bdd
      $sel=$pdo->prepare("select * from utilisateur where Email=? and Mot_de_passe=? limit 1");// encore une fois on crée la requete avec prepare() pour éviter les infjetcions
      $sel->execute(array($login,$pass));//execute la requête préparé en passant un tableau de valeurs(ayant comme clé le login et comme valeur le mdp)
      $tab=$sel->fetchAll();//retourne le tableau
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["Prenom"]))." ".strtoupper($tab[0]["Nom"]);// pour des raisons de design et facilté, on met la premier lettres du prénom en grand et le nom en majuscule
         $_SESSION["autoriser"]="oui"; //on la valeur oui
         header("location:session.php"); // puis on met en tête la session
      }
      else // sinon erreur
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<!---------------------partie html et css---------------------->
<!DOCTYPE html>
<html lang="fr">
<?php
include "header.php";
?>
   <body onLoad="document.fo.login.focus()">
      <h1>Connexion</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="login" placeholder="Login" required="required"/><br />
         <input type="password" name="pass" placeholder="Mot de passe" required="required"/><br />
         <input  type="submit" name="valider" value="S'authentifier" />
      </form>
   </body>
</html>
