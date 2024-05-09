 <!-- ============================================================ 
 Formulaire pour modifier un correspondant Mairie
 - les informations sur le correspondant mairie
 (c) 2024 SPELLANZON Nelly
	
 Back end :
 - Programmation liste déroulante des correspondants Mairie
 - Enregistrement de la modification 
 - Gestion d'erreur
(c) Meryem Cevik
 ============================================================
 ============================================================ 
    Formulaire
 ---------------------------------------- -->

 <?php
// Inclure le fichier fonctions.php
include_once ("fonctions.php");

//réf a login.php, si le login a été bien fait en va a la page login
if ($_SESSION["autoriser"] != "oui") {
    header("location:login.php");
    exit();
}
// Assurez-vous que l'ID de l'utilisateur est défini dans la session
if (!isset ($_SESSION["Id_utilisateur"])) {
    // Redirigez l'utilisateur vers une page de connexion ou affichez un message d'erreur
    exit ("Erreur: ID utilisateur non défini dans la session.");
}

// Récupération de l'ID de l'utilisateur à partir de la session
$id_utilisateur = $_SESSION["Id_utilisateur"];

$erreur = "";
$message = "";

$coMairies = getCoMairiesParEcole($id_utilisateur, $erreur);

//Initialistation
@$coMairie_civilite="";
@$coMairie_nom = "";
@$coMairie_prenom = "";
@$coMairie_tel = "";
@$coMairie_mail = "";
@$valider_coMairie = $_POST["valider_modifier_coMairie"];

modifierCoMairie($erreur, $message, $valider_coMairie, $id_utilisateur);

?>


 <form name="createCoMairie" method="post" action="ficheInformation.php#modifierCoMairie">
    <ul>
        <h2>Modification de correspondant local mairie </h2>
        <div style="color:red" class="erreur">
            <?php echo $erreur ?>
        </div>
        <div style="color:green" class="message">
            <?php echo $message ?>
        </div>
        <li>
            <label for="coMairie">Correspondant Mairie&nbsp;:</label>
            <select name="coMairie" id="idCoMairie">
            <option value="">--Choisissez un correspondant mairie à modifier--</option>
            <?php if (!empty($coMairies)): ?>
                <?php foreach ($coMairies as $coMairie): ?>
                    <option value="<?php echo $coMairie["Id_corr_mairie"] ?>"><?php echo $coMairie["Civilite"].' '.$coMairie["Nom"].' '.$coMairie["Prenom"]; ?></option>
                <?php endforeach; ?>
                <?php else: ?>
                    <option value="" disabled>Aucun correspondant de mairie disponible</option>
                <?php endif; ?>
            </select>
        </li>
        <li>
        <label for="civilite">Civilité&nbsp;:</label>
            <select name="coMairie_civilite" id="idcoMairie_civilite">
                <option value="">--Choisissez une civilité--</option>
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
            </select>
        </li>
        <li>
            <label for="name">Nom&nbsp;:</label>
            <input type="text" id="idcoMairie_name" name="coMairie_nom" />
        </li>
        <li>
            <label for="prenom">Prénom&nbsp;:</label>
            <input type="text" id="idcoMairie_prenom" name="coMairie_prenom" />
        </li>
        <li>
            <label for="telephone">Téléphone&nbsp;:</label>
            <input type="int" id="idcoMairie_tel" name="coMairie_tel" />
        </li>
        <li>
            <label for="mail">E-mail&nbsp;:</label>
            <input type="email" id="idcoMairie_mail" name="coMairie_mail" />
        </li>
    </ul>
    <div class="button">
        <button type="submit" name="valider_modifier_coMairie">Valider</button>
    </div>
</form>