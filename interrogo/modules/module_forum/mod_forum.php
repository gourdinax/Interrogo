
<?php

    include_once 'modules/module_forum/cont_forum.php';
    include_once './Connexion.php';

     Connexion::initConnexion();

    class ModForum{

        public $controleur;

         function __construct() {
            
           $this->controleur=new ContForum();

        }

    }

?>

