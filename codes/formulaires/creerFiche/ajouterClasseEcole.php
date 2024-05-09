<!-- ============================================================ 
 Formulaire pour ajouter une classe pour une école
 - les informations sur les classes (niveaux, bilingue, civilité professeur, nom, effectif de la classe)
 - Lié à la page ajouterFiche.php
  (c) 2024 SPELLANZON Nelly
		
Formulaire Back end :
- 
	
(c) Cevik Meryem
 ============================================================ 
 ============================================================ -->

 <!-- Partie PHP -->
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
$ecoles=getListeEcolesClasse($id_utilisateur,$erreur);

//Initialistation
@$niveau ="";
@$bilingue = "";
@$nb_prof ="";
@$professeur_civilite1="";
@$professeur_nom1="";
@$professeur_civilite2="";
@$professeur_nom2="";
@$annee_scolaire="";
@$classe_effectif = "";
@$id_ecole=0;
@$valider_classe=$_POST["valider_classe"];

// Appel de la fonction pour la création d'une classe
creerClasse($erreur,$message,$valider_classe, $id_utilisateur,$id_ecole);
 ?>

<!--
 Formulaire
 ---------------------------------------- -->
<form name="createClasseEcole" method="post" action="ficheInformation.php#ajouterClasseEcole">
    <ul>
        <h2> Création des classes </h2>
        <div style="color:red" class="erreur"><?php echo $erreur?></div>
        <div style="color:green" class="message"><?php echo $message ?></div>
        <li>
            <label for="ecole">Ecole&nbsp;:</label>
            <select name="ecole" id="ecole">
            <option value="">--Choisissez une école de votre choix--</option>
            <?php foreach ($ecoles as $ecole) : ?>
                <option value=<?php echo $ecole['Id_ecole']; ?>><?php echo $ecole['Code_ecole'] . ' - ' .$ecole['type_etab'] .' '. $ecole['Nom']; ?></option>
            <?php endforeach; ?>
            </select>
        </li>
        <li>
        <label for="niveau">Niveau(x)&nbsp;:</label>
            <select name="niveau" id="idniveau_scolarite">
                <option value="">--Choissiez le niveau scolaire--</option>
                <!--  élementaire -->
                <option value="">--Niveaux école élémentaire--</option>
                <option value="CP">CP</option>
                <option value="CP_CE1">CP, CE1</option>
                <option value="CE1">CE1</option>
                <option value="CE1_CE2">CE1, CE2</option>
                <option value="CE2">CE2</option>
                <option value="CM1">CM1</option>
                <option value="CM1_CM2">CM1, CM2</option>
                <option value="CM2">CM2</option>
                <option value="">--Niveaux école maternelle--</option>
                <!-- maternelle -->
                <option value="Petite Section">Petite section</option>
                <option value="Moyenne Section">Moyenne section</option>
                <option value="Grande Section">Grande section</option>
            </select>
        </li> 
        <li>
            <label for="bilingue">Bilingue</label>
            <input type="hidden" name="bilingue" value=0 />
            <input type="checkbox" name="bilingue" value=1> 
        </li>
        <li id="professeurSection">
            <label for="nb_prof">Nombre de professeurs&nbsp;:</label>
            <select name="nb_prof" id="nb_prof">
                <option value=1>1</option>
                <option value=2>2</option>
            </select>

        <!-- Champs pour le premier professeur -->
        <div id="professeur1" class="professeur">
            <label for="civilite1">Civilité du professeur&nbsp;:</label><br>
            <select name="professeur_civilite1" class="professeur_civilite">
                <option value="">--Choisissez une civilité--</option>
                <option value="M">Monsieur</option>
                <option value="Mme">Madame</option>
            </select>
            <input type="text" name="professeur_nom1" class="professeur_nom" required="required" value="<?php echo $professeur_nom1?>" />
        </div>
        
            <!-- Champs pour le deuxième professeur (initiallement caché) -->
        <div id="professeur2" class="professeur" style="display: none;">
            <label for="civilite2">Civilité du deuxième professeur&nbsp;:</label><br>
            <select name="professeur_civilite2" class="professeur_civilite">
                <option value="">--Choisissez une civilité--</option>
                <option value="M">Monsieur</option>
                <option value="Mme">Madame</option>
            </select>
            <input type="text" name="professeur_nom2" class="professeur_nom" value="<?php echo $professeur_nom2?>"/>
        </div>
        </li>
        <li>
            <label for="effectif">Effectif de la classe&nbsp;:</label>
            <input type="number" id="idclasse_effectif" name="classe_effectif" min="1" max="40" value="<?php echo $classe_effectif?>" />
        </li>
        <li>
        <label for="annee_scolaire">Année scolaire :</label>
        <select id="annee_scolaire" name="annee_scolaire">
            <option value="">-- Sélectionnez une année scolaire --</option>
            <?php
            // Récupérer l'année actuelle
            $annee_actuelle = date('Y');
            
            // Générer les options pour les années scolaires
            for ($annee = $annee_actuelle; $annee >= 2000; $annee--) {
                $annee_debut = $annee;
                $annee_fin = $annee_debut + 1;
                $annee_scolaire = $annee_debut . '/' . $annee_fin;
                echo '<option value=' . $annee_scolaire . '>' . $annee_scolaire . '</option>';
            }
            ?>
        </select>
        </li>
    </ul>
    <div class="button">
        <button type="submit" name="valider_classe">Valider</button>
    </div>
</form>
<script src="js/scripts.js"></script>