//--------------AJOUTER CLASSE------------------------
// gestion liste déroulante "Nombre de professeurs"
    document.getElementById('nb_prof').addEventListener('change', function() {
        var nbProf = parseInt(this.value); // Convertir la valeur en entier
        var professeurs = document.querySelectorAll('.professeur');

        // Masquer tous les champs de professeurs
        professeurs.forEach(function(professeur) {
            professeur.style.display = 'none';
        });

        // Afficher les champs nécessaires en fonction du nombre selectionner
        for (var i = 1; i <= nbProf; i++) {
            document.getElementById('professeur' + i).style.display = 'block';
        }
    });
