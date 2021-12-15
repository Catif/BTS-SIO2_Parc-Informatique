<?php
$title = 'Accueil - Parc Informatique';

require './assets/components/header.php';
require './assets/components/navbar.php';
?>


<div class="container pb-3">
    <h2 class="text-center mb-4">Bienvenue sur la page d’accueil du Parc Informatique<br>du Lycée Frédéric Chopin</h2>
    
    <p>L’objectif du projet est de mettre en oeuvre une solution de gestion du parc informatique des étudiants du supérieur du lycée Frédéric Chopin.</p>
    <p>Il contient les informations suivantes :</p>
        <strong>Une base de données :</strong>
        <ul>
            <li>répertoriant l’intégralité des appareils utilisateurs</li>
        </ul>
        <strong>Une partie administrateur :</strong>
        <ul>
            <li>
                permettant l’administration du site : gestion de la base de données, ajouts de rôles, etc...
            </li>
        </ul>

    <strong>Une partie utilisateur :</strong>
    <ul>
        <li>Etudiant :</li>
        <ul>
            <li>L’étudiant peut modifier son compte et les appareils qu’il possède qu’il peut rentrer à l’aide d’un formulaire ;</li>
        </ul>
        <li>Professeur / Administration Lycée / Région Grand-Est :</li> 
        <ul>
            <li>
                Accès à la base de données en mode lecture, possibilité de voir les statistiques de celle-ci.
            </li>
        </ul> 
    </ul>




</div>



<?php
require './assets/components/footer.php';
?>