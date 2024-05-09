 <!-- ============================================================ 
 Front end : 
 Formulaire pour ajouter un correspondant APEA
 - les informations sur le correspondant APEA (civilité, nom, prénom, e-mail)
 - Lié à la page ajouterFiche.php
 (c) 2024 SPELLANZON Nelly
		
Back end :
- création du correspondant APEA
- Remplissage liste d'école : ref local ne peut pas créer, les autres peuvent créer
- Gestion erreurs
- Journalisation des données avec enr dans la table historique
	
(c) 2024 Cevik Meryem
 ============================================================ 
 ============================================================ -->

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
$ecoles=remplirListeEcolesAPEA($id_utilisateur,$erreur);

//Initialistation
@$coAPEA_civilite="";
@$coAPEA_nom="";
@$coAPEA_prenom = "";
@$coAPEA_mail="";
@$valider_coAPEA=$_POST["valider_coAPEA"];

// Appel de la fonction pour la création d'un coAPEA
creerAPEA($erreur,$message,$valider_coAPEA, $id_utilisateur);
?>
 <!-- 
 Formulaire
 ---------------------------------------- -->
<form name="creerAPEA" method="post" action="ficheInformation.php#ajouterCoAPEA">
    <ul>
        <h2> Création d'un correspondant local APEA </h2>
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
            <select name="coAPEA_civilite" id="idcoAPEA_civilite">
                <option value="">--Choissiez une civilité--</option>
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
            </select>
        </li>
        <li>
            <label for="nom">Nom&nbsp;:</label>
            <input type="text" id="idname" name="coAPEA_nom" required="required" value="<?php echo $coAPEA_nom?>" /><br />
        </li>
        <li>
            <label for="prenom">Prénom&nbsp;:</label>
            <input type="text" id="idprenom" name="coAPEA_prenom" required="required" value="<?php echo $coAPEA_prenom?>" /><br />
        </li>
        <li>
            <label for="mail">E-mail&nbsp;:</label>
            <input type="email" id="idcoAPEA_mail" name="coAPEA_mail" required="required" value="<?php echo $coAPEA_mail?>" /><br />
        </li>
    </ul>
    <div class="button">
        <button type="submit" name="valider_coAPEA" >Valider</button>
    </div>
</form>