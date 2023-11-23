<?php 

require('actions/database.php');

$getAllmyQuestions = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ? ORDER BY id DESC');
$getAllmyQuestions->execute(array($_SESSION['id'])); 