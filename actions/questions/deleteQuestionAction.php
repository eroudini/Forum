<?php 
session_start();

if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}

require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTheQueqstion = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQueqstion));

    if($checkIfQuestionExists -> rowCount() > 0){

        // verifier si l'auteur de la question est bien l'utilisateur connecté

        if($checkIfQuestionExists->fetch()['id_auteur'] == $_SESSION['id']){

            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id =?');
            $deleteThisQuestion->execute(array($idOfTheQueqstion));

            header('Location: ../../my-questions.php');

        }else{
            echo "Vous ne pouvez pas supprimer cette question";
        }


    }

}else {
     // message d'erreur
     $errorMsg = "Aucune question n'a été trouver";
}
