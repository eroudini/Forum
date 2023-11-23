<?php 

require('actions/database.php');


// Récuperer les questions par défaut sans recherche

$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');


// Vérifier si une recherche a été rentrée par l'utilisateur

if(isset($_GET['search']) AND !empty($_GET['search'])){

    // La recheche
    $usersSearch =  $_GET['search'];

    //Récupérer toutes les questions qui correspondent à la recherche (ene fonction du titre)

    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur,
    date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
}


