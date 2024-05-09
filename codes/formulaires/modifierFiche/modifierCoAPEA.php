 <!-- ============================================================ 
 Formulaire pour modifier un correspondant APEA
 - les informations sur le correspondant APEA
(c) 2024 SPELLANZON Nelly	

 Back end :
 - Programmation liste déroulante des correspondant écoles
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

// $erreur=getClassesParEcole($id_utilisateur, $erreur);
$coEcoles = getCoEcolesParEcole($id_utilisateur, $erreur);

//Initialistation
@$coAPEA_civilite="";
@$coAPEA_nom = "";
@$coAPEA_prenom = "";
@$coAPEA_mail = "";
@$valider_coEcole = $_POST["valider_modifier_coEcole"];

modifierCoAPEA($erreur, $message, $valider_coEcole, $id_utilisateur);

?>
 <form name="modifierCoAPEA" method="post" action="ficheInformation.php#modifierCoAPEA">
    <ul>
        <h2> Modification de correspondant local APEA </h2>
        <div style="color:red" class="erreur">
            <?php echo $erreur ?>
        </div>
        <div style="color:green" class="message">
            <?php echo $message ?>
        </div>
        <li>
            <label for="coEcole">Correspondant APEA&nbsp;:</label>
            <select name="coEcole" id="idCoEcole">
            <option value="">--Choisissez un correspondant APEA à modifier--</option>
            <?php foreach ($coEcoles as $coEcole): ?>
                <option value="<?php echo $coEcole["Id_corr_apea"] ?>"><?php echo $coEcole["Civilite"].' '.$coEcole["Nom"].' '.$coEcole["Prenom"]; ?></option>
            <?php endforeach; ?>
            </select>
        </li>
        <li>
            <label for="civilite">Civilité&nbsp;:</label>
            <select name="coAPEA_civilite" id="idcoAPEA_civilite">
                <option value="">--Choisissez une civilité--</option>
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
            </select>
        </li>
        <li>
            <label for="nom">Nom&nbsp;:</label>
            <input type="text" id="idname" name="coAPEA_nom" />
        </li>
        <li>
            <label for="prenom">Prénom&nbsp;:</label>
            <input type="text" id="idprenom" name="coAPEA_prenom" />
        </li>
        <li>
            <label for="mail">E-mail&nbsp;:</label>
            <input type="email" id="idcoAPEA_mail" name="coAPEA_mail" />
        </li>
    </ul>
    <div class="button">
        <button type="submit" name="valider_modifier_coEcole">Valider</button>
    </div>
</form>