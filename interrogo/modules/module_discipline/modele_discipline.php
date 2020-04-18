<?php

	require_once './Connexion.php';

   	//chaque modèle extends connexion
    class ModeleDiscipline extends Connexion {

        function ajoutDiscipline($intitule, $description){
            $bd = Connexion::$bdd;
            $query = $bd->prepare('INSERT INTO discipline VALUES (DEFAULT, ?, ?)');
            $query->execute(array($intitule, $description));
        }


    }

?>

