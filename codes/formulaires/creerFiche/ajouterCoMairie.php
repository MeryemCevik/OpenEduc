 <!-- ============================================================ 
 Front end :
 Formulaire pour ajouter un correspondant Mairie
 - les informations sur le correspondant mairie (civilité, nom, prénom, téléphone, e-mail)
 - Lié à la page ajouterFiche.php
  (c) 2024 SPELLANZON Nelly
		
Backend :
- Création de fonction creerMairie dans fonctions.php pour enregistrer correspondant Mairie
en fonction des rôles
- Sélection de l'école pour enregistrer le coMairie
- Gestion erreur
- Insertion de l'historique dans la table historique
(c) 2024 Cevik Meryem

 ============================================================
 ============================================================ 
 Formulaire
 ---------------------------------------- -->

 <?php
// Inclure le fichier fonctions.php
include_once("fonctions.php");

//réf a login.php, si le login a été bien fait en va a la page login
if($_SESSION["autoriser"]!="oui"){
header("location:login.php");
exit();
}
 // Assurez-vous que l'ID de l'utilisateur est défini dans la session
if (!isset($_SESSION["Id_utilisateur"])) {
    // Redirigez l'utilisateur vers une page de connexion ou affichez un message d'erreur
    exit("Erreur: ID utilisateur non défini dans la session.");
}

// Récupération de l'ID de l'utilisateur à partir de la session
$id_utilisateur = $_SESSION["Id_utilisateur"];

$erreur="";
$message="";

// Appel de la fonction pour le remplissage de la liste d'école par rapport aux rôles
$ecoles=remplirListeEcolesMairie($id_utilisateur,$erreur);

//Initialistation
@$civilite_mairie="";
@$nom_mairie="";
@$prenom_mairie = "";
@$tel_mairie="";
@$mail_mairie="";
@$id_ecole="";
@$valider_coMairie=$_POST["valider_coMairie"];

// Appel de la fonction pour la création d'un coMAirie
creerMairie($erreur,$message,$valider_coMairie, $id_utilisateur);
?>

<form name="createCoMairie" method="post" action="ficheInformation.php#ajouterCoMairie">
    <ul>
        <h2> Création d'un correspondant local mairie </h2>
        <div style="color:red" class="erreur"><?php echo $erreur?></div>
        <div style="color:green" class="message"><?php echo $message ?></div>
        <li>
            <label for="ecole">Ecole&nbsp;:</label>
            <select name="ecole" id="ecole">
            <option value="">--Choisissez une école de votre choix--</option>
            <?php foreach ($ecoles as $ecole) : ?>
                <option value="<?php echo $ecole['Id_ecole']; ?>"><?php echo $ecole['Code_ecole'] . ' - ' . $ecole['Nom']; ?></option>
            <?php endforeach; ?>
            </select>
        </li>
        <li>
        <label for="civilite">Civilité&nbsp;:</label>
            <select name="civilite_mairie" id="idcoMairie_civilite">
                <option value="">--Choissiez une civilité--</option>
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
            </select>
        </li>
        <li>
            <label for="name">Nom&nbsp;:</label>
            <input type="text" id="idcoMairie_nom" name="nom_mairie" required="required" value="<?php echo $nom_mairie?>" /><br />
        </li> 
        <li>
            <label for="prenom">Prénom&nbsp;:</label>
            <input type="text" id="idcoMairie_prenom" name="prenom_mairie" required="required" value="<?php echo $prenom_mairie?>" /><br />
        </li>
        <li>
            <label for="telephone">Téléphone&nbsp;:</label>
            <input type="int" id="idcoMairie_tel" name="tel_mairie" required="required" value="<?php echo $tel_mairie?>" /><br />
        </li>
        <li>
            <label for="mail">E-mail&nbsp;:</label>
            <input type="email" id="idcoMairie_mail" name="mail_mairie" required="required" value="<?php echo $mail_mairie?>" /><br />
        </li>
    </ul>
    <div class="button">
        <button type="submit" name="valider_coMairie" >Valider</button>
    </div>
</form>