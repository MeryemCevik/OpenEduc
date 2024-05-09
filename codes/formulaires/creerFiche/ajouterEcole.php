 <!-- ============================================================
	Frontend :
 Formulaire pour ajouter une école : 
 - les informations sur l'école (année scolaire, identifiant, téléhone, e-mail)
 - Lié à la page ajouterFiche.php
  (c) 2024 SPELLANZON Nelly
		
	Backend :
- Modification du formulaire por correspondre avec la base de données
- Permettre à l'utilisateur de créer une école
- gestion des erreurs
- Enregitrer Historique saisies
  (c) CEVIK Meryem 2024
 ============================================================ 
 ============================================================ -->

 <!-- Partie PHP -->
 <?php
// Inclure le fichier fonctions.php
include_once("fonctions.php");

//réf a login.php, si le login a été bien fait en va a la page login
if($_SESSION["autoriser"]!="oui"){
header("location: login.php");
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
//Initialistation
@$code_ecole="";
@$nom_ecole="";
@$type_etab_ecole = "";
@$statut="";
@$adresse="";
@$CP_ecole=""; 
@$ville_ecole="";
@$tel_ecole="";
@$mail_ecole="";
@$valider_ecole=$_POST["valider_ecole"];
// Appel de la fonction pour la création d'une école
creerEcole($erreur,$message,$valider_ecole, $id_utilisateur);
 ?>

 <!-- ----------Partie HTML------------------------------  -->
<form name="createEcole" method="post" action="ficheInformation.php#ajouterEcole">
    <ul>
        <h2> Création d'une école </h2>
        <div style="color:red" class="erreur"><?php echo $erreur?></div>
        <div style="color:green" class="message"><?php echo $message ?></div>
        <li>
            <label for="idEcole">Identifiant&nbsp;:</label>
            <input type="text" id="idecole" name="id_ecole" required="required" placeholder="exemple : 0672868D" value="<?php echo $code_ecole?>" /><br />
        </li>
        <li>
            <label for="NomEcole">Nom&nbsp;:</label>
            <input type="text" id="nomecole" name="nom_ecole" required="required" placeholder="Nom de l'école" value="<?php echo $nom_ecole?>" /><br />
        </li>
        <li>
            <label for="type_etab_ecole">Type établissement&nbsp;:</label>
            <select name="type_etab_ecole" id="idecole_type_etab">
            <option value="">--Choisissez un type d'établissement--</option>
            <option value="ecole elementaire">école élémentaire</option>
            <option value="ecole maternelle">école maternelle</option>
            <!-- <option value="collège">collège</option>
            <option value="lycée">lycée</option> -->
            </select>
        </li>
        <li>
        <legend>Statut&nbsp;:</legend>
        <div>
            <input type="radio" name="statut" value="publique" checked/>
            <label for="publique">publique</label>
        </div>
        <div>
            <input type="radio" name="statut" value="privée" />
            <label for="privée">privée</label>
        </div>
        </li>
        <li>
            <label for="adresse">Adresse&nbsp;:</label>
            <textarea rows="2" cols="20" name="adresse" required="required" value="<?php echo $adresse?>"></textarea><br />
        </li>
        <li>
            <label for="codePostal">Code postal&nbsp;:</label>
            <input type="int" id="CP_ecole" name="CP_ecole" required="required" placeholder="exemple : 67000" value="<?php echo $CP_ecole?>" /><br />
        </li>
        <li>
            <label for="ville">Ville&nbsp;:</label>
            <input type="int" id="ville_ecole" name="ville_ecole" required="required" placeholder="exemple : Strasbourg" value="<?php echo $ville_ecole?>" /><br />
        </li>
        <li>
            <label for="telephone">Tel&nbsp;:</label>
            <input type="tel" id="idtel_ecole" name="tel_ecole" required="required" placeholder="exemple : 01 23 45 67 89" value="<?php echo $tel_ecole?>" /><br />
        </li>
        <li>
            <label for="mail">E-mail&nbsp;:</label>
            <input type="email" id="idmail_ecole" name="mail_ecole" required="required" placeholder="exemple : exemple@mail.fr" value="<?php echo $mail_ecole?>" /><br />
        </li>
    </ul>  
    <div class="button">
        <button type="submit" name="valider_ecole">Valider</button>
    </div>
</form>